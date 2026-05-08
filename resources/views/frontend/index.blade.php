@extends('layouts.app')

@section('title', 'Home - Latest Jobs, Results & Admit Cards')
@section('meta_description', 'Browse the latest government job notifications, admit cards, exam results, and education news. Stay updated with JobYaari Blog.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <span class="hero-badge animate-fade-in">
                    <i class="bi bi-lightning-charge-fill"></i> Latest Updates
                </span>
                <h1 class="hero-title animate-slide-up">Stay Ahead with <span class="text-gradient">Latest News</span> & Job Updates</h1>
                <p class="hero-subtitle animate-slide-up-delay">Your one-stop destination for government jobs, admit cards, results, and education news. Never miss an important update.</p>
                <div class="hero-search animate-slide-up-delay-2">
                    <div class="search-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" id="heroSearch" class="form-control" placeholder="Search blogs, jobs, results..." autocomplete="off">
                        <div class="search-suggestions" id="searchSuggestions"></div>
                    </div>
                </div>
                <div class="hero-stats animate-fade-in-delay">
                    <div class="stat-item">
                        <span class="stat-number">{{ $blogs->total() }}+</span>
                        <span class="stat-label">Articles</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $categories->count() }}</span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-number">Daily</span>
                        <span class="stat-label">Updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-wave">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z" fill="var(--bg-primary)"/>
        </svg>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="sidebar-sticky">
                    <!-- Search Filter -->
                    <div class="filter-card">
                        <h5 class="filter-title">
                            <i class="bi bi-search"></i> Search
                        </h5>
                        <div class="search-filter-input">
                            <input type="text" class="form-control" id="sidebarSearch" placeholder="Search articles...">
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-card">
                        <h5 class="filter-title">
                            <i class="bi bi-grid-3x3-gap-fill"></i> Categories
                        </h5>
                        <div class="category-list">
                            <label class="category-item active" data-category="all">
                                <input type="radio" name="category" value="all" checked>
                                <span class="category-name">All Categories</span>
                                <span class="category-count">{{ $blogs->total() }}</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="category-item" data-category="{{ $category->id }}">
                                <input type="radio" name="category" value="{{ $category->id }}">
                                <span class="category-name">{{ $category->name }}</span>
                                <span class="category-count">{{ $category->blogs_count }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Date Filter -->
                    <div class="filter-card">
                        <h5 class="filter-title">
                            <i class="bi bi-calendar3"></i> Date Range
                        </h5>
                        <div class="mb-3">
                            <label class="form-label small">From</label>
                            <input type="date" class="form-control form-control-sm" id="dateFrom">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">To</label>
                            <input type="date" class="form-control form-control-sm" id="dateTo">
                        </div>
                        <button class="btn btn-sm btn-outline-custom w-100" id="clearDates">
                            <i class="bi bi-x-circle"></i> Clear Dates
                        </button>
                    </div>

                    <!-- Sort Filter -->
                    <div class="filter-card">
                        <h5 class="filter-title">
                            <i class="bi bi-sort-down"></i> Sort By
                        </h5>
                        <select class="form-select form-select-sm" id="sortFilter">
                            <option value="latest">Latest First</option>
                            <option value="oldest">Oldest First</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Blog Content -->
            <div class="col-lg-9">
                <!-- Results Header -->
                <div class="results-header">
                    <div class="results-info">
                        <h4 class="section-title"><i class="bi bi-newspaper"></i> Latest Articles</h4>
                        <span class="results-count" id="resultsCount">Showing {{ $blogs->total() }} articles</span>
                    </div>
                    <!-- Mobile Filter Toggle -->
                    <button class="btn btn-outline-custom btn-sm d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileFilters">
                        <i class="bi bi-funnel-fill"></i> Filters
                    </button>
                </div>

                <!-- Loading Spinner -->
                <div class="loading-overlay" id="loadingOverlay" style="display:none;">
                    <div class="spinner-container">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading articles...</p>
                    </div>
                </div>

                <!-- Blog Cards Container -->
                <div class="blog-cards-container" id="blogCardsContainer">
                    @include('frontend.partials.blog-cards', ['blogs' => $blogs])
                </div>

                <!-- Pagination -->
                <div class="pagination-container" id="paginationContainer">
                    @include('frontend.partials.pagination', ['blogs' => $blogs])
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Filters Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileFilters">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title"><i class="bi bi-funnel-fill"></i> Filters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Mobile Search -->
        <div class="filter-card">
            <h6 class="filter-title"><i class="bi bi-search"></i> Search</h6>
            <input type="text" class="form-control" id="mobileSearch" placeholder="Search...">
        </div>
        <!-- Mobile Category Filter -->
        <div class="filter-card">
            <h6 class="filter-title"><i class="bi bi-grid-3x3-gap-fill"></i> Categories</h6>
            <div class="category-list">
                <label class="category-item active" data-category="all">
                    <input type="radio" name="mobile_category" value="all" checked>
                    <span class="category-name">All Categories</span>
                </label>
                @foreach($categories as $category)
                <label class="category-item" data-category="{{ $category->id }}">
                    <input type="radio" name="mobile_category" value="{{ $category->id }}">
                    <span class="category-name">{{ $category->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        <!-- Mobile Sort -->
        <div class="filter-card">
            <h6 class="filter-title"><i class="bi bi-sort-down"></i> Sort By</h6>
            <select class="form-select form-select-sm" id="mobileSortFilter">
                <option value="latest">Latest First</option>
                <option value="oldest">Oldest First</option>
            </select>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/blog-filter.js') }}"></script>
@endpush
