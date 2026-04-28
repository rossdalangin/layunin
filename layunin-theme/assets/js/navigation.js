/**
 * Layunin Navigation and Frontend logic - Masterpiece v4.0
 */
window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.classList.add('fade-out');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle Fix
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');

    if (menuToggle && siteNavigation) {
        menuToggle.addEventListener('click', function() {
            siteNavigation.classList.toggle('toggled');
            const isToggled = siteNavigation.classList.contains('toggled');
            this.setAttribute('aria-expanded', isToggled);
            this.innerHTML = isToggled ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
    }

    // Scroll events for Header and Back-to-Top
    const siteHeader = document.querySelector('.site-header');
    const backToTop = document.getElementById('back-to-top');

    window.addEventListener('scroll', function() {
        const scrolled = window.scrollY;

        if (scrolled > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }

        if (backToTop) {
            backToTop.style.display = scrolled > 300 ? 'flex' : 'none';
        }
    });

    if (backToTop) {
        backToTop.onclick = (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    }

    // Dark Mode Toggle
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');
    const toggleDarkMode = function() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('layunin_dark_mode', document.body.classList.contains('dark-mode'));
    };

    darkModeToggles.forEach(btn => btn.addEventListener('click', toggleDarkMode));

    if (localStorage.getItem('layunin_dark_mode') === 'true') {
        document.body.classList.add('dark-mode');
    }

    // Intersection Observer for Scroll Animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));
});
