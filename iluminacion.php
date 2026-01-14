<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-gray-900 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Luz">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">ILUMINACIÓN</h1>
            <p class="text-yellow-400 mt-2 font-bold uppercase tracking-widest">Tecnología LED y Decoración</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?w=600" class="hover-zoom-img" alt="Focos LED">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Bombillas LED</h3>
                    <p class="text-gray-600 text-sm">Focos ahorradores tipo A19, tipo vela y globo. Variedad en luz cálida (3000K) y luz de día (6500K).</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1565060169389-c43916972417?w=600" class="hover-zoom-img" alt="Reflectores">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Reflectores Exteriores</h3>
                    <p class="text-gray-600 text-sm">Iluminación de alta potencia para patios, cocheras y fachadas. Reflectores delgados y resistentes a la lluvia (IP65).</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1513506003013-19434d0988bc?w=600" class="hover-zoom-img" alt="Interior">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Lámparas de Techo</h3>
                    <p class="text-gray-600 text-sm">Plafones, empotrados (spots) y gabinetes de sobreponer para cocinas, oficinas y recámaras.</p>
                </div>
            </div>
            
             <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1505330622279-bf7d7fc918f4?w=600" class="hover-zoom-img" alt="Tiras LED">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Decoración LED</h3>
                    <p class="text-gray-600 text-sm">Mangueras luminosas y tiras LED para iluminación indirecta en muebles y plafones.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>