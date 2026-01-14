<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-red-700 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-50" alt="Pintura">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">ACABADOS</h1>
            <p class="text-orange-400 mt-2 font-bold uppercase tracking-widest">Color y Protección</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=600" class="hover-zoom-img" alt="Cubeta">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Pinturas Vinílicas</h3>
                    <p class="text-gray-600 text-sm">Renueva tus espacios. Pintura base agua lavable, esmaltes alquidálicos y aerosoles en gran variedad de colores.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=600" class="hover-zoom-img" alt="Impermeabilizante">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Impermeabilizantes</h3>
                    <p class="text-gray-600 text-sm">Protege tu hogar de filtraciones. Impermeabilizante acrílico rojo y blanco con duración de 3, 5 y 7 años.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1599648937841-356b278fc048?w=600" class="hover-zoom-img" alt="Brochas">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Complementos</h3>
                    <p class="text-gray-600 text-sm">Todo para aplicar: Brochas, rodillos, extensiones, charolas, cinta masking tape y plásticos protectores.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>