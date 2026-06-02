@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">

            <!-- Terms Banner -->
            <div class="container">
                <div class="cta-text p-4 p-lg-5"
                    style="background: linear-gradient(135deg, #ff6b81, #ffb199);
            border-radius:10px; position:relative; overflow:hidden;">

                    <div class="row">
                        <div class="col-9">
                            <h5 class="mb-3 text-white">
                                Terms & Conditions
                            </h5>

                            <p class="text-white mb-0">
                                Please read our
                                <span class="fw-bold">
                                    terms and conditions
                                </span>
                                carefully before using Wedding Eventwala services.
                            </p>
                        </div>
                    </div>

                    <img src="assets/img/bg-img/make-up.png" alt=""
                        style="position:absolute; right:10px; bottom:0; max-height:140px;">
                </div>
            </div>

            <!-- Terms Content -->
            <div class="container mt-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h5 class="mb-3">Terms & Conditions</h5>

                        <p class="text-muted mb-4">
                            Welcome to Wedding Eventwala. By accessing or using our website and services,
                            you agree to comply with the following terms and conditions.
                        </p>

                        <div class="terms-wrapper">

                            <h6>1. Service Usage</h6>
                            <p>
                                Wedding Eventwala provides wedding-related services such as venue booking,
                                makeup, photography, decoration, hotel booking, DJ, wedding planning,
                                and event management services.
                            </p>

                            <h6>2. Booking & Payments</h6>
                            <p>
                                All bookings are subject to availability. Payments, deposits,
                                and cancellations may be governed by specific service agreements.
                            </p>

                            <h6>3. User Responsibilities</h6>
                            <p>
                                Users must provide accurate details while booking services
                                or contacting our team. Any misuse of services may result
                                in suspension or cancellation.
                            </p>

                            <h6>4. Cancellation Policy</h6>
                            <p>
                                Cancellation and refund policies may vary depending on the
                                service provider or booking type.
                            </p>

                            <h6>5. Limitation of Liability</h6>
                            <p>
                                Wedding Eventwala is not responsible for delays, interruptions,
                                or service-related issues caused by third-party vendors or unavoidable situations.
                            </p>

                            <h6>6. Privacy & Data</h6>
                            <p>
                                Your personal information is protected according to our
                                privacy policy and will not be shared without consent.
                            </p>

                            <h6>7. Changes to Terms</h6>
                            <p>
                                We reserve the right to modify or update these terms
                                at any time without prior notice.
                            </p>

                            <h6>8. Contact Us</h6>
                            <p>
                                If you have any questions regarding these Terms & Conditions,
                                please contact the Wedding Eventwala support team.
                            </p>

                        </div>

                    </div>
                </div>

                <div class="pb-3"></div>
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
