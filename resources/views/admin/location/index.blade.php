@extends('layouts.admin')

@section('adminContent')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.location.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i> Create Location
                        </a>
                    </div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Locations</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($locations as $location)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm border">

                        {{-- Card Header --}}
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                            <div>
                                <h5 class="mb-0">
                                    {{ $location->area ?? '-' }},
                                    {{ $location->district ?? '-' }},
                                    {{ $location->state ?? '-' }},
                                    {{ $location->latitude ?? '-' }} / {{ $location->longitude ?? '-' }}
                                </h5>

                                <small>
                                    {{ $location->locationCategoryServices->count() }} Services
                                </small>
                            </div>

                            <div>
                                @if ($location->is_hidden)
                                    <span class="badge bg-warning">
                                        Hidden
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Visible
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Service</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($location->locationCategoryServices as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $item->category?->name ?? '-' }}
                                                </span>
                                            </td>

                                            <td>
                                                {{ $item->service?->name ?? '-' }}
                                            </td>

                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ route('admin.location.edit', $location) }}"
                                                        class="btn btn-sm btn-info" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.location.destroy', $location) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure to delete this location?')"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">
                                                No services assigned
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="alert alert-danger text-center">
                        No locations found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
