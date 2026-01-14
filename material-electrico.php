<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-yellow-700 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Cableado">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">MATERIAL ELÉCTRICO</h1>
            <p class="text-yellow-400 mt-2 font-bold uppercase tracking-widest">Conectividad y Energía</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1558346490-a72e53ae2d4f?w=600" class="hover-zoom-img" alt="Cables">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Cableado y Conductores</h3>
                    <p class="text-gray-600 text-sm">Cable THW de cobre, cable dúplex y de uso rudo. Calibres del 8 al 14 para instalaciones residenciales e industriales.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1621905251918-48416bd8575a?w=600" class="hover-zoom-img" alt="Poliducto">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Canalización</h3>
                    <p class="text-gray-600 text-sm">Poliducto naranja reforzado, tubería conduit pared delgada y gruesa, chalupas y cajas de registro.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1582239424683-162b192881b2?w=600" class="hover-zoom-img" alt="Placas">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Placas y Apagadores</h3>
                    <p class="text-gray-600 text-sm">Líneas residenciales modernas. Placas armadas, contactos dúplex, apagadores sencillos y de escalera.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1563749463566-3d44cb25ee5b?w=600" class="hover-zoom-img" alt="Pastillas">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Centros de Carga</h3>
                    <p class="text-gray-600 text-sm">Gabinetes QOD, pastillas termomagnéticas (breakers) y fusibles para proteger tu instalación.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>