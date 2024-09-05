@extends('layouts.site')
@section('content')
    </div>
</div>
</div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">تفاصيل المنتج</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">الرئيسية</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">التفاصيل</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <!-- First image -->
                        <div class="carousel-item active">
                            <img class="carousel-img" src="{{$product->projectImages('image')->first() ? $product->projectImages('image')->first()->full_url : asset('assets/admin.png')}}" alt="Image">
                        </div>

                        <!-- Loop through additional images -->
                        @foreach ($product->projectImages('product_images') as $image)
                            <div class="carousel-item">
                                <img class="carousel-img" src="{{$image->full_url}}" alt="Image">
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
{{--                <div class="d-flex mb-3">--}}
{{--                    <div class="text-primary mr-2">--}}
{{--                        <small class="fas fa-star"></small>--}}
{{--                        <small class="fas fa-star"></small>--}}
{{--                        <small class="fas fa-star"></small>--}}
{{--                        <small class="fas fa-star-half-alt"></small>--}}
{{--                        <small class="far fa-star"></small>--}}
{{--                    </div>--}}
{{--                    <small class="pt-1">(50 Reviews)</small>--}}
{{--                </div>--}}
                <h3 class="font-weight-semi-bold mb-4">{{number_format($product->price,2)}} جنيه</h3>
                <p class="mb-4">
                    {!! $product->short_description !!}
                </p>

            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">التفاصيل</a>
{{--                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>--}}
{{--                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>--}}
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">تفاصيل المنتج</h4>
                        <p>
                            {!! $product->description !!}
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        @if($related_products->count() >0)
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span>You May Also Like</span></h2>
            </div>
        @endif

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
{{--                    <div class="card product-item border-0">--}}
{{--                        <div--}}
{{--                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">--}}
{{--                            <img class="img-fluid w-100" src="{{$product->projectImages('image')->first()?$product->projectImages('image')->first()->full_url:asset("assets/admin.png")}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">--}}
{{--                            <h6 class="text-truncate mb-3">{{$product->name}}</h6>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <h6>$123.00</h6>--}}
{{--                                <h6 class="text-muted mr-2"><del>{{round($product->price , 2)}} جنيه</del></h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer d-flex justify-content-around bg-light border">--}}
{{--                            <a href="{{route('product_details',$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary ml-1"></i>عرض--}}
{{--                                التفاصيل</a>--}}
{{--                            --}}{{--                            <a href="" class="btn btn-sm text-dark p-0"><i--}}
{{--                            --}}{{--                                    class="fas fa-shopping-cart text-primary ml-1"></i>أضف إلى السلة</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @foreach($related_products as $product)
                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{$product->projectImages('image')->first()?$product->projectImages('image')->first()->full_url:asset("assets/admin.png")}}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{round($product->price , 2)}} جنيه</h6>
{{--                                    <h6 class="text-muted mr-2"><del>125$</del></h6>--}}
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-around bg-light border">
                                <a href="{{route('product_details',$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary ml-1"></i>عرض
                                    التفاصيل</a>
                                {{--                            <a href="" class="btn btn-sm text-dark p-0"><i--}}
                                {{--                                    class="fas fa-shopping-cart text-primary ml-1"></i>أضف إلى السلة</a>--}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


@endsection


