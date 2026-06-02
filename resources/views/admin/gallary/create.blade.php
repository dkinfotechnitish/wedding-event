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
                    <h4 class="mb-12">Add Gallery Image</h4>
                    <ol class="breadcrumb mb-12">
                        <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Gallery Image Information</h5>
                        </div>

                        <div class="card-body d-flex flex-wrap">
                            <div class="mb-3 col-md-6">
                                <label for="service_id" class="form-label">Service <span
                                        class="text-danger">*</span></label>
                                <select id="service_id" name="service_id"
                                    class="form-select @error('service_id') is-invalid @enderror" required>
                                    <option value="">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="position_img" class="form-label">Position</label>
                                <input type="number" id="position_img" name="position_img"
                                    class="form-control @error('position_img') is-invalid @enderror"
                                    placeholder="Enter position order" value="{{ old('position_img') }}" min="0">
                                @error('position_img')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">A number to determine the order of display</small>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Upload Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted d-block mt-2">Allowed formats: JPEG, PNG, JPG, GIF (Max:
                                    2MB)</small>
                            </div>

                            <div id="image-preview" class="mt-3" style="display: none;">
                                <img id="preview-image" src="" alt="Preview" class="img-fluid rounded"
                                    style="max-width: 20%; height: auto;">
                            </div>

                            <div class="mb-3 col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_hidden" name="is_hidden"
                                        value="1" {{ old('is_hidden') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_hidden">
                                        Hide this image
                                    </label>
                                </div>
                            </div>

                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i> Add Image
                                </button>

                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-danger py-1">
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
