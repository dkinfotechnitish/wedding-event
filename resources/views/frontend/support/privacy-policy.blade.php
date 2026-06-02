@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">

            <!-- Privacy Policy Banner -->
            <div class="container">
                <div class="cta-text p-4 p-lg-5"
                    style="background: linear-gradient(135deg, #6a11cb, #b06ab3);
            border-radius:10px; position:relative; overflow:hidden;">

                    <div class="row">
                        <div class="col-9">
                            <h5 class="mb-3 text-white">
                                Privacy Policy
                            </h5>

                            <p class="text-white mb-0">
                                Your privacy is important to us. Learn how
                                <span class="fw-bold">
                                    Wedding Eventwala
                                </span>
                                collects, uses, and protects your personal information.
                            </p>
                        </div>
                    </div>

                    <img src="assets/img/bg-img/make-up.png" alt=""
                        style="position:absolute; right:10px; bottom:0; max-height:140px;">
                </div>
            </div>

            <!-- Privacy Policy Content -->
            <div class="container mt-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h5 class="mb-3">Privacy Policy</h5>

                        <p class="text-muted mb-4">
                            At Wedding Eventwala, we value your trust and are committed to protecting your personal
                            information.
                            This privacy policy explains how we collect, use, and safeguard your data.
                        </p>

                        <div class="privacy-policy-wrapper">

                            <h6>1. Information We Collect</h6>
                            <p>
                                We may collect personal information such as your name, email address,
                                phone number, and booking details when you contact us or use our services.
                            </p>

                            <h6>2. How We Use Your Information</h6>
                            <p>
                                We use your information to provide wedding services, improve customer experience,
                                respond to inquiries, and process bookings efficiently.
                            </p>

                            <h6>3. Data Security</h6>
                            <p>
                                We implement security measures to protect your personal information from
                                unauthorized access, misuse, or disclosure.
                            </p>

                            <h6>4. Third-Party Services</h6>
                            <p>
                                We may use trusted third-party service providers to improve our services.
                                However, we do not sell or share your personal data for marketing purposes.
                            </p>

                            <h6>5. Cookies</h6>
                            <p>
                                Our website may use cookies to improve browsing experience and website functionality.
                            </p>

                            <h6>6. Contact Us</h6>
                            <p>
                                If you have any questions regarding this privacy policy,
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
