/**
 * Layunin Masterpiece Navigation (v9.8)
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileClose = document.querySelector('.mobile-close');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const siteHeader = document.querySelector('.site-header');

    const toggleOverlay = () => {
        if(mobileOverlay) mobileOverlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    };

    if (menuToggle) menuToggle.addEventListener('click', toggleOverlay);
    if (mobileClose) mobileClose.addEventListener('click', toggleOverlay);

    // Sticky Scroll
    window.addEventListener('scroll', function() {
        if (siteHeader) {
            if (window.scrollY > 40) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }
        }
    });

    // Dark Mode persistence - REPAIRED
    const darkModeToggles = document.querySelectorAll('#dark-mode-toggle, #dark-mode-toggle-mobile');

    const applyDarkMode = (isDark) => {
        if (isDark) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    };

    // Initial load
    const savedMode = localStorage.getItem('layunin_elite_dark');
    if (savedMode === 'true') {
        applyDarkMode(true);
    }

    darkModeToggles.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const isNowDark = !document.body.classList.contains('dark-mode');
            applyDarkMode(isNowDark);
            localStorage.setItem('layunin_elite_dark', isNowDark);
        });
    });

    // AOS - Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-up').forEach(el => observer.observe(el));

    // Smooth Scroll for TOC
    document.querySelectorAll('.table-of-contents a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            if (target) {
                const headerOffset = 150;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    });
});
