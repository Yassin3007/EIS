<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>EIS | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('site/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('site/css/style.css')}}" rel="stylesheet">
</head>
<style>
    .carousel-img {
        width: 100%; /* Ensure it fills the container width */
        height: 400px; /* Set a fixed height */
        object-fit: contain; /* Show the full image without cutting */
        background-color: #f0f0f0; /* Optional: Add a background color to fill the space */
    }

    /* Ensure the carousel maintains consistent height */
    .carousel-inner {
        height: 400px; /* Same as the image height */
    }

    /* Optional: For smaller screens, adjust the height */
    @media (max-width: 768px) {
        .carousel-img {
            height: 300px;
        }
        .carousel-inner {
            height: 300px;
        }
    }
    .image-wrapper {
        position: relative;
        width: 100%;
        padding-top: 75%; /* This gives a 4:3 aspect ratio. Change this if you want a different aspect ratio */
        overflow: hidden;
        background-color: #f5f5f5; /* Optional: Background color for empty space */
    }

    .product-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain; /* Ensures that the whole image fits inside the container */
        background-color: #f5f5f5; /* Optional: Background color for extra space */
    }

    .image-wrapper {
        position: relative;
        width: 100%;
        padding-top: 75%; /* This gives a 4:3 aspect ratio. Change this if you want a different aspect ratio */
        overflow: hidden;
        background-color: #f5f5f5; /* Optional: Background color for empty space */
    }

    .category-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain; /* Ensures that the whole image fits inside the container without being cropped */
        background-color: #f5f5f5; /* Optional: Background color for extra space */
    }
</style>
<body>
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-2 px-xl-5 top">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="index.html" class="text-decoration-none">
                <img src="img/logo.png" style="width: 80px" alt="">
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="البحث عن المنتجات">
                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 "
               data-toggle="collapse" href="#navbar-vertical"
               style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0 text-white">الاقسام</h6>
                <i class="fa fa-angle-down text-white"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                 id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

                    @foreach($categories as $category)
                        @if($category->parent_id == null && $category->children->isNotEmpty())
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link" data-toggle="dropdown">{{$category->name}} <i
                                        class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    @foreach($category->children as $child)
                                        <a href="{{route('category_products',$child->id)}}" class="dropdown-item">{{$child->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($category->parent_id == null && $category->children->isEmpty())
                            <a href="{{route('category_products',$category->id)}}" class="nav-item nav-link">{{$category->name}}</a>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-1 py-lg-0 px-0">
                <a href="index.html" class="text-decoration-none d-block d-lg-none">
                    <img src="img/logo.png" style="width: 77px;" alt="">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('index')}}" class="nav-item nav-link active">الرئيسيه</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">المتجر</a>

                        <a href="{{route('contact')}}" class="nav-item nav-link">تواصل معنا</a>

                    </div>
                    <div class="navbar-nav ml-auto py-0">
{{--                        <a href="login.html" class="nav-item nav-link">تسجيل الدخول</a>--}}
{{--                        <a href="register.html" class="nav-item nav-link">تسجيل</a>--}}
                        <a href="about.html" class="nav-item nav-link">من نحن</a>
                        <a href="{{route('allArticles')}}" class="nav-item nav-link">المقالات</a>
                    </div>
                </div>
            </nav>



@yield('content')









<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-4">
    <div class="row px-xl-5 pt-3">
        <div class="col-sm-3 b-5 pr-3 pr-xl-5 mb-3 d-flex align-items-center justify-content-center">
            <a href="" class="text-decoration-none">
                <img src="img/logo.png" style="width: 130px" class="mb-2" alt="">
            </a>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-5 mb-5 d-flex align-items-center flex-column justify-content-center">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-left ml-2"></i>Home</a>
                        <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-left ml-2"></i>Our
                            Shop</a>
                        <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-left ml-2"></i>Shop
                            Detail</a>
                        <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-left ml-2"></i>Shopping
                            Cart</a>
                        <a class="text-dark mb-2" href="checkout.html"><i
                                class="fa fa-angle-left ml-2"></i>Checkout</a>
                        <a class="text-dark" href="contact.html"><i class="fa fa-angle-left ml-2"></i>Contact
                            Us</a>
                    </div>
                </div>
                <div class="col-sm-7 mb-5 d-flex align-items-center flex-column justify-content-center">
                    <p class=" mb-2"><i class="fa fa-map-marker-alt text-primary ml-3"></i>123 Street, New York, USA
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary ml-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary ml-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-12 px-xl-0 text-center">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pr-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <div class="col-12 px-xl-0 pt-3">
            <p class="mb-md-0 text-center text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved.
                Designed
                by
                <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('site/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('site/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('site/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('site/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('site/js/main.js')}}"></script>
</body>

</html>
