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
                    <h4 class="mb-3">Create Banner</h4>

                    <ol class="breadcrumb mb-3">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.banner.index') }}">
                                Banner
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Create
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" id="bannerForm"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Edit Banner
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        {{-- Current Image --}}
                        @if ($banner->image)
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Current Image</label>
                                <br>
                                <img src="{{ asset($banner->image) }}" alt="Banner" class="img-thumbnail" width="250">
                            </div>
                        @endif

                        {{-- Banner Image --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">
                                Banner Image
                            </label>

                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                accept="image/*">

                            <small class="text-muted">
                                Leave blank to keep existing image.
                            </small>

                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Position --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">
                                Position
                            </label>

                            <input type="number" name="position_img"
                                value="{{ old('position_img', $banner->position_img) }}" placeholder="Display Order"
                                class="form-control @error('position_img') is-invalid @enderror">

                            @error('position_img')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Banner Content --}}
                        <div class="mb-3">
                            <label>Banner Content (HTML / Emojis / Links allowed)</label>

                            <div id="editor" style="height:200px;">
                                {!! old('banner_content', $banner->banner_content) !!}
                            </div>

                            <input type="hidden" name="banner_content" id="banner_content"
                                value="{{ old('banner_content', $banner->banner_content) }}">
                        </div>

                        {{-- Hidden Status --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label d-block">
                                Hide Banner
                            </label>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_hidden" name="is_hidden"
                                    value="1" {{ old('is_hidden', $banner->is_hidden) ? 'checked' : '' }}>

                                <label class="form-check-label" for="is_hidden">
                                    Hidden
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>
                            Update Banner
                        </button>

                        <a href="{{ route('admin.banner.index') }}" class="btn btn-danger">
                            <i class="fa fa-arrow-left me-1"></i>
                            Back
                        </a>
                    </div>

                </div>

            </div>

        </form>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, false]
                        }],
                        [{
                            'size': ['small', false, 'large', 'huge']
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            var form = document.getElementById('bannerForm');

            if (form) {
                form.addEventListener('submit', function() {
                    document.getElementById('banner_content').value = quill.root.innerHTML;
                });
            }

        });
    </script>
@endsection
