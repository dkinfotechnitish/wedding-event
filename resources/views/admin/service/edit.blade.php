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
                    <h4 class="mb-12">Edit Service</h4>
                    <ol class="breadcrumb mb-12">
                        <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Services</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Service Information</h5>
                        </div>

                        <div class="card-body d-flex flex-wrap">
                            <div class="mb-3 col-md-6">
                                <label for="category_id" class="form-label">Category <span
                                        class="text-danger">*</span></label>
                                <select id="category_id" name="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror" required>
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Service Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter service name" value="{{ old('name', $service->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <input type="number" id="position" name="position"
                                    class="form-control @error('position') is-invalid @enderror"
                                    placeholder="Enter position order" value="{{ old('position', $service->position) }}"
                                    min="0">
                                @error('position')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">A number to determine the order of display</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="url" class="form-label">URL (Enter URL Last Name example:
                                    wedding-services) <span class="text-danger">*</span></label>
                                <input type="text" id="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror" placeholder="Enter service URL"
                                    value="{{ old('url', $service->url) }}" required>
                                @error('url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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

                            @if ($service->image)
                                <div class="mb-3 col-md-12">
                                    <h6>Current Image</h6>
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                        class="img-fluid rounded" style="max-width: 200px; height: auto;">
                                </div>
                            @endif

                            <div id="image-preview" class="mt-3" style="display: none;">
                                <h6>New Image Preview</h6>
                                <img id="preview-image" src="" alt="Preview" class="img-fluid rounded"
                                    style="max-width: 200px; height: auto;">
                            </div>

                            <div class="mb-3 col-md-12">
                                <h6 class="mb-3">Features</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="show_on_homepage"
                                        name="show_on_homepage" value="1"
                                        {{ old('show_on_homepage', $service->show_on_homepage) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_on_homepage">
                                        Show on Homepage
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_enquiry" name="is_enquiry"
                                        value="1" {{ old('is_enquiry', $service->is_enquiry) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_enquiry">
                                        Enquiry Available
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_gallary" name="is_gallary"
                                        value="1" {{ old('is_gallary', $service->is_gallary) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_gallary">
                                        Has Gallery
                                    </label>
                                </div>
                            </div>

                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-2"></i> Update Service
                                </button>

                                <a href="{{ route('admin.service.index') }}" class="btn btn-sm btn-danger py-1">
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
