<?php include 'includes/header.php'; ?>

<main class="bg-gray-50 flex flex-col min-h-screen">
    <div class="relative bg-gray-900 h-64 flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581235720704-06d3acfcb363?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-50" alt="Herramientas">
        <div class="relative z-10 text-center px-4 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">HERRAMIENTAS</h1>
            <p class="text-orange-400 mt-2 font-bold uppercase tracking-widest">Manuales, Eléctricas y Seguridad</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1504148455328-c376907d081c?w=600" class="hover-zoom-img" alt="Taladro">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Poder Eléctrico</h3>
                    <p class="text-gray-600 text-sm">Herramienta de alto rendimiento: Taladros inalámbricos, esmeriladoras angulares, sierras circulares y rotomartillos.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1586864387967-d02ef85d93e8?w=600" class="hover-zoom-img" alt="Manuales">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Herramienta Manual</h3>
                    <p class="text-gray-600 text-sm">Lo esencial para tu caja: Desarmadores, pinzas de presión, llaves españolas, martillos y flexómetros.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1530124566582-a618bc2615dc?w=600" class="hover-zoom-img" alt="Pala">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Equipo de Albañilería</h3>
                    <p class="text-gray-600 text-sm">Palas cuadradas y redondas, picos, carretillas reforzadas, cucharas y llanas.</p>
                </div>
            </div>

            <div class="product-card">
                <div class="h-56 hover-zoom-container">
                    <img src="https://images.unsplash.com/photo-1605218427360-36390f854a36?w=600" class="hover-zoom-img" alt="Seguridad">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Seguridad Industrial</h3>
                    <p class="text-gray-600 text-sm">Tu integridad es primero. Cascos, chalecos reflejantes, guantes de carnaza/nitrilo y botas de seguridad.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>