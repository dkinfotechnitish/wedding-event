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
                    <h4 class="mb-12">Create Location</h4>
                    <ol class="breadcrumb mb-12">
                        <li class="breadcrumb-item"><a href="{{ route('admin.location.index') }}">Locations</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Location Information</h5>
                        </div>

                        <div class="card-body d-flex flex-wrap">
                            <div class="mb-3 col-md-6">
                                <label for="cat_id" class="form-label">
                                    Category <span class="text-danger">*</span>
                                </label>

                                <select id="cat_id" name="cat_id"
                                    class="form-select @error('cat_id') is-invalid @enderror" required>
                                    <option value="">-- Select Category --</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" data-services='@json($category->services)'
                                            {{ old('cat_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('cat_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="service_id" class="form-label">
                                    Services <span class="text-danger">*</span>
                                </label>

                                <select id="service_id" name="service_ids[]"
                                    class="form-select @error('service_ids') is-invalid @enderror" required multiple>
                                </select>

                                @error('service_ids')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                                <input type="text" id="latitude" name="latitude"
                                    class="form-control @error('latitude') is-invalid @enderror"
                                    placeholder="Enter latitude" value="{{ old('latitude') }}" required>
                                @error('latitude')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="longitude" class="form-label">Longitude <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="longitude" name="longitude"
                                    class="form-control @error('longitude') is-invalid @enderror"
                                    placeholder="Enter longitude" value="{{ old('longitude') }}" required>
                                @error('longitude')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State Name </label>
                                <input type="text" id="state" name="state"
                                    class="form-control @error('state') is-invalid @enderror" placeholder="Enter state name"
                                    value="{{ old('state') }}">
                                @error('state')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="district" class="form-label">District </label>
                                <input type="text" id="district" name="district"
                                    class="form-control @error('district') is-invalid @enderror"
                                    placeholder="Enter district name" value="{{ old('district') }}">
                                @error('district')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" id="area" name="area"
                                    class="form-control @error('area') is-invalid @enderror" placeholder="Enter area name"
                                    value="{{ old('area') }}">
                                @error('area')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-5 mx-2">
                                <label for="is_hidden" class="form-label">Feature</label>
                                <div class="form-check">
                                    <input type="hidden" name="is_hidden" value="0">
                                    <input type="checkbox" id="is_hidden" name="is_hidden" value="1"
                                        class="form-check-input" {{ old('is_hidden') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_hidden">
                                        Hide Services For this location
                                    </label>
                                </div>
                            </div>

                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i> Create Location
                                </button>
                                <a href="{{ route('admin.location.index') }}" class="btn btn-sm btn-danger py-1">
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
        document.addEventListener('DOMContentLoaded', function() {

            const categorySelect = document.getElementById('cat_id');
            const serviceSelect = document.getElementById('service_id');

            function loadServices() {

                serviceSelect.innerHTML = '';

                const selectedOption =
                    categorySelect.options[categorySelect.selectedIndex];

                const services =
                    JSON.parse(selectedOption.dataset.services || '[]');

                if (services.length === 0) {
                    serviceSelect.innerHTML =
                        '<option value="">-- No Services Found --</option>';
                    return;
                }

                services.forEach(service => {
                    let option = document.createElement('option');
                    option.value = service.id;
                    option.textContent = service.name;
                    serviceSelect.appendChild(option);
                });
            }

            categorySelect.addEventListener('change', loadServices);

            // page reload/edit case
            if (categorySelect.value) {
                loadServices();
            }
        });
    </script>

@endsection
