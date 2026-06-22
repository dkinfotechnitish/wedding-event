@extends('layouts.app')
@section('content')
    <style>
        .service-card {
            transition: all 0.35s ease;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .service-img {
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-img {
            transform: scale(1.12);
        }

        .service-title {
            transition: all 0.3s ease;
        }

        .service-card:hover .service-title {
            color: #0d6efd !important;
        }
    </style>

    <div class="page-content-wrapper">

        @php
            $half = ceil($menus->count() / 2);

            $firstMenus = $menus->take($half);
            $secondMenus = $menus->skip($half);
        @endphp

        {{-- First Half Menus --}}
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="row g-2">
                    @foreach ($firstMenus as $menu)
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('menu.page', $menu->url) }}">
                                    @if ($menu->image)
                                        <img src="{{ asset($menu->image) }}" class="card-img-top"
                                            alt="{{ $menu->title }}" style="height:200px;object-fit:cover;">
                                    @endif

                                    <div class="card-body text-center">
                                        <h6 class="mb-2">{{ $menu->title }}</h6>

                                        @if ($menu->desc)
                                            <p class="small text-muted">
                                                {{ Str::limit(strip_tags($menu->desc), 80) }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <div class="hero-wrapper pt-3">
                <div class="hero-slides swiper">
                    <div class="swiper-wrapper">

                        @forelse ($banners as $banner)
                            <div class="swiper-slide single-hero-slide"
                                style="background-image: url('{{ asset($banner->image) }}');">

                                <div class="slide-content h-100 d-flex align-items-center">
                                    {!! $banner->banner_content ?? '-' !!}
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                No Banner Found!
                            </div>
                        @endforelse

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        {{-- Remaining Half Menus --}}
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="row g-2">
                    @foreach ($secondMenus as $menu)
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('menu.page', $menu->url) }}">
                                    @if ($menu->image)
                                        <img src="{{ asset($menu->image) }}" class="card-img-top"
                                            alt="{{ $menu->title }}" style="height:200px;object-fit:cover;">
                                    @endif

                                    <div class="card-body text-center">
                                        <h6 class="mb-2">{{ $menu->title }}</h6>

                                        @if ($menu->desc)
                                            <p class="small text-muted">
                                                {{ Str::limit(strip_tags($menu->desc), 80) }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        @php
            $gradients = [
                'linear-gradient(135deg, #6a11cb, #b06ab3)',
                'linear-gradient(135deg, #ff9800, #ffcc70)',
                'linear-gradient(135deg, #ff758c, #ffb6c1)',
                'linear-gradient(135deg, #d63384, #ff6b81)',
                'linear-gradient(135deg, #00b09b, #96c93d)',
                'linear-gradient(135deg, #fc466b, #3f5efb)',
            ];
        @endphp

        @foreach ($categories as $index => $category)
            @if ($category->services->count())
                <div class="container my-3">
                    <div class="p-4 p-lg-5"
                        style="background: {{ $gradients[$index % count($gradients)] }};
                            border-radius:10px; position:relative; overflow:hidden;">

                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="mb-3 text-white">
                                    {{ $category->name }}
                                </h5>

                                <p class="text-white mb-0">
                                    Explore premium services like
                                    <span class="fw-bold">
                                        {{ $category->services->pluck('name')->take(4)->implode(', ') }}
                                    </span>
                                    for your special event.
                                </p>
                            </div>

                            <div class="col-3 text-end">
                                @if ($category->image)
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                        style="max-height:120px;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="featured-products-wrapper py-3 my-2">
                    <div class="container">

                        <!-- Parent Card -->
                        <div class="card shadow-sm border-0" style="background: #d6ba91;">

                            <!-- Card Header -->
                            <div
                                class="card-header border-0 bg-transparent d-flex align-items-center justify-content-between">
                                <h6 class="mb-0">{{ $category->name }}</h6>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-2">

                                <!-- Swiper -->
                                <div class="featured-products-slide swiper">
                                    <div class="swiper-wrapper">

                                        @foreach ($category->services as $service)
                                            <div class="swiper-slide">

                                                <div class=" text-center">

                                                    <div class="product-thumbnail-side mb-2 overflow-hidden rounded">
                                                        <a href="{{ route('service.page', $service->url) }}">
                                                            <img src="{{ asset('storage/' . $service->image) }}"
                                                                alt="{{ $service->name }}"
                                                                class="img-fluid rounded service-img"
                                                                style="height:250px;width:100%;object-fit:cover;">
                                                        </a>
                                                    </div>

                                                    <a href="{{ route('service.page', $service->url) }}"
                                                        class="d-block text-dark text-decoration-none fw-semibold">
                                                        {{ $service->name }}
                                                    </a>

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

    {{-- <div style="margin-bottom: 100px;">


        <button onclick="getLocation()">Get Location</button>

        <p id="result"></p>

    </div>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        let latitude = position.coords.latitude;
                        let longitude = position.coords.longitude;

                        document.getElementById("result").innerHTML =
                            "Latitude: " + latitude +
                            "<br>Longitude: " + longitude;

                        console.log("Latitude:", latitude);
                        console.log("Longitude:", longitude);
                    },
                    function(error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                alert("Location access denied.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                alert("Location unavailable.");
                                break;
                            case error.TIMEOUT:
                                alert("Location request timed out.");
                                break;
                            default:
                                alert("Unknown error.");
                        }
                    }
                );
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script> --}}
@endsection
