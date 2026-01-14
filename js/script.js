/* js/script.js */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Menú Móvil (Toggle)
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 2. Bienvenida Consola (Opcional)
    console.log("FerreMateriales La Unión - Sitio Cargado Correctamente");
});