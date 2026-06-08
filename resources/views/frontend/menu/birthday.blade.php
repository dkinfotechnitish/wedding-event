@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="product-slide-wrapper">
            <div class="product-slides swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide single-product-slide" style="background-image: url('assets/img/bg-img/6.jpg')">
                    </div>
                    <div class="swiper-slide single-product-slide" style="background-image: url('assets/img/bg-img/10.jpg')">
                    </div>
                    <div class="swiper-slide single-product-slide" style="background-image: url('assets/img/bg-img/11.jpg')">
                    </div>
                </div>
                <div class="product-slide-prev"><i class="ti ti-chevron-left"></i></div>
                <div class="product-slide-next"><i class="ti ti-chevron-right"></i></div>
            </div>

        </div>
        <div class="product-description pb-3">
            <div class="post-content bg-white py-3 mb-3">
                <div class="container">
                    <h6>Wedding Birthday Services</h6>
                    <p>
                        Wedding Eventwala Birthday Planner is famous all over the city for birthday party planning in Patna.
                        We offer the very best facilities in Patna for birthday parties, kids’ birthdays, baby showers, and
                        birthday decorations.</p>
                    <p>
                        Our birthday party planners have years of experience and expertise for birthday celebrations,
                        starting with the right choice of venues and everything else you’ll need to make your birthday party
                        a grand success.
                    </p>
                    <p>Our birthday planners are very popular all over Patna. You get a dedicated event coordinator who
                        helps you with everything from planning your birthday party to the date of the event. Our location
                        experts help you choose the right location within your budget in the areas of your choice. From
                        dining options to complete entertainment, we take care of everything you need for a birthday party.
                    </p>
                    <p>Wedding Eventwala birthday planners have a wealth of birthday decoration ideas and get them done by
                        our expert birthday party decorators. Our planner offers a choice of theme-based birthday
                        decorations for both boys and girls. Beautiful colorful birthday balloons, birthday tables with
                        stage decorations, backdrops, table decorations, stands, character cut-outs, and much more, we add
                        to our offering to make the occasion special.</p>

                </div>
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
