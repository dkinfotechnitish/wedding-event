@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">

            <!-- FAQ Banner -->
            <div class="container">
                <div class="cta-text p-4 p-lg-5"
                    style="background: linear-gradient(135deg, #ff6b81, #ffb199);
            border-radius:10px; position:relative; overflow:hidden;">

                    <div class="row">
                        <div class="col-9">
                            <h5 class="mb-3 text-white">
                                Frequently Asked Questions
                            </h5>

                            <p class="text-white mb-0">
                                Find answers to common questions about
                                <span class="fw-bold">
                                    wedding bookings, vendors, services & support
                                </span>.
                            </p>
                        </div>
                    </div>

                    <img src="assets/img/bg-img/make-up.png" alt=""
                        style="position:absolute; right:10px; bottom:0; max-height:140px;">
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="container mt-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h5 class="mb-3">FAQ</h5>

                        <p class="text-muted mb-4">
                            Here are some common questions customers ask before booking wedding services.
                        </p>

                        <div class="accordion" id="faqAccordion">

                            <!-- FAQ 1 -->
                            <div class="accordion-item mb-3 border rounded-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq1">
                                        How can I book wedding services?
                                    </button>
                                </h2>

                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        You can browse services like hotel, venue, makeup,
                                        photography, DJ, and wedding planning, then contact
                                        us for booking assistance.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="accordion-item mb-3 border rounded-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2">
                                        Can I customize wedding packages?
                                    </button>
                                </h2>

                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        Yes, we offer customized wedding services according
                                        to your budget and requirements.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="accordion-item mb-3 border rounded-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq3">
                                        Do you provide bride and groom services?
                                    </button>
                                </h2>

                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        Yes, we provide bride and groom services including
                                        makeup, mehndi, wedding band, vintage car,
                                        safa pagdi, and more.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 4 -->
                            <div class="accordion-item border rounded-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq4">
                                        How can I contact support?
                                    </button>
                                </h2>

                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        You can contact us through our Contact page or send
                                        your inquiry through the contact form.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="pb-3"></div>
            </div>

        </div>

        <div class="container pb-3 my-2 mt-4">

            <div class="card py-3 px-2" style="border: 1px solid #dee2e6; background: #d6ba91;">

                <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Gallery</h6>
                </div>
                <div class="card-body p-0 pb-3 pt-2 ">

                    <div class=" collection-slide swiper">
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
        </div>
    </div>
@endsection
