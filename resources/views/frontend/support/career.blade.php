@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="cta-text p-4 p-lg-5"
                style="background: linear-gradient(135deg, #6a11cb, #b06ab3); border-radius:10px; position:relative; overflow:hidden;">

                <div class="row">
                    <div class="col-9">
                        <h5 class="mb-3 text-white">
                            Join Our Wedding Eventwala Team
                        </h5>

                        <p class="text-white mb-0">
                            Build your career with us and become a part of a creative team in the
                            wedding industry. Explore exciting opportunities and grow with
                            <span class="fw-bold">
                                Wedding Eventwala
                            </span>.
                        </p>
                    </div>
                </div>

                <img src="assets/img/bg-img/make-up.png" alt=""
                    style="position:absolute; right:10px; bottom:0; max-height:140px;">
            </div>
        </div>

        <div class="container mt-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <h5 class="mb-3">Career Application</h5>

                    <p class="text-muted mb-4">
                        We are always looking for talented and passionate individuals to join our
                        team. Fill out the form below and apply to become a part of Wedding Eventwala.
                    </p>

                    <div class="contact-form">
                        <form action="#" method="">

                            <input class="form-control border mb-3" type="text" placeholder="Your Name">

                            <input class="form-control border mb-3" type="email" placeholder="Enter Email">

                            <select class="form-control border mb-3" name="topic">
                                <option value="">Select Job Role</option>
                                <option value="">Event Manager</option>
                                <option value="">Wedding Planner</option>
                                <option value="">Photographer</option>
                                <option value="">Decorator</option>
                            </select>

                            <input class="form-control border mb-3" type="text" placeholder="Portfolio / Resume URL">

                            <textarea class="form-control border mb-3" cols="30" rows="6" placeholder="Tell us about yourself..."></textarea>

                            <button class="btn btn-primary btn-lg w-100">
                                Apply Now <i class="ti ti-arrow-right"></i>
                            </button>

                        </form>
                    </div>

                </div>
            </div>

            <div class="pb-3"></div>
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
