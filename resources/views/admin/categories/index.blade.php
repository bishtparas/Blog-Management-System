@extends('layouts.admin')

@section('title', 'Categories')
@section('page_title', 'Manage Categories')

@section('content')
<div class="row g-4">
    <!-- Add Category Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="bi bi-plus-circle"></i> Add Category</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter category name" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-plus-lg"></i> Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Categories List -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="bi bi-grid-3x3-gap"></i> All Categories</h5>
            </div>
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover admin-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Blogs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <!-- Inline edit form -->
                                    <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="d-inline category-edit-form" style="display:none !important;" id="editForm{{ $category->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                            <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                                            <button type="button" class="btn btn-sm btn-secondary cancel-edit" data-id="{{ $category->id }}"><i class="bi bi-x"></i></button>
                                        </div>
                                    </form>
                                    <span id="nameDisplay{{ $category->id }}"><strong>{{ $category->name }}</strong></span>
                                </td>
                                <td class="text-muted small">{{ $category->slug }}</td>
                                <td><span class="badge bg-primary-subtle text-primary">{{ $category->blogs_count }}</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary edit-category" data-id="{{ $category->id }}" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?')">
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
                                <td colspan="5" class="text-center py-4 text-muted">No categories yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($categories->hasPages())
            <div class="admin-card-footer">
                {{ $categories->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Inline edit toggle
    document.querySelectorAll('.edit-category').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            document.getElementById('editForm' + id).style.display = 'inline !important';
            document.getElementById('editForm' + id).removeAttribute('style');
            document.getElementById('nameDisplay' + id).style.display = 'none';
        });
    });
    document.querySelectorAll('.cancel-edit').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            document.getElementById('editForm' + id).style.display = 'none';
            document.getElementById('nameDisplay' + id).style.display = 'inline';
        });
    });
</script>
@endpush
