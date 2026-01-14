<?php include 'includes/header.php'; ?>

<div class="relative bg-[#003366] py-16">
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <img src="https://images.unsplash.com/photo-1581244277943-fe4a9c777189?auto=format&fit=crop&q=80" class="w-full h-full object-cover" alt="Trabaja con nosotros">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Únete a Nuestro Equipo</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Estamos buscando gente trabajadora y con ganas de aprender. Si te apasiona el servicio y la construcción, este es tu lugar.</p>
    </div>
</div>

<main class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        
        <div class="grid md:grid-cols-2 gap-12 items-start max-w-6xl mx-auto">
            
            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-orange-500 animate-fade-up">
                <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center gap-2">
                    <i class="ph-fill ph-pencil-simple-line text-orange-500"></i> Envía tus datos
                </h2>
                
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Nombre Completo</label>
                        <input type="text" name="nombre" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 transition" placeholder="Ej. Juan Pérez" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2 text-sm">Teléfono / WhatsApp</label>
                            <input type="tel" name="telefono" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 transition" placeholder="Ej. 313 123 4567" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2 text-sm">Correo Electrónico</label>
                            <input type="email" name="correo" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 transition" placeholder="tucorreo@ejemplo.com" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Área de interés</label>
                        <select name="puesto" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 transition">
                            <option>Ventas / Mostrador</option>
                            <option>Almacén / Bodega</option>
                            <option>Caja / Administrativo</option>
                            <option>Chofer / Reparto</option>
                            <option>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Breve experiencia o mensaje</label>
                        <textarea name="mensaje" rows="3" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 transition" placeholder="Cuéntanos brevemente dónde has trabajado o por qué quieres unirte a nosotros..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#003366] hover:bg-[#002244] text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                        Enviar Solicitud
                    </button>
                    <p class="text-xs text-gray-400 text-center mt-3">Tus datos serán tratados confidencialmente para fines de reclutamiento.</p>
                </form>
            </div>

            <div class="space-y-8">
                
                <div class="bg-blue-50 p-8 rounded-2xl border border-blue-100">
                    <h3 class="text-xl font-bold text-[#003366] mb-4">¿Cómo funciona?</h3>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">1</span>
                            <p class="text-gray-600 text-sm">Llena este formulario con tus datos básicos para registrarte en nuestra base de datos.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">2</span>
                            <p class="text-gray-600 text-sm">Si tu perfil encaja con una vacante, te llamaremos para una entrevista.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">3</span>
                            <p class="text-gray-600 text-sm">También puedes traer tu <strong>Solicitud de Empleo</strong> o <strong>CV impreso</strong> directamente a la tienda.</p>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-200">
                    <h3 class="text-xl font-bold text-[#003366] mb-2">Contacto Directo RRHH</h3>
                    <p class="text-gray-500 text-sm mb-6">Si tienes dudas o prefieres enviar tu CV por correo:</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-10 h-10 bg-blue-100 text-[#003366] rounded-lg flex items-center justify-center group-hover:bg-[#003366] group-hover:text-white transition">
                                <i class="ph-fill ph-envelope-simple text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-bold uppercase">Correo Electrónico</p>
                                <a href="mailto:rrhh.ferreunion@gmail.com" class="text-gray-700 font-medium hover:text-orange-600 transition">rrhh.ferreunion@gmail.com</a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition">
                                <i class="ph-fill ph-whatsapp-logo text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-bold uppercase">Teléfono / WhatsApp</p>
                                <a href="https://wa.me/523132042474" class="text-gray-700 font-medium hover:text-orange-600 transition">313-204-2474</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>