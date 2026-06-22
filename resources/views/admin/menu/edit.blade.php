@extends('layouts.admin')

@section('adminContent')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-3">Create Menubar</h4>
                    <ol class="breadcrumb mb-3">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.menu.index') }}">Menu</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Information</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        {{-- Title --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $menu->title) }}" placeholder="Enter title">

                            @error('title')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Position --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Position (A number to determine the order of display)</label>
                            <input type="number" name="position"
                                class="form-control @error('position') is-invalid @enderror"
                                value="{{ old('position', $menu->position) }}" placeholder="Display order">

                            @error('position')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- URL --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">URL (Enter URL Last Name example: wedding-services) <span
                                    class="text-danger">*</span></label>

                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                value="{{ old('url', $menu->url) }}" placeholder="Enter Menu URL">
                            @error('url')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Show on Homepage --}}
                        {{-- <div class="mb-3 col-md-6">
                            <label class="form-label d-block">Show on Homepage</label>

                            <input type="hidden" name="show_on_homepage" value="0">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="show_on_homepage"
                                    name="show_on_homepage" value="1"
                                    {{ old('show_on_homepage', $menu->show_on_homepage) ? 'checked' : '' }}>

                                <label class="form-check-label" for="show_on_homepage">
                                    Yes
                                </label>
                            </div>
                        </div> --}}

                        <div class="mb-3 col-md-12">
                            <h6 class="mb-3">Features</h6>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="show_on_homepage"
                                    name="show_on_homepage" value="1"
                                    {{ old('show_on_homepage', $menu->show_on_homepage) ? 'checked' : '' }}>
                                <label class="form-check-label" for="show_on_homepage">
                                    Show on Homepage
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="is_enquiry" name="is_enquiry"
                                    value="1" {{ old('is_enquiry', $menu->is_enquiry) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_enquiry">
                                    Enquiry Available
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="is_gallary" name="is_gallary"
                                    value="1" {{ old('is_gallary', $menu->is_gallary) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_gallary">
                                    Has Gallery
                                </label>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Description</label>

                            <textarea name="desc" rows="4" class="form-control @error('desc') is-invalid @enderror"
                                placeholder="Enter description">{{ old('desc', $menu->desc) }}</textarea>

                            @error('desc')
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

                        @if ($menu->image)
                            <div class="mb-3 col-md-12">
                                <h6>Current Image</h6>
                                <img src="{{ asset($menu->image) }}" alt="{{ $menu->title }}" width="150"
                                    class="img-fluid rounded" style="max-width: 200px; height: auto;">
                            </div>
                        @endif

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Update Menu
                        </button>

                        <a href="{{ route('admin.menu.index') }}" class="btn btn-danger">
                            <i class="fa fa-arrow-left me-1"></i> Back
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
