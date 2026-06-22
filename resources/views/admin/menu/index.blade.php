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
                        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i> Create Menu
                        </a>
                    </div>

                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Menus</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Menu List</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Position</th>
                            <th>Image</th>
                            <th>URL</th>
                            <th>Description</th>
                            <th>Feature</th>
                            <th width="130">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($menus as $menu)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $menu->title }}</strong>
                                </td>

                                <td>
                                    {{ $menu->position }}
                                </td>

                                <td>
                                    @if ($menu->image)
                                        <img src="{{ asset($menu->image) }}" alt="{{ $menu->title }}"
                                            style="width:80px;height:60px;object-fit:cover;border-radius:6px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>
                                    <code>{{ $menu->url }}</code>
                                </td>

                                <td>
                                    {{ Str::limit($menu->desc, 50) }}
                                </td>

                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        @if ($menu->show_on_homepage)
                                            <span class="badge bg-info">Homepage</span>
                                        @endif

                                        @if ($menu->is_enquiry)
                                            <span class="badge bg-warning">Enquiry</span>
                                        @endif

                                        @if ($menu->is_booking)
                                            <span class="badge bg-success">Booking</span>
                                        @endif

                                        @if ($menu->is_gallary)
                                            <span class="badge bg-secondary">Gallery</span>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    No menus found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
