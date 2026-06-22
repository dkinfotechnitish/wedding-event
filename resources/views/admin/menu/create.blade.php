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

        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Information</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        {{-- Title --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" placeholder="Enter title">

                            @error('title')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Position --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Position (A number to determine the order of display)</label>
                            <input type="number" name="position"
                                class="form-control @error('position') is-invalid @enderror"
                                value="{{ old('position') }}" placeholder="Display order">

                            @error('position')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- URL --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">URL (Enter URL Last Name example: wedding-services) *</label>
                            <input type="text" name="url"
                                class="form-control @error('url') is-invalid @enderror"
                                value="{{ old('url') }}" placeholder="Enter Menu URL">

                            @error('url')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Show on Homepage --}}
                        {{-- <div class="mb-3 col-md-6">
                            <label class="form-label d-block">Show on Homepage</label>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"
                                    id="show_on_homepage"
                                    name="show_on_homepage"
                                    value="1"
                                    {{ old('show_on_homepage') ? 'checked' : '' }}>

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
                                        {{ old('show_on_homepage') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_on_homepage">
                                        Show on Homepage
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_enquiry" name="is_enquiry"
                                        value="1" {{ old('is_enquiry') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_enquiry">
                                        Enquiry Available
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_gallary" name="is_gallary"
                                        value="1" {{ old('is_gallary') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_gallary">
                                        Has Gallery
                                    </label>
                                </div>
                            </div>

                        {{-- Description --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Description</label>

                            <textarea name="desc" rows="4"
                                class="form-control @error('desc') is-invalid @enderror"
                                placeholder="Enter description">{{ old('desc') }}</textarea>

                            @error('desc')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Menu Image</label>

                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept="image/*">

                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Save Menu
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
