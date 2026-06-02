@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="about-content-wrap">
                        <img class="mb-3" src="assets/img/bg-img/12.png" alt="">

                        <h5>We are here to make your wedding journey beautiful, memorable, and stress-free.</h5>

                        <p>Welcome to our wedding platform where love stories begin and beautiful memories are created. We
                            help couples find the perfect wedding services, venues, planners, photographers, and more for
                            their special day.</p>

                        <p>From dream weddings to unforgettable celebrations, our platform is designed to make planning
                            simple, smooth, and exciting for every bride and groom.</p>

                        <ul class="mb-3 ps-3">
                            <li><i class="ti ti-check me-1"></i>Find trusted wedding vendors and planners.</li>
                            <li><i class="ti ti-check me-1"></i>Explore trending wedding ideas and inspiration.</li>
                            <li><i class="ti ti-check me-1"></i>Book venues, photographers, makeup artists, and more.</li>
                        </ul>

                        <p>Our wedding platform works seamlessly across smartphones, tablets, laptops, and desktops so you
                            can plan your special day anytime, anywhere.</p>

                        <div class="row g-2">
                            <div class="col-6">
                                <img class="mb-3 rounded" src="assets/img/bg-img/12.jpg" alt="Wedding Venue">
                            </div>
                            <div class="col-6">
                                <img class="mb-3 rounded" src="assets/img/bg-img/16.jpg" alt="Bride & Groom">
                            </div>
                        </div>

                        <p>Whether you are planning an intimate ceremony or a grand celebration, we bring everything you
                            need together in one place to make your wedding unforgettable.</p>

                        <p>Discover wedding inspirations, vendor recommendations, and personalized services tailored to your
                            dream wedding experience.</p>

                        <h6>For Couples</h6>
                        <p>Browse wedding ideas, connect with trusted vendors, compare services, and plan every detail of
                            your big day with confidence.</p>

                        <h6>For Wedding Vendors</h6>
                        <p>Showcase your services, connect with engaged couples, and grow your wedding business through our
                            trusted wedding platform.</p>

                        <div class="contact-btn-wrap text-center">
                            <p class="mb-2">Need help planning your dream wedding?</p>

                            <a class="btn btn-primary btn-lg w-100" href="{{ route('contact') }}">
                                <i class="ti ti-mail"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pb-3">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6>Gallery</h6>
            </div>

            <div class="collection-slide swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/17.jpg" alt="">

                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/19.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/21.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/22.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/23.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card collection-card"><img src="assets/img/product/24.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
