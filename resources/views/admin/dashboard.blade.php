@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-primary">
            <div class="stat-card-body">
                <div class="stat-info">
                    <span class="stat-label">Total Blogs</span>
                    <h3 class="stat-value">{{ $totalBlogs }}</h3>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('admin.blogs.index') }}">View All <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-success">
            <div class="stat-card-body">
                <div class="stat-info">
                    <span class="stat-label">Published</span>
                    <h3 class="stat-value">{{ $publishedBlogs }}</h3>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                <span>Live Articles</span>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-warning">
            <div class="stat-card-body">
                <div class="stat-info">
                    <span class="stat-label">Drafts</span>
                    <h3 class="stat-value">{{ $draftBlogs }}</h3>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                <span>Pending Review</span>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-info">
            <div class="stat-card-body">
                <div class="stat-info">
                    <span class="stat-label">Categories</span>
                    <h3 class="stat-value">{{ $totalCategories }}</h3>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                <a href="{{ route('admin.categories.index') }}">Manage <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Posts -->
<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="bi bi-lightning-charge-fill text-warning"></i> Quick Actions</h5>
            </div>
            <div class="admin-card-body">
                <div class="quick-actions">
                    <a href="{{ route('admin.blogs.create') }}" class="quick-action-btn">
                        <div class="qa-icon bg-primary-subtle"><i class="bi bi-plus-lg text-primary"></i></div>
                        <div>
                            <h6>New Blog Post</h6>
                            <span>Create a new article</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="quick-action-btn">
                        <div class="qa-icon bg-success-subtle"><i class="bi bi-folder-plus text-success"></i></div>
                        <div>
                            <h6>Manage Categories</h6>
                            <span>Add or edit categories</span>
                        </div>
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="quick-action-btn">
                        <div class="qa-icon bg-info-subtle"><i class="bi bi-globe text-info"></i></div>
                        <div>
                            <h6>View Website</h6>
                            <span>Open frontend</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="bi bi-clock-history text-primary"></i> Recent Posts</h5>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPosts as $post)
                            <tr>
                                <td>
                                    <div class="post-title-cell">
                                        <strong>{{ Str::limit($post->title, 40) }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">{{ $post->category->name ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    @if($post->status === 'published')
                                        <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle"></i> Published</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning"><i class="bi bi-pencil"></i> Draft</span>
                                    @endif
                                </td>
                                <td class="text-muted small">{{ $post->publish_date->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $post) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No posts yet. <a href="{{ route('admin.blogs.create') }}">Create your first post!</a></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
