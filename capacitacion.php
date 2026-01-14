<?php
// Ocultar errores en pantalla para no ensuciar la interfaz
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 0);

session_start();

// --- CONFIGURACIÓN ---
$pass_empleado = "Union2026";      // Contraseña Nivel 1 (Ver)
$pass_gerencia = "AdminUnion";     // Contraseña Nivel 2 (Subir/Editar)
$directorio_videos = "videos/";
$limite_megas = 250;

// --- LÓGICA PHP ---

// 1. CERRAR SESIÓN (Total o solo Admin)
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: capacitacion.php");
    exit;
}
if (isset($_GET['cerrar_admin'])) {
    unset($_SESSION['permiso_subir']); // Quita solo el permiso de admin
    header("Location: capacitacion.php?v=menu");
    exit;
}

// 2. LOGIN GENERAL (Empleado)
$error = "";
if (isset($_POST['login_general'])) {
    if ($_POST['password'] === $pass_empleado) $_SESSION['rol'] = 'empleado';
    else $error = "Contraseña de empleado incorrecta.";
}

// 3. LOGIN ADMINISTRATIVO (Gerencia)
if (isset($_POST['login_admin'])) {
    if ($_POST['admin_password'] === $pass_gerencia) $_SESSION['permiso_subir'] = true;
    else $error = "Contraseña de gerencia incorrecta.";
}

// 4. PROCESAR SUBIDA Y EDICIÓN (Solo si es Admin)
$mensaje_sistema = "";

