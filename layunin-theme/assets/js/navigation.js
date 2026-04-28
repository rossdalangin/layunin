/**
 * Layunin Navigation - Masterpiece Elite
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');
    const siteHeader = document.querySelector('.site-header');

    if (menuToggle && siteNavigation) {
        menuToggle.addEventListener('click', function() {
            siteNavigation.classList.toggle('toggled');
            siteNavigation.classList.toggle('d-none');
            const isToggled = siteNavigation.classList.contains('toggled');
            menuToggle.innerHTML = isToggled ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
            document.body.style.overflow = isToggled ? 'hidden' : '';
        });
    }

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
    });

    // Intersection Observer for AOS
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));

    // Dark Mode persistent logic
    const darkModeBtn = document.getElementById('dark-mode-toggle');
    const darkModeBtnMobile = document.getElementById('dark-mode-toggle-mobile');

    const toggleDark = () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('layunin_dark', document.body.classList.contains('dark-mode'));
    };

    if(darkModeBtn) darkModeBtn.onclick = toggleDark;
    if(darkModeBtnMobile) darkModeBtnMobile.onclick = toggleDark;

    if(localStorage.getItem('layunin_dark') === 'true') {
        document.body.classList.add('dark-mode');
    }
});
