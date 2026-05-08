/**
 * Main Application JavaScript
 * Handles: Dark Mode, Scroll-to-Top, Toast Notifications, Navbar Category Links
 */
$(document).ready(function () {

    // ========================================
    // DARK MODE TOGGLE
    // ========================================
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;

    // Check saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);
    updateDarkModeIcon(savedTheme);

    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function () {
            const current = html.getAttribute('data-theme');
            const next = current === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            updateDarkModeIcon(next);
        });
    }

    function updateDarkModeIcon(theme) {
        if (!darkModeToggle) return;
        const icon = darkModeToggle.querySelector('i');
        if (theme === 'dark') {
            icon.className = 'bi bi-sun-fill';
        } else {
            icon.className = 'bi bi-moon-stars-fill';
        }
    }

    // ========================================
    // SCROLL TO TOP BUTTON
    // ========================================
    const scrollBtn = document.getElementById('scrollToTop');
    if (scrollBtn) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });
        scrollBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ========================================
    // NAVBAR STICKY SHADOW
    // ========================================
    const navbar = document.getElementById('mainNavbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 10) {
                navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.boxShadow = '0 1px 3px rgba(0,0,0,0.08)';
            }
        });
    }

    // ========================================
    // AUTO-DISMISS TOASTS
    // ========================================
    setTimeout(function () {
        $('.toast.show').fadeOut(400, function () {
            $(this).remove();
        });
    }, 4000);

    // ========================================
    // NAVBAR CATEGORY LINKS
    // ========================================
    $('.category-nav-link').on('click', function (e) {
        e.preventDefault();
        var catId = $(this).data('category');
        // Navigate to home with category filter
        window.location.href = '/?category=' + catId;
    });

    // ========================================
    // FOOTER CATEGORY LINKS
    // ========================================
    $('.footer-category-link').on('click', function (e) {
        e.preventDefault();
        var catId = $(this).data('category');
        window.location.href = '/?category=' + catId;
    });

    // ========================================
    // HERO SEARCH WITH SUGGESTIONS
    // ========================================
    var searchTimer;
    $('#heroSearch').on('input', function () {
        var query = $(this).val().trim();
        clearTimeout(searchTimer);

        if (query.length < 2) {
            $('#searchSuggestions').hide().empty();
            return;
        }

        searchTimer = setTimeout(function () {
            $.ajax({
                url: '/search-suggestions',
                data: { q: query },
                success: function (data) {
                    var html = '';
                    if (data.length > 0) {
                        data.forEach(function (item) {
                            html += '<a href="/blog/' + item.slug + '">' +
                                '<i class="bi bi-search me-2"></i>' + item.title + '</a>';
                        });
                        $('#searchSuggestions').html(html).show();
                    } else {
                        $('#searchSuggestions').html('<div class="p-3 text-muted small">No results found</div>').show();
                    }
                }
            });
        }, 300);
    });

    // Hide suggestions on click outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search-wrapper').length) {
            $('#searchSuggestions').hide();
        }
    });

    // Hero search enter key → trigger sidebar search
    $('#heroSearch').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            var query = $(this).val().trim();
            if (query) {
                // Scroll to blog section and trigger search
                $('html, body').animate({ scrollTop: $('.blog-section').offset().top - 80 }, 500);
                $('#sidebarSearch').val(query).trigger('input');
                $('#searchSuggestions').hide();
            }
        }
    });

    // ========================================
    // LAZY LOAD IMAGES (Intersection Observer)
    // ========================================
    if ('IntersectionObserver' in window) {
        var imgObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imgObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(function (img) {
            imgObserver.observe(img);
        });
    }
});
