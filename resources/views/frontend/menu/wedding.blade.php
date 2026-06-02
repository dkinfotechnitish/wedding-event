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
                    <h6>Wedding Services</h6>
                    <p>
                        Wedding Eventwala Wedding Services is known for providing exceptional wedding solutions for
                        couples in Patna.
                        We offer the very best facilities in Patna for wedding services, ensuring that every detail is
                        perfect.
                    </p>
                    <p>From wedding planning and coordination to venue selection, catering, decoration, and entertainment,
                        our wedding services cover every aspect of your special day. Our experienced team of wedding
                        planners will work closely with you to understand your vision and preferences, ensuring that your
                        wedding is a reflection of your unique love story. We take care of all the details, from managing
                        vendors to creating a seamless timeline, so you can relax and enjoy your wedding day to the fullest.
                        Whether you envision a traditional wedding, a modern celebration, or a destination wedding, our
                        wedding services are designed to make your dream wedding a reality. With our attention to detail and
                        commitment to excellence, we ensure that your special day is nothing short of perfect.
                    </p>
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
