@extends('layouts.site')
@section('content')

    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if($banners->isNotEmpty())
                <div class="carousel-item active " style="height: 410px;">
                    <img class="img-fluid" src="{{$banners->first()->projectImages('banner_image')->first()?$banners->first()->projectImages('banner_image')->first()->full_url:asset("assets/admin.png")}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <p>{!! $banners->first()->description !!}</p>
{{--                            <a href="" class="btn btn-light py-2 px-3">تسوق الان</a>--}}
                        </div>
                    </div>
                </div>
            @endif
        @foreach($banners->skip(1) as $banner)

                <div class="carousel-item " style="height: 410px;">
                    <img class="img-fluid" src="{{$banner->projectImages('banner_image')->first()?$banner->projectImages('banner_image')->first()->full_url:asset("assets/admin.png")}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <p>{!! $banner->description !!}</p>
{{--                            <a href="" class="btn btn-light py-2 px-3">تسوق الان</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($banners->count() > 0)
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        @endif

    </div>
    </div>
    </div>
    </div>
    <!-- Navbar End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 ml-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">جودة المنتج</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 ml-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">ًالشحن مجانا</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 ml-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">استرجاع لمدة 14 يومًا</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 ml-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 دعم</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span>الأقسام</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($childCategories as $category)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">({{ $category->products->count() }}) منتج </p>
                        <a href="{{route('category_products',$category->id)}}" class="cat-img position-relative overflow-hidden mb-3">
                            <!-- Wrapper for aspect ratio -->
                            <div class="image-wrapper">
                                <img class="img-fluid category-image"
                                     src="{{ $category->projectImages('category_image')->first() ? $category->projectImages('category_image')->first()->full_url : asset('assets/admin.png') }}"
                                     alt="{{ $category->name }}">
                            </div>
                        </a>
                        <h5 class="font-weight-semi-bold text-center m-0">{{ $category->name }}</h5>                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
{{--    <div class="container-fluid offer pt-5">--}}
{{--        <div class="row px-xl-5">--}}
{{--            <div class="col-md-6 pb-4">--}}
{{--                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">--}}
{{--                    <img src="img/offer-1.png" alt="">--}}
{{--                    <div class="position-relative" style="z-index: 1;">--}}
{{--                        <h5 class="text-uppercase text-primary mb-3">خصم 20% على جميع الطلبات</h5>--}}
{{--                        <h1 class="mb-4 font-weight-semi-bold">المنتجات الصيفيه</h1>--}}
{{--                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">تسوق الان</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 pb-4">--}}
{{--                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">--}}
{{--                    <img src="img/offer-2.png" alt="">--}}
{{--                    <div class="position-relative" style="z-index: 1;">--}}
{{--                        <h5 class="text-uppercase text-primary mb-3">خصم 20% على جميع الطلبات</h5>--}}
{{--                        <h1 class="mb-4 font-weight-semi-bold">المنتجات الشتويه</h1>--}}
{{--                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">تسوق الان</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span>الأكثر مبيعا</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($bestSellingProducts as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <!-- Wrapper for aspect ratio -->
                            <div class="image-wrapper">
                                <img class="img-fluid product-image"
                                     src="{{ $product->projectImages('image')->first() ? $product->projectImages('image')->first()->full_url : asset('assets/admin.png') }}"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$product->price!= null ? number_format($product->price, 2) :  $product->price_from .' - '.$product->price_to}} جنيه</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-around bg-light border">
                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary ml-1"></i>عرض التفاصيل
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
{{--    <div class="container-fluid bg-secondary my-5">--}}
{{--        <div class="row justify-content-md-center py-5 px-xl-5">--}}
{{--            <div class="col-md-6 col-12 py-5">--}}
{{--                <div class="text-center mb-2 pb-2">--}}
{{--                    <h2 class="section-title px-5 mb-3"><span>ابق على اطلاع بكل ماهو--}}
{{--                            جديد</span></h2>--}}
{{--                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod--}}
{{--                        duo labore labore.</p>--}}
{{--                </div>--}}
{{--                <form action="">--}}
{{--                    <div class=" input-group">--}}
{{--                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-primary px-4">Subscribe</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span>الاحدث وصولا</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($latestProducts as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <!-- Wrapper for aspect ratio -->
                            <div class="image-wrapper">
                                <img class="img-fluid product-image"
                                     src="{{ $product->projectImages('image')->first() ? $product->projectImages('image')->first()->full_url : asset('assets/admin.png') }}"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$product->price!= null ? number_format($product->price, 2) :  $product->price_from .' - '.$product->price_to}} جنيه</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-around bg-light border">
                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary ml-1"></i>عرض التفاصيل
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


{{--    <!-- Vendor Start -->--}}
{{--    <div class="container-fluid py-5">--}}
{{--        <div class="row px-xl-5">--}}
{{--            <div class="col">--}}
{{--                <div class="owl-carousel vendor-carousel">--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-1.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-4.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-5.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-6.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-7.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="vendor-item border p-4">--}}
{{--                        <img src="img/vendor-8.jpg" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Vendor End -->--}}

@endsection
