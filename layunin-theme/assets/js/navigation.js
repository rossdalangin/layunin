/**
 * Layunin Navigation and Frontend logic
 */
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');

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
});
