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
                    <h6>Wedding Photography and Videography Services</h6>
                    <p>Your wedding day and we capture those moments on camera to turn it into a special story. Wedding
                        photographers at Wedding Eventwala love to work with couples to create a charismatic package of
                        photographs that will document their wedding day, timeless and memorable. And those whom they can
                        see later and remember their happy moments.</p>
                    <p>Your wedding ceremony is your special day and we recreate it in a unique story by shooting those
                        moments with a digital camera. We’ll make you look back at those photos after a long time and relive
                        exactly the way you crafted your personal character story.</p>
                    <p>The photographer becomes part of the family for the bride and groom for a few days and creates a
                        happy atmosphere to flawlessly capture the joyful smile inside the wedding rituals. So that he can
                        capture some of your moments in the camera, after the wedding, with time, everything will change,
                        but the memorable moments always remain inside the candid photos in the wedding album.</p>

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
