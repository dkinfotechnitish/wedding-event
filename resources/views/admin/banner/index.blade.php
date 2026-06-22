@extends('layouts.admin')

@section('adminContent')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i> Create Banner
                        </a>
                    </div>

                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Banner List</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Banners</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Position</th>
                            <th>Banner Content</th>
                            <th>Status</th>
                            <th width="130">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($banners as $banner)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if ($banner->image)
                                        <img src="{{ asset($banner->image) }}"
                                            alt="Banner"
                                            style="width:120px;height:70px;object-fit:cover;border-radius:6px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $banner->position_img ?? '-' }}
                                </td>

                                <td>
                                    {!! $banner->banner_content ?? '-' !!}
                                </td>

                                <td>
                                    @if (!$banner->is_hidden)
                                        <span class="badge bg-success">
                                            Visible
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Hidden
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.banner.destroy', $banner->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">
                                    No banners found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
