/**
 * Safar Theme - Main JavaScript
 *
 * @package Safar
 */

(function($) {
    'use strict';

    // Mobile Menu Toggle
    function mobileMenu() {
        const toggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('#primary-menu');

        if (!toggle || !menu) return;

        toggle.addEventListener('click', function() {
            menu.classList.toggle('active');
            toggle.classList.toggle('active');
            toggle.setAttribute('aria-expanded', menu.classList.contains('active'));
        });

        // Close menu on click outside
        document.addEventListener('click', function(e) {
            if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                menu.classList.remove('active');
                toggle.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Search Toggle
    function searchToggle() {
        const searchBtn = document.querySelector('.search-toggle');
        const searchOverlay = document.querySelector('.search-overlay');
        const searchClose = document.querySelector('.search-close');
        const searchField = document.querySelector('.search-field');

        if (!searchBtn || !searchOverlay) return;

        searchBtn.addEventListener('click', function() {
            searchOverlay.classList.remove('hidden');
            searchOverlay.classList.add('active');
            if (searchField) searchField.focus();
        });

        if (searchClose) {
            searchClose.addEventListener('click', function() {
                searchOverlay.classList.add('hidden');
                searchOverlay.classList.remove('active');
            });
        }

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
                searchOverlay.classList.add('hidden');
                searchOverlay.classList.remove('active');
            }
        });
    }

    // Back to Top
    function backToTop() {
        const btn = document.getElementById('back-to-top');

        if (!btn) return;

        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                btn.classList.remove('hidden');
                btn.classList.add('visible');
            } else {
                btn.classList.add('hidden');
                btn.classList.remove('visible');
            }
        });

        btn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Smooth Scroll for Anchor Links
    function smoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;

                e.preventDefault();

                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Animate on Scroll
    function animateOnScroll() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        document.querySelectorAll('.card, .stat-card, .category-card, .continent-card').forEach(el => {
            observer.observe(el);
        });
    }

    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');

        counters.forEach(counter => {
            const target = counter.innerText.replace(/[^0-9]/g, '');
            if (!target) return;

            const animate = () => {
                const value = +counter.getAttribute('data-value') || 0;
                const increment = Math.ceil(+target / 50);

                if (value < +target) {
                    counter.setAttribute('data-value', value + increment);
                    counter.innerHTML = (value + increment).toLocaleString('ar-EG');
                    requestAnimationFrame(animate);
                } else {
                    counter.innerHTML = counter.getAttribute('data-original');
                }
            };

            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    counter.setAttribute('data-original', counter.innerHTML);
                    counter.setAttribute('data-value', '0');
                    animate();
                    observer.disconnect();
                }
            });

            observer.observe(counter);
        });
    }

    // Newsletter Form
    function newsletterForm() {
        const form = document.querySelector('.newsletter-form');

        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = form.querySelector('input[type="email"]').value;
            const btn = form.querySelector('button');

            if (!email) return;

            btn.classList.add('loading');
            btn.innerHTML = '<span class="spinner"></span> جاري التسجيل...';

            // Simulate AJAX
            setTimeout(() => {
                btn.classList.remove('loading');
                btn.innerHTML = 'تم التسجيل بنجاح!';
                btn.classList.add('success');
                form.querySelector('input').value = '';

                setTimeout(() => {
                    btn.innerHTML = 'اشترك الآن';
                    btn.classList.remove('success');
                }, 3000);
            }, 1000);
        });
    }

    // Sticky Header
    function stickyHeader() {
        const header = document.querySelector('.main-header');

        if (!header) return;

        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        });
    }

    // Lazy Load Images
    function lazyLoadImages() {
        const images = document.querySelectorAll('img[data-src]');

        if ('loading' in HTMLImageElement.prototype) {
            images.forEach(img => {
                img.src = img.dataset.src;
            });
        } else {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => observer.observe(img));
        }
    }

    // Initialize
    function init() {
        mobileMenu();
        searchToggle();
        backToTop();
        smoothScroll();
        animateOnScroll();
        animateCounters();
        newsletterForm();
        stickyHeader();
        lazyLoadImages();
    }

    // Run on DOM Ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})(jQuery);

// Additional CSS for animations
const style = document.createElement('style');
style.textContent = `
    .animate-in {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .main-header.sticky {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #7c3aed 0%, #3b82f6 100%);
        color: white;
        border: none;
        cursor: pointer;
        opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(124, 58, 237, 0.4);
        z-index: 999;
    }

    .back-to-top.visible {
        opacity: 1;
    }

    .back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(124, 58, 237, 0.5);
    }

    .search-overlay.active {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
        }
        to {
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);
