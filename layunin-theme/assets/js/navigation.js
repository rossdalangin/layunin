/**
 * Layunin Navigation and Frontend logic
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

    // Scroll events
    const siteHeader = document.querySelector('.site-header');
    const heroSection = document.querySelector('.hero-section');
    const backToTop = document.getElementById('back-to-top');

    window.addEventListener('scroll', function() {
        const scrolled = window.scrollY;

        if (scrolled > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }

        // Back to top visibility
        if (scrolled > 300) {
            backToTop.style.display = 'flex';
        } else {
            backToTop.style.display = 'none';
        }

        // Parallax Effect for Hero
        if (heroSection && scrolled < 600) {
            heroSection.style.backgroundPositionY = (scrolled * 0.5) + 'px';
        }
    });

    if (backToTop) {
        backToTop.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    if (menuToggle && siteNavigation) {
        menuToggle.onclick = function() {
            if (siteNavigation.classList.contains('toggled')) {
                siteNavigation.classList.remove('toggled');
                menuToggle.setAttribute('aria-expanded', 'false');
            } else {
                siteNavigation.classList.add('toggled');
                menuToggle.setAttribute('aria-expanded', 'true');
            }
        };
    }

    // Reading Progress Bar
    const progressBar = document.querySelector('.reading-progress-bar');
    if (progressBar) {
        window.onscroll = function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + "%";
        };
    }

    // Dark Mode Toggle
    const darkModeBtn = document.getElementById('dark-mode-toggle');
    // Reading Mode Toggle
    const readingModeBtn = document.getElementById('reading-mode-toggle');
    if (readingModeBtn) {
        readingModeBtn.addEventListener('click', function() {
            document.body.classList.toggle('reading-mode');
        });
    }

    if (darkModeBtn) {
        darkModeBtn.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const isDark = document.body.classList.contains('dark-mode');
            localStorage.setItem('layunin_dark_mode', isDark);
        });

        if (localStorage.getItem('layunin_dark_mode') === 'true') {
            document.body.classList.add('dark-mode');
        }
    }

    // Intersection Observer for Scroll Animations
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-up').forEach(el => {
        observer.observe(el);
    });

    // Search Overlay logic
    const searchOpen = document.getElementById('search-open');
    const searchClose = document.getElementById('search-close');
    const searchOverlay = document.getElementById('search-overlay');

    const searchOpenMobile = document.getElementById('search-open-mobile');
    if (searchOpen && searchOverlay) {
        searchOpen.onclick = () => searchOverlay.style.display = 'block';
    }
    if (searchOpenMobile && searchOverlay) {
        searchOpenMobile.onclick = () => searchOverlay.style.display = 'block';
    }
    if (searchClose && searchOverlay) {
        searchClose.onclick = () => searchOverlay.style.display = 'none';
    }

    // Lead Popup Trigger
    const popupEl = document.getElementById('layunin-popup');
    if (popupEl) {
        // Show after 5 seconds
        setTimeout(() => {
            if (!localStorage.getItem('layunin_popup_shown')) {
                const myModal = new bootstrap.Modal(popupEl);
                myModal.show();
                localStorage.setItem('layunin_popup_shown', 'true');
            }
        }, 5000);
    }
});
