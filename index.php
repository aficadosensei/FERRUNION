<?php include 'includes/header.php'; ?>

<main>
    <section class="relative h-[500px] w-full overflow-hidden bg-gray-900 hover-zoom-container">
        <img src="https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?q=80&w=2000&auto=format&fit=crop" class="hover-zoom-img absolute inset-0 object-cover opacity-60" alt="Ferretería">
        <div class="absolute inset-0 flex items-center container mx-auto px-4 z-10">
            <div class="max-w-2xl text-white space-y-6 animate-fade-up">
                <div class="inline-block bg-orange-500 px-3 py-1 text-xs font-bold uppercase rounded mb-2">Soluciones Integrales</div>
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                    Construimos tus <br> <span class="text-orange-400">Grandes Proyectos</span>
                </h1>
                <p class="text-lg text-gray-200 border-l-4 border-orange-500 pl-4">
                    Todo lo que necesitas en un solo lugar. Desde los cimientos hasta los acabados.
                </p>
                <div class="pt-4 flex gap-4">
                    <a href="construccion.php" class="btn-orange px-8 py-3 rounded font-bold">Ver Catálogo</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-[#003366] uppercase">Nuestras Divisiones</h2>
                <div class="h-1 w-20 bg-orange-500 mx-auto mt-4 rounded"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <a href="aceros.php" class="cat-card group relative h-80 rounded-xl overflow-hidden shadow-lg cursor-pointer hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1535732759880-bbd5c7265e3f?w=600" class="hover-zoom-img absolute inset-0 object-cover" alt="Aceros">
                    <div class="cat-card-overlay absolute inset-0 flex flex-col justify-end p-6">
                        <i class="ph-fill ph-grid-nine text-white text-4xl mb-2"></i>
                        <h3 class="text-white text-2xl font-bold">Aceros</h3>
                        <p class="text-white text-sm opacity-90">Varilla, Armex, Perfiles...</p>
                    </div>
                </a>

                <a href="construccion.php" class="cat-card group relative h-80 rounded-xl overflow-hidden shadow-lg cursor-pointer hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600" class="hover-zoom-img absolute inset-0 object-cover" alt="Obra Gris">
                    <div class="cat-card-overlay absolute inset-0 flex flex-col justify-end p-6">
                        <i class="ph-fill ph-wall text-white text-4xl mb-2"></i>
                        <h3 class="text-white text-2xl font-bold">Obra Gris</h3>
                        <p class="text-white text-sm opacity-90">Cemento, Cal, Agregados...</p>
                    </div>
                </a>

                <a href="plomeria.php" class="cat-card group relative h-80 rounded-xl overflow-hidden shadow-lg cursor-pointer hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1581244277943-fe4a9c777189?w=600" class="hover-zoom-img absolute inset-0 object-cover" alt="Plomería">
                    <div class="cat-card-overlay absolute inset-0 flex flex-col justify-end p-6">
                        <i class="ph-fill ph-drop text-white text-4xl mb-2"></i>
                        <h3 class="text-white text-2xl font-bold">Plomería</h3>
                        <p class="text-white text-sm opacity-90">Tubería y Conexiones...</p>
                    </div>
                </a>

                <a href="herramientas.php" class="cat-card group relative h-80 rounded-xl overflow-hidden shadow-lg cursor-pointer hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1572981779307-38b8cabb2407?w=600" class="hover-zoom-img absolute inset-0 object-cover" alt="Herramientas">
                    <div class="cat-card-overlay absolute inset-0 flex flex-col justify-end p-6">
                        <i class="ph-fill ph-wrench text-white text-4xl mb-2"></i>
                        <h3 class="text-white text-2xl font-bold">Herramientas</h3>
                        <p class="text-white text-sm opacity-90">Manuales y Eléctricas...</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>