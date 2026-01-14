<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FerreMateriales La Unión | Tecomán</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <div class="bg-[#002244] text-gray-300 text-xs py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex gap-4">
                <span class="flex items-center gap-1"><i class="ph-fill ph-phone text-orange-400"></i> (313) 32 420 00</span>
            </div>
            <div class="hidden md:block">Horario: Lun-Vie 8:00am - 7:00pm</div>
        </div>
    </div>

    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="index.php" class="flex flex-col leading-none group mr-8">
                <span class="text-2xl font-black text-[#003366] tracking-tighter">FERREMATERIALES</span>
                <span class="text-lg font-bold text-gray-600 tracking-[0.3em] flex justify-between w-full">LA UNIÓN</span>
            </a>

            <nav class="hidden lg:flex items-center space-x-8 text-sm font-bold text-gray-700 flex-1">
                <a href="index.php" class="hover:text-orange-500 transition">INICIO</a>
                
                <div class="relative group py-4">
                    <button class="flex items-center gap-1 hover:text-orange-500 transition cursor-pointer">
                        PRODUCTOS <i class="ph-bold ph-caret-down"></i>
                    </button>
                    <div class="mega-menu hidden absolute top-full left-0 w-[750px] bg-white shadow-xl border-t-4 border-orange-500 rounded-b-lg p-8 z-50">
                        <div class="grid grid-cols-3 gap-8">
                            <div>
                                <h4 class="text-orange-500 font-bold mb-3 uppercase text-xs border-b pb-1">Construcción</h4>
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="construccion.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Obra Gris (Polvos)</a></li>
                                    <li><a href="aceros.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Aceros y Metales</a></li>
                                    <li><a href="acabados.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Acabados y Pinturas</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-orange-500 font-bold mb-3 uppercase text-xs border-b pb-1">Instalaciones</h4>
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="plomeria.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Plomería y Tubería</a></li>
                                    <li><a href="material-electrico.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Material Eléctrico</a></li>
                                    <li><a href="iluminacion.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Iluminación</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-orange-500 font-bold mb-3 uppercase text-xs border-b pb-1">Profesional</h4>
                                <ul class="space-y-2 text-gray-600 text-sm">
                                    <li><a href="herramientas.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Herramientas</a></li>
                                    <li><a href="equipo-seguridad.php" class="hover:text-[#003366] block hover:translate-x-1 transition">Equipo de Seguridad</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#contacto" class="hover:text-orange-500 transition">CONTACTO</a>

                <a href="oportunidad.php" class="hover:text-orange-500 transition">OPORTUNIDAD LABORAL</a>
            </nav>

            <div class="flex items-center gap-4">
                <button id="mobile-menu-btn" class="lg:hidden text-2xl text-[#003366]"><i class="ph ph-list"></i></button>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden lg:hidden bg-gray-100 p-4 border-t">
            <ul class="space-y-3 font-bold text-gray-700">
                <li><a href="construccion.php" class="block">Construcción</a></li>
                <li><a href="aceros.php" class="block">Aceros</a></li>
                <li><a href="plomeria.php" class="block">Plomería</a></li>
                <li><a href="material-electrico.php" class="block">Eléctrico</a></li>
                <li><a href="iluminacion.php" class="block">Iluminación</a></li>
                <li><a href="herramientas.php" class="block">Herramientas</a></li>
                <li><a href="equipo-seguridad.php" class="block">Equipo de Seguridad</a></li>
            </ul>
        </div>
    </header>