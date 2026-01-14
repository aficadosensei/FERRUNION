<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-blue-900 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581244277943-fe4a9c777189?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Plomería">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">PLOMERÍA</h1>
            <p class="text-orange-400 mt-2 font-bold uppercase tracking-widest">Hidráulico y Sanitario</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1616400619175-5beda3a17896?w=600" class="hover-zoom-img" alt="Tubos">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Tubería PVC y CPVC</h3>
                    <p class="text-gray-600 text-sm">Sistemas completos para agua fría, agua caliente y drenaje. Cédula 40 y 80 en diversos diámetros.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://plus.unsplash.com/premium_photo-1678735282570-51c33a25c141?w=600" class="hover-zoom-img" alt="Conexiones">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Conexiones</h3>
                    <p class="text-gray-600 text-sm">Codos, tees, coples, yees y adaptadores. Todo lo necesario para armar tu red hidráulica.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1563311186-b452ae82882c?w=600" class="hover-zoom-img" alt="Bombas">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Bombas y Tinacos</h3>
                    <p class="text-gray-600 text-sm">Almacenamiento y presión de agua. Tinacos tricapa, bombas periféricas y centrífugas de 1/2HP y 1HP.</p>
                </div>
            </div>
            
             <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1584622050111-993a426fbf0a?w=600" class="hover-zoom-img" alt="Grifo">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Válvulas y Grifería</h3>
                    <p class="text-gray-600 text-sm">Llaves de paso, válvulas check, mezcladoras para lavabo y fregadero.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>