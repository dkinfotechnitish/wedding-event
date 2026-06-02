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

        <div class="container">
            <div class="hero-wrapper pt-3">
                <div class="hero-slides swiper">
                    <div class="swiper-wrapper">

                        <!-- Wedding Planning -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/12.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Make Your Dream Wedding Memorable
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Elegant décor, planning & unforgettable moments
                                    </p>
                                    <a class="btn btn-primary" href="#booking" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Bride & Groom -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/11.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Celebrate Love With Perfection
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Beautiful wedding setups for your special day
                                    </p>
                                    <a class="btn btn-primary" href="#services" data-animation="fadeInUp" data-delay="500ms"
                                        data-duration="1000ms">
                                        Explore Services
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Decoration -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/10.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Premium Wedding Decoration
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Stylish stage, floral décor & lighting arrangements
                                    </p>
                                    <a class="btn btn-primary" href="#contact" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Catering -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/19.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Delicious Catering Services
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Tasteful menus for every wedding celebration
                                    </p>
                                    <a class="btn btn-primary" href="#services" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">
                                        View Services
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Photography -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/20.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Capture Every Precious Moment
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Professional wedding photography & videography
                                    </p>
                                    <a class="btn btn-primary" href="#gallery" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">
                                        View Gallery
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Venue -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/21.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Luxury Wedding Venue Setup
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Elegant arrangements for grand celebrations
                                    </p>
                                    <a class="btn btn-primary" href="#contact" data-animation="fadeInUp"
                                        data-delay="800ms" data-duration="1000ms">
                                        Get Quote
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Mehendi / Haldi -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/26.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Mehendi & Haldi Event Planning
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        Traditional celebrations with creative decoration
                                    </p>
                                    <a class="btn btn-primary" href="#booking" data-animation="fadeInUp"
                                        data-delay="800ms" data-duration="1000ms">
                                        Book Event
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Full Wedding Package -->
                        <div class="swiper-slide single-hero-slide"
                            style="background-image: url('https://weddingeventwala.com/wp-content/uploads/2021/11/35.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">
                                        Complete Wedding Management
                                    </h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">
                                        From planning to execution — we manage everything
                                    </p>
                                    <a class="btn btn-primary" href="#contact" data-animation="fadeInUp"
                                        data-delay="800ms" data-duration="1000ms">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <!-- Product Menu -->
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="row g-2">

                    <!-- Engagement -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('engagement') }}">
                                    <i class="ti ti-heart-handshake fs-1 mb-2 text-danger"></i>
                                    <span>Engagement</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Wedding -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('wedding') }}">
                                    <i class="ti ti-heart fs-1 mb-2" style="color: #e83e8c;"></i>
                                    <span>Wedding</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reception -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('reception') }}">
                                    <i class="ti ti-glass-full fs-1 mb-2 text-warning"></i>
                                    <span>Reception</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Anniversary -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('anniversary') }}">
                                    <i class="ti ti-cake fs-1 mb-2 text-success"></i>
                                    <span>Anniversary</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Honeymoon -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('honeymoon') }}">
                                    <i class="ti ti-plane fs-1 mb-2 text-info"></i>
                                    <span>Honeymoon</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Birthday -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('birthday') }}">
                                    <i class="ti ti-cake fs-1 mb-2 text-primary"></i>
                                    <span>Birthday</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Venue -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('venue') }}">
                                    <i class="ti ti-building-community fs-1 mb-2 text-secondary"></i>
                                    <span>Venue</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Decorator -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('decorator') }}">
                                    <i class="ti ti-flower fs-1 mb-2 text-success"></i>
                                    <span>Decorator</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Catering -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('catering') }}">
                                    <i class="ti ti-chef-hat fs-1 mb-2 text-danger"></i>
                                    <span>Catering</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Photography -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('photography') }}">
                                    <i class="ti ti-camera fs-1 mb-2 text-dark"></i>
                                    <span>Photography</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Theme Entry -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('theme-entry') }}">
                                    <i class="ti ti-sparkles fs-1 mb-2 text-warning"></i>
                                    <span>Theme Entry</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Theme Entry -->
                    <div class="col-3">
                        <div class="card catagory-card">
                            <div class="card-body px-2 text-center">
                                <a href="{{ route('theme-entry') }}">
                                    <i class="ti ti-star fs-1 mb-2 text-primary"></i>
                                    <span>Theme Entry</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- product category with services --}}

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

                        <div class="section-heading d-flex align-items-center justify-content-between">
                            <h6>{{ $category->name }}</h6>
                        </div>

                        <div class="row g-2">

                            @foreach ($category->services as $service)
                                <div class="col-4 col-md-4">

                                    @php
                                        $routeName = strtolower(str_replace(' ', '-', $service->name));
                                    @endphp

                                    <div class="card featured-product-card service-card h-100 shadow-sm border-0">
                                        <div class="card-body text-center">

                                            <div class="product-thumbnail-side mb-2 overflow-hidden rounded">
                                                <a class="product-thumbnail d-block"
                                                    href="{{ route('service.page', $service->url) }}">

                                                    <img src="{{ asset('storage/' . $service->image) }}"
                                                        alt="{{ $service->name }}" class="img-fluid rounded service-img"
                                                        style="height:250px; width:100%;object-fit:cover;">
                                                </a>
                                            </div>

                                            <div class="product-description">
                                                <a href="{{ route('service.page', $service->url) }}"
                                                    class="product-title service-title d-block text-dark text-decoration-none fw-semibold">
                                                    {{ $service->name }}
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
