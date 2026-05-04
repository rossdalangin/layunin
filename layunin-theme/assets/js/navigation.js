/**
 * Layunin Masterpiece Navigation (v8.0)
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileClose = document.querySelector('.mobile-close');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const siteHeader = document.querySelector('.site-header');

    const toggleOverlay = () => {
        const isActive = mobileOverlay.classList.toggle('active');
        document.body.style.overflow = isActive ? 'hidden' : '';

        if (isActive) {
            const links = mobileOverlay.querySelectorAll('.mobile-nav .nav-link');
            links.forEach((link, index) => {
                link.style.transitionDelay = `${0.1 + (index * 0.1)}s`;
            });
        }
    };

    if (menuToggle) menuToggle.onclick = toggleOverlay;
    if (mobileClose) mobileClose.onclick = toggleOverlay;

    // Sticky Scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 40) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
    });

    // Dark Mode persistence
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');
    const toggleDark = () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('layunin_elite_dark', document.body.classList.contains('dark-mode'));
    };

    darkModeToggles.forEach(btn => btn.addEventListener('click', toggleDark));
    if (localStorage.getItem('layunin_elite_dark') === 'true') {
        document.body.classList.add('dark-mode');
    }

    // AOS
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));
});
