@extends('layouts.admin')

@section('title', 'Create Blog Post')
@section('page_title', 'Create New Blog Post')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h5><i class="bi bi-plus-circle"></i> Create Blog Post</h5>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter blog title" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Short Description -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Short Description <span class="text-danger">*</span></label>
                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3" placeholder="Brief description of the blog post" required>{{ old('short_description') }}</textarea>
                        @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Content (Rich Text) -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="15">{{ old('content') }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Publish Date -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Publish Date <span class="text-danger">*</span></label>
                        <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date', date('Y-m-d')) }}" required>
                        @error('publish_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Featured Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="imageInput" accept="image/*">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="image-preview mt-2" id="imagePreview" style="display:none;">
                            <img src="" alt="Preview" class="img-fluid rounded" id="previewImg">
                            <button type="button" class="btn btn-sm btn-outline-danger mt-1" id="removePreview">
                                <i class="bi bi-x"></i> Remove
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Create Blog Post
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tinymce@6/skins/ui/oxide/skin.min.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- TinyMCE Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // TinyMCE - fallback to textarea if CDN not available
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '#content',
            height: 400,
            plugins: 'lists link image table code',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist | link image table | code',
            menubar: false,
            branding: false,
        });
    }

    // Image preview
    document.getElementById('imageInput')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('removePreview')?.addEventListener('click', function() {
        document.getElementById('imageInput').value = '';
        document.getElementById('imagePreview').style.display = 'none';
    });
</script>
@endpush
