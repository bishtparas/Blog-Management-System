@extends('layouts.admin')

@section('title', 'Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5><i class="bi bi-file-earmark-text"></i> All Blog Posts</h5>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> New Post
        </a>
    </div>
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover admin-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="" class="table-thumbnail">
                            @else
                                <div class="table-thumbnail-placeholder"><i class="bi bi-image"></i></div>
                            @endif
                        </td>
                        <td><strong>{{ Str::limit($blog->title, 45) }}</strong></td>
                        <td><span class="badge bg-primary-subtle text-primary">{{ $blog->category->name ?? 'N/A' }}</span></td>
                        <td>
                            @if($blog->status === 'published')
                                <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle"></i> Published</span>
                            @else
                                <span class="badge bg-warning-subtle text-warning"><i class="bi bi-pencil"></i> Draft</span>
                            @endif
                        </td>
                        <td class="text-muted small">{{ $blog->publish_date->format('M d, Y') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-sm btn-outline-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No blog posts yet. <a href="{{ route('admin.blogs.create') }}">Create your first post!</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($blogs->hasPages())
    <div class="admin-card-footer">
        {{ $blogs->links() }}
    </div>
    @endif
</div>
@endsection
