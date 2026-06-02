@extends('layouts.admin')

@section('adminContent')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-12">Edit Category</h4>
                    <ol class="breadcrumb mb-12">
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.category.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Category Information</h5>
                        </div>

                        <div class="card-body d-flex flex-wrap">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <input type="number" id="position" name="position"
                                    class="form-control @error('position') is-invalid @enderror"
                                    placeholder="Enter position order" value="{{ old('position', $category->position) }}"
                                    min="0">
                                @error('position')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">A number to determine the order of display</small>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted d-block mt-2">Allowed formats: JPEG, PNG, JPG, GIF (Max:
                                    2MB)</small>
                            </div>

                            @if ($category->image)
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                        class="img-fluid rounded" style="max-width: 20%; height: auto;">
                                </div>
                            @endif

                            <div id="image-preview" class="mt-2" style="display: none;">
                                <img id="preview-image" src="" alt="Preview" class="img-fluid rounded"
                                    style="max-width: 20%; height: auto;">
                            </div>

                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-2"></i> Update Category
                                </button>

                                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-danger py-1">
                                    <i class="fa fa-arrow-left me-2"></i> Cancel
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('preview-image').src = event.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
