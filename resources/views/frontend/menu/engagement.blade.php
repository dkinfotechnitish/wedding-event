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
                    <h6>Wedding Engagement Services</h6>
                    <p>
                        Wedding Eventwala Engagement Services is known for providing exceptional engagement solutions for
                        couples in Patna.
                        We offer the very best facilities in Patna for wedding engagement, ensuring that every detail is
                        perfect.

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
