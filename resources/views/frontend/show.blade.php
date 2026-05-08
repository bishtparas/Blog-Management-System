@extends('layouts.app')

@section('title', $blog->title)
@section('meta_description', $blog->short_description)

@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $blog->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog->title, 40) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Blog Detail -->
<section class="blog-detail-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="blog-detail-card">
                    <!-- Featured Image -->
                    @if($blog->image)
                    <div class="blog-detail-image">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
                    </div>
                    @endif

                    <!-- Blog Header -->
                    <div class="blog-detail-header">
                        <span class="category-badge">{{ $blog->category->name }}</span>
                        <h1 class="blog-detail-title">{{ $blog->title }}</h1>
                        <div class="blog-detail-meta">
                            <span><i class="bi bi-calendar3"></i> {{ $blog->publish_date->format('F d, Y') }}</span>
                            <span><i class="bi bi-clock"></i> {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                            <span><i class="bi bi-person"></i> Admin</span>
                        </div>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-detail-content">
                        {!! $blog->content !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="blog-share">
                        <h5><i class="bi bi-share-fill"></i> Share this article</h5>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn facebook">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="share-btn twitter">
                                <i class="bi bi-twitter-x"></i> Twitter
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="share-btn linkedin">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . request()->url()) }}" target="_blank" class="share-btn whatsapp">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>

                    <!-- Previous/Next Navigation -->
                    <div class="blog-navigation">
                        <div class="row g-3">
                            <div class="col-6">
                                @if($previousPost)
                                <a href="{{ route('blog.show', $previousPost->slug) }}" class="nav-post nav-prev">
                                    <span class="nav-label"><i class="bi bi-arrow-left"></i> Previous</span>
                                    <span class="nav-title">{{ Str::limit($previousPost->title, 50) }}</span>
                                </a>
                                @endif
                            </div>
                            <div class="col-6 text-end">
                                @if($nextPost)
                                <a href="{{ route('blog.show', $nextPost->slug) }}" class="nav-post nav-next">
                                    <span class="nav-label">Next <i class="bi bi-arrow-right"></i></span>
                                    <span class="nav-title">{{ Str::limit($nextPost->title, 50) }}</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section (Frontend Only) -->
                    <div class="comments-section">
                        <h4><i class="bi bi-chat-dots-fill"></i> Comments</h4>
                        <div class="comment-form-wrapper">
                            <form class="comment-form" onsubmit="return false;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="4" placeholder="Write your comment..." required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary-custom">
                                            <i class="bi bi-send-fill"></i> Post Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="comments-list">
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <div class="comment-body">
                                    <div class="comment-header">
                                        <strong>Rahul Sharma</strong>
                                        <span class="comment-date">2 days ago</span>
                                    </div>
                                    <p>Very informative article! This helped me a lot in my preparation. Thanks for sharing.</p>
                                </div>
                            </div>
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <div class="comment-body">
                                    <div class="comment-header">
                                        <strong>Priya Singh</strong>
                                        <span class="comment-date">5 days ago</span>
                                    </div>
                                    <p>Great content! Please keep posting such useful updates regularly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-sticky">
                    <!-- Categories Widget -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title"><i class="bi bi-grid-3x3-gap-fill"></i> Categories</h5>
                        <ul class="widget-categories">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('home') }}?category={{ $cat->id }}">
                                    <span>{{ $cat->name }}</span>
                                    <span class="badge bg-primary-subtle text-primary">{{ $cat->blogs_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Related Posts Widget -->
                    @if($relatedPosts->count() > 0)
                    <div class="sidebar-widget">
                        <h5 class="widget-title"><i class="bi bi-journal-text"></i> Related Posts</h5>
                        <div class="related-posts">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('blog.show', $related->slug) }}" class="related-post-item">
                                <div class="related-post-image">
                                    @if($related->image)
                                        <img src="{{ asset($related->image) }}" alt="{{ $related->title }}" loading="lazy">
                                    @else
                                        <div class="related-post-placeholder"><i class="bi bi-image"></i></div>
                                    @endif
                                </div>
                                <div class="related-post-info">
                                    <h6>{{ Str::limit($related->title, 55) }}</h6>
                                    <span class="text-muted small">{{ $related->publish_date->format('M d, Y') }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
