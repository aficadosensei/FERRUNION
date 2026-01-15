<?php
ob_start(); // Iniciar buffer para evitar errores en Excel
session_start();

// --- CONFIGURACIÓN ---
$password_acceso = "rrhh2026"; 
$archivo_datos = 'solicitudes/candidatos.txt'; 
$error_msg = "";
$success_msg = "";

// Estados permitidos
$estados_config = [
    'Nuevas' => ['color' => 'blue', 'label' => 'Nueva'],
    'En Proceso' => ['color' => 'purple', 'label' => 'En Proceso'],
    'Pendientes' => ['color' => 'orange', 'label' => 'Pendiente'],
    'Atendidas' => ['color' => 'green', 'label' => 'Atendida']
];

// 1. LOGOUT
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: admin_solicitudes.php");
    exit;
}

// 2. LOGIN
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_password'])) {
    if ($_POST['login_password'] === $password_acceso) {
        $_SESSION['rrhh_logged_in'] = true;
    } else {
        $error_msg = "Contraseña incorrecta";
    }
}

// 3. PROCESAR ACCIONES (Cambiar Estado / Eliminar)
if (isset($_SESSION['rrhh_logged_in']) && $_SESSION['rrhh_logged_in'] === true && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $lineas_archivo = file_exists($archivo_datos) ? file($archivo_datos, FILE_IGNORE_NEW_LINES) : [];
    $archivo_modificado = false;

    // Actualizar Estado
    if (isset($_POST['action']) && $_POST['action'] === 'update_status') {
        $target_id = $_POST['target_id'];
        $new_status = $_POST['new_status'];

        foreach ($lineas_archivo as $index => $linea) {
            if (strpos($linea, '----') !== false) continue;
            $datos = explode('|', $linea);
            if (count($datos) >= 5) {
                $current_id = md5(trim($datos[0]) . trim($datos[3]));
                if ($current_id === $target_id) {
                    $datos_limpios = array_map('trim', $datos);
                    while(count($datos_limpios) < 6) $datos_limpios[] = "";
                    $datos_limpios[6] = $new_status;
                    $lineas_archivo[$index] = implode(' | ', $datos_limpios);
                    $archivo_modificado = true;
                    $success_msg = "Estado actualizado.";
                    break;
                }
            }
        }
    }

    // Eliminar
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $target_id = $_POST['target_id'];
        foreach ($lineas_archivo as $index => $linea) {
            if (strpos($linea, '----') !== false) continue;
            $datos = explode('|', $linea);
            if (count($datos) >= 5) {
                $current_id = md5(trim($datos[0]) . trim($datos[3]));
                if ($current_id === $target_id) {
                    unset($lineas_archivo[$index]);
                    if (isset($lineas_archivo[$index + 1]) && strpos($lineas_archivo[$index + 1], '----') !== false) {
                        unset($lineas_archivo[$index + 1]);
                    }
                    $archivo_modificado = true;
                    $success_msg = "Solicitud eliminada.";
                    break;
                }
            }
        }
    }

    if ($archivo_modificado) {
        file_put_contents($archivo_datos, implode(PHP_EOL, $lineas_archivo));
    }
}

// 4. LEER DATOS
$solicitudes = [];
$puestos_disponibles = [];
$stats = ['Nuevas' => 0, 'En Proceso' => 0, 'Pendientes' => 0, 'Atendidas' => 0];

