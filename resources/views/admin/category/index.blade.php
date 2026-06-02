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

                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i> Create Category
                        </a>
                    </div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <a href="{{ route('admin.category.edit', $category) }}"
                                            class="fw-semibold text-dark text-decoration-none">
                                            {{ $category->name }}
                                        </a>
                                    </td>

                                    <td>
                                        {{ $category->position ?? '-' }}
                                    </td>

                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}"
                                                style="width:80px;height:60px;object-fit:cover;border-radius:8px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.category.edit', $category) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.category.destroy', $category) }}" method="POST"
                                                onsubmit="return confirm('Are you sure to delete this category?')">
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
                                    <td colspan="5" class="text-center py-4">
                                        <p class="text-danger mb-0">No categories found.</p>

                                        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary mt-2">
                                            Create your first category
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    {{-- <script>
        fetch('https://ipapi.co')
            .then(response => response.json())
            .then(data => {
                console.log(`User City: ${data.city}, Country: ${data.country_name}`);
                localStorage.setItem('user_country', data.country_code);
            });
    </script> --}}
@endsection
