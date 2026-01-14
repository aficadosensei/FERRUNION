<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-gray-800 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1567789884554-0b844b59fb4c?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Aceros">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">ACEROS Y REFUERZOS</h1>
            <p class="text-orange-400 mt-2 font-bold uppercase tracking-widest">Estructura y Soporte</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=600" class="hover-zoom-img" alt="Varilla">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Varilla Corrugada</h3>
                    <p class="text-gray-600 text-sm">Acero de refuerzo R-42 certificado. Disponible en medidas de 3/8", 1/2", 5/8" y más. Largos estándar de 12 metros.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://plus.unsplash.com/premium_photo-1664302152996-26795ac00d3d?w=600" class="hover-zoom-img" alt="Armex">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Armex y Castillos</h3>
                    <p class="text-gray-600 text-sm">Estructuras electrosoldadas listas para instalar. Ahorra tiempo en dalas, castillos y cerramientos (15x15, 15x20).</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1535732759880-bbd5c7265e3f?w=600" class="hover-zoom-img" alt="Alambre">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Alambres y Mallas</h3>
                    <p class="text-gray-600 text-sm">Alambrón, alambre recocido por kilo, malla electrosoldada para pisos y clavos estándar o para concreto.</p>
                </div>
            </div>
            
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1533062635-4122d25d1947?w=600" class="hover-zoom-img" alt="Perfiles">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Perfiles Tubulares</h3>
                    <p class="text-gray-600 text-sm">PTR, perfil rectangular y cuadrado para herrería. Ángulos, soleras y láminas para techumbres.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>