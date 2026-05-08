/**
 * Blog AJAX Filtering System
 * Handles: Category filter, Search, Date filter, Sort, Pagination
 * All updates happen WITHOUT page reload
 */
$(document).ready(function () {

    var currentPage = 1;
    var searchTimer;

    // ========================================
    // CHECK URL PARAMS ON LOAD
    // ========================================
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('category')) {
        var catId = urlParams.get('category');
        selectCategory(catId);
        filterBlogs();
    }

    // ========================================
    // CATEGORY FILTER (Desktop)
    // ========================================
    $('.category-item').on('click', function () {
        var cat = $(this).data('category');
        selectCategory(cat);
        currentPage = 1;
        filterBlogs();
    });

    function selectCategory(catId) {
        // Update desktop sidebar
        $('.category-item').removeClass('active');
        $('.category-item[data-category="' + catId + '"]').addClass('active');
        $('.category-item[data-category="' + catId + '"] input').prop('checked', true);

        // Sync mobile filter
        $('#mobileFilters .category-item').removeClass('active');
        $('#mobileFilters .category-item[data-category="' + catId + '"]').addClass('active');
        $('#mobileFilters .category-item[data-category="' + catId + '"] input').prop('checked', true);
    }

    // ========================================
    // SEARCH FILTER (Desktop Sidebar)
    // ========================================
    $('#sidebarSearch').on('input', function () {
        clearTimeout(searchTimer);
        var self = this;
        searchTimer = setTimeout(function () {
            currentPage = 1;
            filterBlogs();
        }, 400);
    });

    // ========================================
    // MOBILE SEARCH
    // ========================================
    $('#mobileSearch').on('input', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            // Sync to desktop search
            $('#sidebarSearch').val($('#mobileSearch').val());
            currentPage = 1;
            filterBlogs();
        }, 400);
    });

    // ========================================
    // DATE FILTER
    // ========================================
    $('#dateFrom, #dateTo').on('change', function () {
        currentPage = 1;
        filterBlogs();
    });

    $('#clearDates').on('click', function () {
        $('#dateFrom').val('');
        $('#dateTo').val('');
        currentPage = 1;
        filterBlogs();
    });

    // ========================================
    // SORT FILTER
    // ========================================
    $('#sortFilter').on('change', function () {
        currentPage = 1;
        filterBlogs();
    });

    // Mobile sort sync
    $('#mobileSortFilter').on('change', function () {
        $('#sortFilter').val($(this).val());
        currentPage = 1;
        filterBlogs();
    });

    // ========================================
    // PAGINATION (AJAX)
    // ========================================
    $(document).on('click', '.custom-pagination .page-link', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        if (page) {
            currentPage = page;
            filterBlogs();
            // Scroll to top of blog section
            $('html, body').animate({
                scrollTop: $('#blogCardsContainer').offset().top - 100
            }, 400);
        }
    });

    // ========================================
    // RESET FILTERS
    // ========================================
    $(document).on('click', '#resetFilters', function () {
        $('#sidebarSearch').val('');
        $('#mobileSearch').val('');
        $('#dateFrom').val('');
        $('#dateTo').val('');
        $('#sortFilter').val('latest');
        $('#mobileSortFilter').val('latest');
        selectCategory('all');
        currentPage = 1;
        filterBlogs();
    });

    // ========================================
    // MAIN FILTER FUNCTION (AJAX)
    // ========================================
    function filterBlogs() {
        // Show loading
        $('#loadingOverlay').show();
        $('#blogCardsContainer').css('opacity', '0.3');

        // Get active category
        var activeCategory = $('input[name="category"]:checked').val() || 'all';

        // Build request data
        var data = {
            search: $('#sidebarSearch').val() || '',
            category: activeCategory,
            date_from: $('#dateFrom').val() || '',
            date_to: $('#dateTo').val() || '',
            sort: $('#sortFilter').val() || 'latest',
            page: currentPage
        };

        $.ajax({
            url: '/',
            type: 'GET',
            data: data,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (response) {
                // Update blog cards
                $('#blogCardsContainer').html(response.html);
                // Update pagination
                $('#paginationContainer').html(response.pagination);
                // Update count
                $('#resultsCount').text('Showing ' + response.total + ' articles');

                // Hide loading
                $('#loadingOverlay').hide();
                $('#blogCardsContainer').css('opacity', '1');

                // Animate cards in
                $('#blogCardsContainer .blog-card').each(function (index) {
                    var card = $(this);
                    card.css({ opacity: 0, transform: 'translateY(20px)' });
                    setTimeout(function () {
                        card.css({
                            opacity: 1,
                            transform: 'translateY(0)',
                            transition: 'all 0.4s ease'
                        });
                    }, index * 80);
                });
            },
            error: function (xhr) {
                console.error('Filter error:', xhr);
                $('#loadingOverlay').hide();
                $('#blogCardsContainer').css('opacity', '1');
                $('#blogCardsContainer').html(
                    '<div class="empty-state">' +
                    '<div class="empty-state-icon"><i class="bi bi-exclamation-triangle"></i></div>' +
                    '<h4>Something went wrong</h4>' +
                    '<p>Please try again later.</p></div>'
                );
            }
        });
    }
});
