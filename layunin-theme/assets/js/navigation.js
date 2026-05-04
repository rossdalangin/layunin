/**
 * Layunin Masterpiece Navigation (v9.8)
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileClose = document.querySelector('.mobile-close');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const searchOverlay = document.getElementById('search-overlay');
    const searchInput = document.getElementById('search-input-overlay');
    const siteHeader = document.querySelector('.site-header');

    const toggleOverlay = () => {
        if(mobileOverlay) {
            const isActive = mobileOverlay.classList.toggle('active');
            document.body.style.overflow = isActive ? 'hidden' : '';

            // Staggered animation for nav items
            const navLinks = mobileOverlay.querySelectorAll('.mobile-nav .nav-link');
            navLinks.forEach((link, index) => {
                if (isActive) {
                    link.style.opacity = '0';
                    link.style.transform = 'translateY(20px)';
                    link.style.transition = `all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) ${0.1 + (index * 0.05)}s`;
                    setTimeout(() => {
                        link.style.opacity = '1';
                        link.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    link.style.opacity = '';
                    link.style.transform = '';
                    link.style.transition = '';
                }
            });
        }
    };

    if (menuToggle) menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        toggleOverlay();
    });
    if (mobileClose) mobileClose.addEventListener('click', function(e) {
        e.preventDefault();
        toggleOverlay();
    });

    // Close on link click
    const mobileLinks = document.querySelectorAll('.mobile-nav a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const parent = link.parentElement;
            if (parent.classList.contains('menu-item-has-children')) {
                e.preventDefault();
                parent.classList.toggle('active');
            } else {
                if (mobileOverlay && mobileOverlay.classList.contains('active')) {
                    toggleOverlay();
                }
            }
        });
    });

    // Search Overlay Logic
    const openSearch = (e) => {
        if(e) e.preventDefault();
        if(searchOverlay) {
            searchOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                if(searchInput) searchInput.focus();
            }, 300);
        }
    };

    const closeSearch = () => {
        if(searchOverlay) {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    const searchOpenBtns = document.querySelectorAll('#search-open, #search-open-mobile');
    const searchCloseBtn = document.getElementById('search-close');

    searchOpenBtns.forEach(btn => btn.addEventListener('click', openSearch));
    if(searchCloseBtn) searchCloseBtn.addEventListener('click', closeSearch);

    // Close search on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeSearch();
            if (mobileOverlay && mobileOverlay.classList.contains('active')) {
                toggleOverlay();
            }
        }
    });

    // Sticky Scroll & Reading Progress
    const progressBar = document.getElementById('reading-progress-bar');

    window.addEventListener('scroll', function() {
        if (siteHeader) {
            if (window.scrollY > 40) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }
        }

        if (progressBar) {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + "%";
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
