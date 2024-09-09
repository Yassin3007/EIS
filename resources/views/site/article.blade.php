@extends('layouts.site')
    @section('content')
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">تفاصيل المقاله</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">الرئيسيه</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">تفاصيل المقاله</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Article Section Start -->
    <div class="container-fluid pt-5">
        <div class="row px-3">
            <!-- Article Start -->
            <div class=" col-lg-8 col-md-12 order-0">
                <div class="row pb-3 px-3">
                    <div class="wrapper d-flex flex-column pb-5">
                        <img src="{{$article->projectImages('news_image')->first()?$article->projectImages('news_image')->first()->full_url:asset("assets/admin.png")}}" alt="" style="max-width: 100%;">
                        <div class="post-meta mt-3">
                            <span class="post-meta-date"><i class="far fa-calendar ml-1"></i> {{ $article->created_at->format('F j, Y') }}</span>
                        </div>
                        <h5 class=" font-weight-semi-bold my-3">{{$article->title}}</h5>
                        <p>
                            {!! $article->content !!}
                        </p>
                    </div>
                </div>
            </div>
            <!-- Article End -->


            <!-- Article Sidebar Start -->
            <div class="col-lg-4 col-md-12 order-1 pr-lg-3 mt-lg-0 mt-5">
                <div class="text-center mb-4">
                    <h5 class="section-title px-5 recent-center-title"><span>المقالات المميزة</span></h5>
                </div>
                @foreach($specials as $special)
                    <div class="border-bottom mb-3 pb-3 text-center">
                        <a href="{{route('article_details',$special->id)}}" class="resent-article d-flex flex-column align-items-center">
                            <img src="{{$special->projectImages('news_image')->first()?$special->projectImages('news_image')->first()->full_url:asset("assets/admin.png")}}" alt="" class="recent-img">
                            <h5 class="font-weight-semi-bold my-3 recent-title">
                                {{$special->title}}
                            </h5>
                            <a href="{{route('article_details',$special->id)}}" class="btn btn-primary py-2 px-4">إقرأ
                                المزيد</a>
                        </a>
                    </div>
                @endforeach

            </div>
            <!-- Article Sidebar End -->

        </div>
    </div>
    <!-- Article Section End -->

@endsection
