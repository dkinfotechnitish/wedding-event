@extends('layouts.admin')

@section('adminContent')

    <style>
        .gallery-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            transition: .3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            opacity: 0;
            transition: .3s ease;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .action-buttons .btn {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i> Add Gallery Image
                    </a>
                </div>
            </div>
        </div>

        @php
            $groupedGallery = $galleries->groupBy('service_id');
        @endphp

        @forelse ($groupedGallery as $serviceId => $items)
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        {{ $items->first()->service?->name ?? 'No Service' }}
                    </h5>

                    <span class="badge bg-dark text-light">
                        {{ $items->count() }} Images
                    </span>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($items as $gallery)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">

                                <div class="gallery-card position-relative overflow-hidden rounded shadow">

                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="w-100"
                                        style="height:250px; object-fit:cover; ">

                                    <div class="position-absolute top-0 end-0 m-2">
                                        @if ($gallery->is_hidden)
                                            <span class="badge bg-danger">
                                                <i class="fa fa-eye-slash me-1"></i>
                                                Hidden
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                <i class="fa fa-eye me-1"></i>
                                                Visible
                                            </span>
                                        @endif
                                        <span class="badge bg-warning mt-1">
                                            Position :
                                            {{ $gallery->position_img ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="gallery-overlay">

                                        <div class="action-buttons">
                                            <a href="{{ route('admin.gallery.edit', $gallery) }}"
                                                class="btn btn-info btn-sm rounded-circle">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST"
                                                onsubmit="return confirm('Delete this image?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body text-center py-5">
                    <p class="text-danger mb-3">No gallery images found.</p>

                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        Add Gallery Image
                    </a>
                </div>
            </div>
        @endforelse

    </div>
@endsection
