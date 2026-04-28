/**
 * Layunin Masterpiece Navigation (v7.0)
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const siteHeader = document.querySelector('.site-header');

    if (menuToggle && mobileOverlay) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileOverlay.classList.toggle('active');
            document.body.classList.toggle('no-scroll');

            // Hamburger icon animation
            menuToggle.classList.toggle('active');
        });
    }

    // Scroll handling
    window.addEventListener('scroll', function() {
        if (window.scrollY > 30) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
    });

    // Dark Mode persistence
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');
    const toggleDark = () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('layunin_theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
    };

    darkModeToggles.forEach(btn => btn.addEventListener('click', toggleDark));

    if (localStorage.getItem('layunin_theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }

    // AOS Logic
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));
});
