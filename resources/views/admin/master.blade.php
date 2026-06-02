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

        {{-- <div class="row">
            <!-- Card 1 -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted mb-0 ">Total Course</p>
                                <h3 class="text-dark mt-2 mb-0">7</h3>
                            </div>

                            <div class="col-6">
                                <div class="ms-auto avatar-md bg-soft-primary rounded">
                                    <iconify-icon icon="solar:globus-outline"
                                        class="fs-32 avatar-title text-primary"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted mb-0 ">Total Degree</p>
                                <h3 class="text-dark mt-2 mb-0">7</h3>
                            </div>

                            <div class="col-6">
                                <div class="ms-auto avatar-md bg-soft-primary rounded">
                                    <iconify-icon icon="solar:users-group-two-rounded-broken"
                                        class="fs-32 avatar-title text-primary"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted mb-0 ">Scholarship Benefit Rank</p>
                                <h3 class="text-dark mt-2 mb-0">7</h3>
                            </div>

                            <div class="col-6">
                                <div class="ms-auto avatar-md bg-soft-primary rounded">
                                    <iconify-icon icon="solar:cart-5-broken"
                                        class="fs-32 avatar-title text-primary"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted mb-0 ">Scholarship Benefit Type</p>
                                <h3 class="text-dark mt-2 mb-0">7</h3>
                            </div>

                            <div class="col-6">
                                <div class="ms-auto avatar-md bg-soft-primary rounded">
                                    <iconify-icon icon="solar:pie-chart-2-broken"
                                        class="fs-32 avatar-title text-primary"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted mb-0 ">Participating Colleges</p>
                                <h3 class="text-dark mt-2 mb-2">7</h3>

                                <span class="text-muted mt-2 mb-0 ">States : <h5 class="text-dark d-inline  mb-2">
                                        7</h5></span>

                                <br>

                                <span class="text-muted mt-2 mb-0 ">District : <h5 class="text-dark d-inline mb-0">
                                        7</h5>
                                </span>

                            </div>

                            <div class="col-6">
                                <div class="ms-auto avatar-md bg-soft-primary rounded">
                                    <iconify-icon icon="mdi:school-outline" icon="solar:pie-chart-2-broken"
                                        class="fs-32 avatar-title text-primary"></iconify-icon>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
