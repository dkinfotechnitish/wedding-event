@extends('layouts.admin')

@section('adminContent')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid">

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i> Create Service
                        </a>
                    </div>

                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
        </div>

        @php
            $groupedServices = $services->groupBy(function ($service) {
                return $service->category?->name ?? 'Uncategorized';
            });
        @endphp

        <div class="row">
            @forelse ($groupedServices as $categoryName => $categoryServices)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm border">

                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                {{ $categoryName }}
                            </h5>

                            <span class="badge bg-dark text-light">
                                {{ $categoryServices->count() }} Services
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Url Name</th>
                                        <th>Features</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categoryServices as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <a href="{{ route('admin.service.edit', $service) }}"
                                                    class="fw-semibold text-dark text-decoration-none">
                                                    {{ $service->name }}
                                                </a>
                                            </td>

                                            <td>
                                                {{ $service->position ?? '-' }}
                                            </td>

                                            <td>
                                                @if ($service->image)
                                                    <img src="{{ asset('storage/' . $service->image) }}"
                                                        alt="{{ $service->name }}"
                                                        style="width:80px;height:60px;object-fit:cover;border-radius:8px;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{ $service->url ?? '-' }}
                                            </td>

                                            <td>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @if ($service->show_on_homepage)
                                                        <span class="badge bg-info">Homepage</span>
                                                    @endif

                                                    @if ($service->is_enquiry)
                                                        <span class="badge bg-warning">Enquiry</span>
                                                    @endif

                                                    @if ($service->is_booking)
                                                        <span class="badge bg-success">Booking</span>
                                                    @endif

                                                    @if ($service->is_gallary)
                                                        <span class="badge bg-secondary">Gallery</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ route('admin.service.edit', $service) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.service.destroy', $service) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure to delete this service?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-danger text-center">
                        No services found.
                    </div>
                </div>
            @endforelse
        </div>

    </div>
@endsection
