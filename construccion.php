<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-gray-900 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1590074251022-2621ee1e6a17?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-50" alt="Construcción">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">OBRA GRIS</h1>
            <p class="text-orange-400 mt-2 font-bold uppercase tracking-widest">Polvos, Agregados y Bloques</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600" class="hover-zoom-img" alt="Cemento">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Cementos</h3>
                    <p class="text-gray-600 text-sm">Contamos con cemento gris y blanco de alta resistencia. Venta por bulto individual o por tonelada para grandes obras.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=600" class="hover-zoom-img" alt="Mortero">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Mortero y Cal</h3>
                    <p class="text-gray-600 text-sm">Mezclas listas para albañilería. Mortero para pegado y cal hidratada de la mejor pureza para tus acabados.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1621460245089-3224976735a4?w=600" class="hover-zoom-img" alt="Agregados">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Arenas y Gravas</h3>
                    <p class="text-gray-600 text-sm">Material de banco limpio. Arena de río #4 y #5, grava de 3/4 y piedra base. Servicio de flete disponible.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>