if (isset($_SESSION['rrhh_logged_in']) && $_SESSION['rrhh_logged_in'] === true) {
    if (file_exists($archivo_datos)) {
        $lineas = file($archivo_datos, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lineas = array_reverse($lineas);

        foreach ($lineas as $linea) {
            if (strpos($linea, '----') !== false) continue;

            $datos = explode('|', $linea);
            
            if (count($datos) >= 5) {
                $fecha_raw = trim($datos[0]);
                $nombre = trim($datos[1]);
                $telefono = trim($datos[2]);
                $email = trim($datos[3]);
                $puesto = trim($datos[4]);
                $mensaje = isset($datos[5]) ? trim($datos[5]) : '';
                $estado = (isset($datos[6]) && array_key_exists(trim($datos[6]), $estados_config)) ? trim($datos[6]) : 'Nuevas';

                if (!in_array($puesto, $puestos_disponibles)) $puestos_disponibles[] = $puesto;
                if(isset($stats[$estado])) $stats[$estado]++;

                $solicitudes[] = [
                    'id' => md5($fecha_raw . $email),
                    'fecha' => $fecha_raw,
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'email' => $email,
                    'puesto' => $puesto,
                    'mensaje' => $mensaje,
                    'estado' => $estado,
                    'timestamp' => strtotime(str_replace('/', '-', $fecha_raw))
                ];
            }
        }
    }

    // 5. FILTRADO
    $filtro_puesto = isset($_GET['puesto']) ? $_GET['puesto'] : '';
    $filtro_estado = isset($_GET['estado']) ? $_GET['estado'] : '';
    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'desc';

    if ($filtro_puesto && $filtro_puesto !== 'todos') {
        $solicitudes = array_filter($solicitudes, function($s) use ($filtro_puesto) {
            return strtolower($s['puesto']) === strtolower($filtro_puesto);
        });
    }
    if ($filtro_estado && $filtro_estado !== 'todos') {
        $solicitudes = array_filter($solicitudes, function($s) use ($filtro_estado) {
            return $s['estado'] === $filtro_estado;
        });
    }
    usort($solicitudes, function($a, $b) use ($orden) {
        return ($orden === 'asc') ? $a['timestamp'] <=> $b['timestamp'] : $b['timestamp'] <=> $a['timestamp'];
    });

    // 6. EXPORTAR A EXCEL (LIMPIO)
    if (isset($_GET['export']) && $_GET['export'] == 'excel') {
        ob_end_clean(); // Limpiar buffer
        error_reporting(0); // Ocultar warnings
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=candidatos_' . date('Y-m-d_H-i') . '.csv');
        
        $output = fopen('php://output', 'w');
        fputs($output, "\xEF\xBB\xBF");
        
        fputcsv($output, ['Nombre', 'Telefono', 'Correo', 'Area', 'Mensaje/Experiencia'], ",", "\"", "\\");
        
        foreach ($solicitudes as $row) {
            fputcsv($output, [
                $row['nombre'],
                $row['telefono'],
                $row['email'],
                $row['puesto'],
                $row['mensaje']
            ], ",", "\"", "\\");
        }
        fclose($output);
        exit();
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRHH - Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        function confirmarBorrado() {
            return confirm("¿Eliminar solicitud?");
        }
    </script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 font-sans">

    <?php if (!isset($_SESSION['rrhh_logged_in']) || $_SESSION['rrhh_logged_in'] !== true): ?>
        <div class="flex items-center justify-center min-h-screen bg-slate-900">
            <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Acceso RRHH</h2>
                </div>
                <form method="POST" class="space-y-4">
                    <input type="password" name="login_password" required class="w-full px-4 py-3 border rounded-lg" placeholder="Contraseña...">
                    <?php if($error_msg): ?><p class="text-red-500 text-sm text-center"><?php echo $error_msg; ?></p><?php endif; ?>
                    <button type="submit" class="w-full bg-orange-600 text-white font-bold py-3 rounded-lg hover:bg-orange-700">Entrar</button>
                </form>
                <div class="mt-6 text-center"><a href="index.php" class="text-gray-400 text-sm">Volver al sitio</a></div>
            </div>
        </div>

    <?php else: ?>
        <nav class="bg-white shadow sticky top-0 z-50">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-600 text-white p-2 rounded-lg"><i class="ph-bold ph-briefcase text-xl"></i></div>
                    <h1 class="font-bold text-xl hidden md:block">Gestión de Talento</h1>
                    
                    <a href="admin_solicitudes.php" class="bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 px-4 py-2 rounded-full text-sm font-bold flex items-center gap-2 transition-all shadow-sm border border-blue-100">
                        <i class="ph-bold ph-arrows-clockwise text-lg"></i>
                        Actualizar Lista
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="?action=logout" class="text-red-500 hover:bg-red-50 p-2 rounded-lg" title="Cerrar Sesión"><i class="ph-bold ph-sign-out text-xl"></i></a>
                </div>
            </div>
        </nav>

        <main class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <?php foreach($estados_config as $key => $conf): ?>
                    <div class="bg-white p-4 rounded-xl shadow-sm border-b-4 border-<?php echo $conf['color']; ?>-500">
                        <p class="text-xs text-slate-500 uppercase font-bold"><?php echo $key; ?></p>
                        <p class="text-2xl font-bold text-slate-800"><?php echo $stats[$key]; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm mb-6 flex flex-col lg:flex-row gap-4 justify-between">
                <form method="GET" class="flex flex-col md:flex-row gap-3 w-full lg:w-auto">
                    <select name="puesto" class="border p-2 rounded text-sm"><option value="todos">Todos los Puestos</option>
                        <?php foreach($puestos_disponibles as $p): ?>
                            <option value="<?php echo $p; ?>" <?php echo ($filtro_puesto == $p) ? 'selected' : ''; ?>><?php echo $p; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="estado" class="border p-2 rounded text-sm"><option value="todos">Todos los Estados</option>
                        <?php foreach($estados_config as $key => $conf): ?>
                            <option value="<?php echo $key; ?>" <?php echo ($filtro_estado == $key) ? 'selected' : ''; ?>><?php echo $key; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded text-sm">Filtrar</button>
                    <?php if($filtro_puesto || $filtro_estado): ?>
                        <a href="admin_solicitudes.php" class="text-slate-500 px-3 py-2 text-sm">Limpiar</a>
                    <?php endif; ?>
                </form>

                <?php 
                    $params = $_GET; $params['export'] = 'excel';
                    $exportUrl = '?' . http_build_query($params);
                ?>
                <a href="<?php echo $exportUrl; ?>" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded text-sm hover:bg-green-700 justify-center">
                    <i class="ph-bold ph-microsoft-excel-logo"></i> Descargar Excel
                </a>
            </div>

            <?php if(empty($solicitudes)): ?>
                <div class="text-center py-12 text-slate-400">
                    <i class="ph-duotone ph-folder-dashed text-5xl mb-3"></i>
                    <p>No se encontraron solicitudes.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach($solicitudes as $solicitud): 
                        $estado = $solicitud['estado']; $color = $estados_config[$estado]['color']; ?>
                        <div class="bg-white rounded-xl shadow border-l-4 border-<?php echo $color; ?>-500 flex flex-col h-full hover:shadow-lg transition-shadow">
                            <div class="p-5 border-b border-slate-100 flex justify-between">
                                <div>
                                    <h3 class="font-bold text-slate-800"><?php echo $solicitud['nombre']; ?></h3>
                                    <p class="text-sm text-slate-500"><?php echo $solicitud['puesto']; ?></p>
                                </div>
                                <span class="text-xs font-bold px-2 py-1 rounded h-fit bg-<?php echo $color; ?>-100 text-<?php echo $color; ?>-700"><?php echo $estados_config[$estado]['label']; ?></span>
                            </div>
                            <div class="p-5 space-y-2 flex-grow text-sm text-slate-600">
                                <p><i class="ph-fill ph-envelope-simple mr-1 text-slate-400"></i> <?php echo $solicitud['email']; ?></p>
                                <p><i class="ph-fill ph-phone mr-1 text-slate-400"></i> <a href="tel:<?php echo $solicitud['telefono']; ?>" class="hover:text-blue-600 hover:underline"><?php echo $solicitud['telefono']; ?></a></p>
                                <p><i class="ph-fill ph-calendar-blank mr-1 text-slate-400"></i> <?php echo $solicitud['fecha']; ?></p>
                                <?php if($solicitud['mensaje']): ?><div class="mt-2 bg-slate-50 p-2 rounded italic text-xs text-slate-500">"<?php echo $solicitud['mensaje']; ?>"</div><?php endif; ?>
                            </div>
                            <div class="bg-slate-50 p-3 border-t flex gap-2">
                                <form method="POST" class="flex-grow">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="target_id" value="<?php echo $solicitud['id']; ?>">
                                    <select name="new_status" onchange="this.form.submit()" class="w-full text-xs py-2 px-2 rounded border bg-white cursor-pointer hover:bg-slate-50 focus:border-blue-500 outline-none">
                                        <?php foreach($estados_config as $key => $conf): ?>
                                            <option value="<?php echo $key; ?>" <?php echo ($estado == $key) ? 'selected' : ''; ?>>Marcar: <?php echo $key; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                                <form method="POST" onsubmit="return confirmarBorrado()">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="target_id" value="<?php echo $solicitud['id']; ?>">
                                    <button class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded transition-colors"><i class="ph-bold ph-trash text-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    <?php endif; ?>
</body>
</html>