if (isset($_SESSION['permiso_subir']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // A) SUBIR VIDEO
    if (isset($_POST['accion']) && $_POST['accion'] == 'subir') {
        if (!file_exists($directorio_videos)) { mkdir($directorio_videos, 0777, true); }

        $nombre_archivo = basename($_FILES["nuevo_video"]["name"]);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
        $nombre_fisico = uniqid() . "." . $extension; 
        $destino = $directorio_videos . $nombre_fisico;

        // Validaciones básicas
        if ($_FILES['nuevo_video']['error'] !== UPLOAD_ERR_OK) {
            $mensaje_sistema = "<div class='bg-red-100 text-red-800 p-4 rounded mb-4'>❌ Error del servidor. Código: " . $_FILES['nuevo_video']['error'] . "</div>";
        } else {
            if (move_uploaded_file($_FILES["nuevo_video"]["tmp_name"], $destino)) {
                $datos = [
                    'titulo' => $_POST['titulo'],
                    'descripcion' => $_POST['descripcion'],
                    'fecha' => date("d/m/Y")
                ];
                file_put_contents($destino . ".json", json_encode($datos));
                $mensaje_sistema = "<div class='bg-green-100 text-green-800 p-4 rounded mb-4 border-l-4 border-green-500'>✅ <b>Video publicado con éxito.</b></div>";
            } else {
                $mensaje_sistema = "<div class='bg-red-100 text-red-800 p-4 rounded mb-4'>❌ Error al mover el archivo. Verifica permisos o tamaño.</div>";
            }
        }
    }

    // B) EDITAR DATOS
    if (isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        $archivo = $_POST['archivo_objetivo'];
        $ruta_json = $directorio_videos . $archivo . ".json";
        
        $datos = [
            'titulo' => $_POST['titulo'],
            'descripcion' => $_POST['descripcion'],
            'fecha' => date("d/m/Y") 
        ];
        file_put_contents($ruta_json, json_encode($datos));
        $mensaje_sistema = "<div class='bg-blue-100 text-blue-800 p-4 rounded mb-4'>✏️ <b>Información actualizada.</b></div>";
    }
}

// Estados de sesión
$logueado = isset($_SESSION['rol']);
$es_admin = isset($_SESSION['permiso_subir']);
$vista = isset($_GET['v']) ? $_GET['v'] : 'menu';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitación Interna | La Unión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow: hidden; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans">

    <header class="bg-[#002244] text-white py-4 shadow-md sticky top-0 z-40">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-orange-500 p-2 rounded text-white">
                    <i class="ph-bold ph-monitor-play text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-none">LA UNIÓN</h1>
                    <span class="text-xs text-gray-400 uppercase tracking-widest">Capacitación</span>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="index.php" class="text-sm text-gray-300 hover:text-white flex items-center gap-1 transition">
                    <i class="ph-bold ph-house"></i> Ir al Inicio
                </a>
                <?php if ($logueado): ?>
                    <a href="?logout=true" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs font-bold transition">
                        Cerrar Sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-4 py-8">

        <?php if (!$logueado): ?>
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl overflow-hidden mt-12 border border-gray-200">
                <div class="bg-[#003366] p-8 text-center">
                    <div class="bg-white/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                        <i class="ph-fill ph-lock-key text-3xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Acceso Personal</h2>
                    <p class="text-blue-200 text-sm mt-1">Ingresa la clave general para ver los cursos</p>
                </div>
                <div class="p-8">
                    <form method="POST">
                        <input type="password" name="password" placeholder="Contraseña" class="w-full bg-gray-50 border border-gray-300 p-3 rounded-lg mb-4 text-center focus:border-orange-500 outline-none" required>
                        <?php if ($error) echo "<p class='text-red-500 text-xs text-center mb-4 bg-red-50 p-2 rounded'>$error</p>"; ?>
                        <button type="submit" name="login_general" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition shadow-lg">Entrar</button>
                    </form>
                </div>
            </div>

        <?php else: ?>

            <?php if ($vista == 'menu'): ?>
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-[#003366]">Panel de Capacitación</h2>
                    <p class="text-gray-500">Selecciona una opción:</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <a href="capacitacion.php?v=ver" class="group bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl transition border-2 border-transparent hover:border-blue-500 text-center cursor-pointer">
                        <div class="bg-blue-50 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#003366] transition duration-300">
                            <i class="ph-fill ph-eye text-4xl text-[#003366] group-hover:text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Ver Cursos</h3>
                        <p class="text-gray-500 text-sm">Biblioteca de videos para empleados.</p>
                        <span class="inline-block mt-4 text-blue-600 font-bold text-sm">Ingresar &rarr;</span>
                    </a>

                    <a href="capacitacion.php?v=admin" class="group bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl transition border-2 border-transparent hover:border-orange-500 text-center cursor-pointer">
                        <div class="bg-orange-50 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-500 transition duration-300">
                            <i class="ph-fill ph-gear text-4xl text-orange-600 group-hover:text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Administrar</h3>
                        <p class="text-gray-500 text-sm">Subir nuevos videos o editar existentes.</p>
                        <span class="inline-block mt-4 text-orange-500 font-bold text-sm">Zona Restringida &rarr;</span>
                    </a>
                </div>

            <?php elseif ($vista == 'ver'): ?>
                <div class="flex justify-between items-center mb-8 border-b pb-4">
                    <h2 class="text-2xl font-bold text-[#003366]">Biblioteca de Cursos</h2>
                    <a href="capacitacion.php?v=menu" class="text-gray-500 hover:text-[#003366] font-bold flex items-center gap-2"><i class="ph-bold ph-arrow-left"></i> Volver</a>
                </div>

                <?php $videos = glob($directorio_videos . "*.{mp4,avi,mov,mkv}", GLOB_BRACE); ?>
                
                <?php if (count($videos) > 0): ?>
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php foreach($videos as $video): 
                            $json_file = $video . ".json";
                            $titulo = "Sin título"; $desc = "";
                            if (file_exists($json_file)) {
                                $meta = json_decode(file_get_contents($json_file), true);
                                $titulo = $meta['titulo']; $desc = $meta['descripcion'];
                            } else { $titulo = basename($video); }
                        ?>
                        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                            <div class="bg-black aspect-video">
                                <video controls class="w-full h-full"><source src="<?php echo $video; ?>" type="video/mp4"></video>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-[#003366] text-lg leading-tight mb-2"><?php echo $titulo; ?></h4>
                                <p class="text-sm text-gray-600 line-clamp-3"><?php echo $desc; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-20 text-gray-400 border-2 border-dashed rounded-xl">No hay videos disponibles.</div>
                <?php endif; ?>

            <?php elseif ($vista == 'admin'): ?>
                
                <?php if (!$es_admin): ?>
                    <div class="max-w-sm mx-auto bg-white p-8 rounded-xl shadow-lg border-t-4 border-orange-500 text-center mt-10">
                        <i class="ph-fill ph-shield-warning text-4xl text-orange-500 mb-4"></i>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Zona Restringida</h3>
                        <p class="text-sm text-gray-500 mb-6">Ingresa la contraseña de Gerencia para administrar contenido.</p>
                        <form method="POST">
                            <input type="password" name="admin_password" placeholder="Contraseña Admin" class="w-full bg-gray-50 border p-3 rounded mb-4 text-center outline-none focus:border-orange-500" required>
                            <?php if ($error) echo "<p class='text-red-500 text-xs mb-3'>$error</p>"; ?>
                            <button type="submit" name="login_admin" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 rounded transition">Autorizar</button>
                        </form>
                        <div class="mt-4 border-t pt-4">
                            <a href="capacitacion.php?v=menu" class="text-xs text-gray-400 hover:text-gray-600">Cancelar</a>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-orange-600">Panel Administrativo</h2>
                            <p class="text-sm text-gray-500">Subir y editar contenido.</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="?cerrar_admin=true" class="text-xs bg-gray-200 hover:bg-gray-300 text-gray-600 px-3 py-2 rounded font-bold">Bloquear Admin</a>
                            <a href="capacitacion.php?v=menu" class="text-xs bg-[#003366] text-white px-3 py-2 rounded font-bold">Volver al Menú</a>
                        </div>
                    </div>

                    <?php echo $mensaje_sistema; ?>

                    <div class="bg-white p-6 rounded-xl shadow-md mb-10 border border-gray-200">
                        <h3 class="font-bold text-lg text-gray-700 mb-4 flex items-center gap-2"><i class="ph-bold ph-upload-simple"></i> Subir Nuevo Video</h3>
                        <form action="" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Título del Curso</label>
                                    <input type="text" name="titulo" placeholder="Ej: Curso de Ventas 1" class="w-full border p-2 rounded focus:border-orange-500 outline-none" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Descripción</label>
                                    <textarea name="descripcion" rows="3" placeholder="Detalles..." class="w-full border p-2 rounded focus:border-orange-500 outline-none"></textarea>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Archivo MP4</label>
                                    <div class="border-2 border-dashed border-gray-300 rounded p-6 text-center hover:bg-gray-50 cursor-pointer relative">
                                        <input type="file" name="nuevo_video" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".mp4,.avi,.mov" required onchange="this.nextElementSibling.innerText = this.files[0].name">
                                        <p class="text-sm text-gray-400 pointer-events-none">Click para seleccionar archivo</p>
                                    </div>
                                </div>
                                <input type="hidden" name="accion" value="subir">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded mt-4 transition shadow">Publicar Curso</button>
                            </div>
                        </form>
                    </div>

                    <h3 class="font-bold text-lg text-gray-700 mb-4 border-b pb-2">Editar Videos Existentes</h3>
                    <?php $videos = glob($directorio_videos . "*.{mp4,avi,mov,mkv}", GLOB_BRACE); ?>
                    
                    <div class="space-y-4">
                        <?php foreach($videos as $video): 
                            $archivo_fisico = basename($video);
                            $json_file = $video . ".json";
                            $titulo = "Sin título"; $desc = "";
                            if (file_exists($json_file)) {
                                $meta = json_decode(file_get_contents($json_file), true);
                                $titulo = $meta['titulo']; $desc = $meta['descripcion'];
                            } else { $titulo = basename($video); }
                        ?>
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col md:flex-row gap-4 items-start md:items-center">
                            <div class="bg-black w-32 h-20 flex-shrink-0 rounded bg-opacity-10 flex items-center justify-center">
                                <i class="ph-fill ph-video text-2xl text-gray-400"></i>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-bold text-[#003366]"><?php echo $titulo; ?></h4>
                                <p class="text-xs text-gray-500 mb-1">Archivo: <?php echo $archivo_fisico; ?></p>
                                <p class="text-sm text-gray-600 line-clamp-1"><?php echo $desc; ?></p>
                            </div>
                            <button onclick="abrirEditor('<?php echo $archivo_fisico; ?>', '<?php echo addslashes($titulo); ?>', '<?php echo addslashes($desc); ?>')" class="bg-blue-100 text-blue-700 px-4 py-2 rounded text-sm font-bold hover:bg-blue-200 transition flex items-center gap-2">
                                <i class="ph-bold ph-pencil-simple"></i> Editar
                            </button>
                        </div>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>

            <?php endif; ?> <?php endif; ?> </main>

    <div id="modal-editar" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-black opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-lg mx-auto rounded-xl shadow-lg z-50 p-6">
            <div class="flex justify-between items-center mb-4 border-b pb-2">
                <h3 class="text-xl font-bold text-[#003366]">Editar Información</h3>
                <div class="cursor-pointer" onclick="toggleModal('modal-editar')"><i class="ph-bold ph-x text-lg"></i></div>
            </div>
            <form method="POST">
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="archivo_objetivo" id="edit_filename">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Título</label>
                    <input type="text" name="titulo" id="edit_titulo" class="w-full border p-2 rounded focus:border-blue-900 outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Descripción</label>
                    <textarea name="descripcion" id="edit_descripcion" rows="4" class="w-full border p-2 rounded focus:border-blue-900 outline-none"></textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('modal-editar')" class="text-gray-500 px-4 py-2 text-sm">Cancelar</button>
                    <button type="submit" class="bg-[#003366] hover:bg-blue-900 text-white font-bold px-6 py-2 rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            modal.classList.toggle('opacity-0');
            modal.classList.toggle('pointer-events-none');
            document.body.classList.toggle('modal-active');
        }
        function abrirEditor(archivo, titulo, descripcion) {
            document.getElementById('edit_filename').value = archivo;
            document.getElementById('edit_titulo').value = titulo;
            document.getElementById('edit_descripcion').value = descripcion;
            toggleModal('modal-editar');
        }
    </script>

    <footer class="bg-gray-200 text-center py-4 text-xs text-gray-500 mt-auto">
        &copy; 2026 Sistema Interno La Unión. Powered By Emywebstudio
    </footer>
</body>
</html>