/**
 * Layunin Navigation and Frontend logic - Masterpiece v5.0
 */
window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.classList.add('fade-out');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');

    if (menuToggle && siteNavigation) {
        menuToggle.addEventListener('click', function() {
            siteNavigation.classList.toggle('toggled');
            const isToggled = siteNavigation.classList.contains('toggled');
            this.innerHTML = isToggled ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
    }

    // Scroll events
    const siteHeader = document.querySelector('.site-header');
    const backToTop = document.getElementById('back-to-top');
    const progressBar = document.querySelector('.reading-progress-bar');

    window.addEventListener('scroll', function() {
        const scrolled = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

        if (scrolled > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }

        if (backToTop) {
            backToTop.style.display = scrolled > 300 ? 'flex' : 'none';
        }

        if (progressBar && docHeight > 0) {
            const scrollPercent = (scrolled / docHeight) * 100;
            progressBar.style.width = scrollPercent + '%';
        }
    });

    if (backToTop) {
        backToTop.onclick = (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    }

    // Dark Mode Logic
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');
    const toggleDarkMode = function(e) {
        if(e) e.preventDefault();
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('layunin_dark_mode', document.body.classList.contains('dark-mode'));
    };

    darkModeToggles.forEach(btn => btn.addEventListener('click', toggleDarkMode));
    if (localStorage.getItem('layunin_dark_mode') === 'true') {
        document.body.classList.add('dark-mode');
    }

    // Reading Mode Logic
    const readingToggle = document.getElementById('reading-mode-toggle');
    if (readingToggle) {
        readingToggle.onclick = (e) => {
            e.preventDefault();
            document.body.classList.toggle('reading-mode');
        };
    }

    // Search Overlay Logic
    const searchOpen = document.querySelectorAll('#search-open, #search-open-mobile');
    const searchClose = document.getElementById('search-close');
    const searchOverlay = document.getElementById('search-overlay');

    searchOpen.forEach(btn => {
        btn.onclick = (e) => {
            e.preventDefault();
            searchOverlay.style.display = 'block';
            searchOverlay.querySelector('input').focus();
        };
    });

    if (searchClose) {
        searchClose.onclick = () => searchOverlay.style.display = 'none';
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
