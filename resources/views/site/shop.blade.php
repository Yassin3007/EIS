@extends('layouts.site')
    @section('content')
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">المتجر</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">الرئيسية</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">المتجر</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
{{--                            <form action="">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search by name">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <span class="input-group-text bg-transparent text-primary">--}}
{{--                                            <i class="fa fa-search"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                            <div class="dropdown ml-4">--}}
{{--                                <button class="btn border dropdown-toggle" type="button" id="triggerId"--}}
{{--                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Sort by--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">--}}
{{--                                    <a class="dropdown-item" href="#">Latest</a>--}}
{{--                                    <a class="dropdown-item" href="#">Popularity</a>--}}
{{--                                    <a class="dropdown-item" href="#">Best Rating</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    @foreach($products as $product)
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
                                        <h6>{{ number_format($product->price, 2) }} جنيه</h6>
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
                    <div class="col-12 pb-1">
                       {{$products->links()}}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection
