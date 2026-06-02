@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        {{-- @if ($service->image)
            <div class="product-slide-wrapper">
                <div class="product-slides swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide single-product-slide"
                            style="background-image: url('{{ asset('storage/' . $service->image) }}')">
                        </div>
                    </div>
                </div>
            </div>
        @endif --}}

        <div class="product-description pb-3">
            <div class="post-content bg-white py-3 mb-3">
                <div class="container">

                    @php
                        $categoryName = strtolower(str_replace(' ', '-', $service->category->name));

                        $viewPath = 'frontend.' . $categoryName . '.' . $service->url;
                    @endphp

                    @if ($service->url && view()->exists($viewPath))
                        @include($viewPath)
                    @else
                        <h6>{{ $service->name }}</h6>
                        <p>Service details will appear here.</p>
                    @endif

                </div>
            </div>
        </div>

        @if ($service->is_gallary)
            <div class="container pb-3">
                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6>Gallery</h6>
                </div>

                @if ($service->galleries->isNotEmpty())
                    <div class="collection-slide swiper">
                        <div class="swiper-wrapper">
                            @foreach ($service->galleries as $item)
                                <div class="swiper-slide">
                                    <div class="card collection-card">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery Image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-muted">No gallery images available.</p>
                @endif
            </div>
        @endif

        @if ($service->is_enquiry)
            <div class="container pb-4">
                <div class="card shadow-sm border-0 p-3">
                    <h5 class="mb-3">Send Enquiry</h5>

                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number"
                                required>
                        </div>

                        <div class="mb-3">
                            <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit Enquiry</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
