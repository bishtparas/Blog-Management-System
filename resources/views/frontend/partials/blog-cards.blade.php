@if($blogs->count() > 0)
<div class="row g-4">
    @foreach($blogs as $blog)
    <div class="col-md-6 col-xl-4">
        <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card-wrapper">
        <article class="blog-card" data-aos="fade-up">
            <div class="blog-card-image">
                @if($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
                @else
                    <div class="blog-card-placeholder">
                        <i class="bi bi-image"></i>
                    </div>
                @endif
                <span class="blog-card-category">{{ $blog->category->name }}</span>
            </div>
            <div class="blog-card-body">
                <div class="blog-card-meta">
                    <span><i class="bi bi-calendar3"></i> {{ $blog->publish_date->format('M d, Y') }}</span>
                    <span><i class="bi bi-clock"></i> {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                </div>
                <h3 class="blog-card-title">{{ Str::limit($blog->title, 65) }}</h3>
                <p class="blog-card-excerpt">{{ Str::limit($blog->short_description, 120) }}</p>
                <span class="blog-card-link">
                    Read More <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </article>
        </a>
    </div>
    @endforeach
</div>
@else
<div class="empty-state">
    <div class="empty-state-icon">
        <i class="bi bi-journal-x"></i>
    </div>
    <h4>No Articles Found</h4>
    <p>Try adjusting your filters or search terms to find what you're looking for.</p>
    <button class="btn btn-primary-custom" id="resetFilters">
        <i class="bi bi-arrow-counterclockwise"></i> Reset Filters
    </button>
</div>
@endif
