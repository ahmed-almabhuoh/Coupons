<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('front/client/css/master.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/client/css/bootstrap.min.css') }}" />
    <!-- Bootstrap File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front/client/css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Page title -->
    <title>Blogs Page</title>
</head>

<body>

    <!-- ================Start Header============== -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <div class="logo">
                Logo <span>here</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 " href="#">Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="{{ route('pages.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.fqs') active @endif"
                            href="{{ route('pages.fqs') }}">Common Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 " href="#">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 active" href="{{ route('pages.blogs') }}">Blog</a>
                    </li>

                </ul>

                <!-- =====>>>> Start User <<<<===== -->

                <!-- Start -Image -->
                @if (auth('client')->check())
                    <div class="link btn-group ml-3">
                        <div class="user-iamge">
                            @if (!auth('client')->user()->image)
                                <img src="{{ asset('front/pages/imgs/user-image.png') }}" alt="">
                            @else
                                <img src="{{ env('APP_URL') . 'human/' . auth('client')->user()->image }}"
                                    width="40px" height="40px" alt="">
                            @endif
                        </div>
                        <button class="btn text-black-50 btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth('client')->user()->fname . ' ' . auth('client')->user()->lname }}
                        </button>
                        <ul class="dropdown-menu mt-2 text-start">
                            <li>
                                <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                                    </path>
                                </svg><!-- <i class="fa-solid fa-user"></i> Font Awesome fontawesome.com -->
                                <a href="{{ route('users.account') }}">My account</a>
                            </li>
                            <li>
                                <svg class="svg-inline--fa fa-arrow-right-from-bracket" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z">
                                    </path>
                                </svg>
                                <!-- <i class="fa-solid fa-arrow-right-from-bracket"></i> Font Awesome fontawesome.com -->
                                <a href="{{ route('logout') }}">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                @endif
                <!-- End User-Image -->

                <!-- =====>>>> End User <<<<====== -->

            </div>
        </div>
        <!-- End Container -->
    </nav>
    <!-- End Nav -->
    <!-- ================ End Header ================= -->
    <!-- ============== Start Main Section ========== -->

    <div class=" pt-5 pb-5">
        <div class="container">


            <div class="row">
                <section class="portfolio" id="Portfolio">
                    <div class="container">
                        <div class="row">
                            <div
                                class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
                                <h2 class="position-absolute "> Blog</h2>
                            </div>
                        </div>
                        <div class="row">

                            <div class="dropdown">
                                <a class="btn  dropdown-toggle blog" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    All
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item text-black-50" href="#">Shein store</a></li>
                                    <li><a class="dropdown-item text-black-50" href="#">Teddy bear store</a>
                                    </li>
                                    <li><a class="dropdown-item text-black-50" href="#">Mazaya Store</a></li>
                                </ul>
                            </div>

                            <div class="filter-buttons">
                                <ul id="filter-btns">
                                    <li class="active" data-target="all">ALL</li>
                                    <li data-target="Fashion">Fashion</li>
                                    <li data-target="Shoes">Shoes</li>
                                    <li data-target="Games">Games</li>
                                    <li data-target="Flowers">Flowers</li>
                                    <li data-target="Gifts">Gifts</li>
                                    <li data-target="Jewelry">Jewelry</li>
                                    <li data-target="Accessories">Accessories</li>
                                    <li data-target="Children">Children</li>
                                    <li data-target="Care and beauty">Care and beauty</li>
                                    <li data-target="Accessories">Accessories</li>
                                </ul>
                            </div>


                        </div>
                        <div class="row mb-lg-3">
                            <!-- =============Start portfolio=========== -->

                            <div class="portfolio-gallery offers-product" id="portfolio-gallery">

                                @foreach ($blogs as $blog)
                                    <div class="item" data-id="Fashion">
                                        <!-- card #1 -->
                                        <div class="card offers-product blog">
                                            <img src="{{ env('APP_URL') . 'content/' . $blog->image }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h6 class="card-title blog">{{ $blog->title }}</h6>
                                                </p>
                                            </div>
                                            <div class="position-relative">
                                                <div class="bottom-text mb-5 d-flex justify-content-around">
                                                    <button class="button blog btn btn-primary"><span
                                                            class="m-auto">Git it</span></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                                <!-- ============================================= -->
                                <!-- =============Start portfolio=========== -->
                            </div>

                        </div>
                    </div>
            </div>
            </section>
        </div>

        <!-- ============== End Main Section =========== -->

        <!--=============== Start Footer =============== -->
        <div class="footer pt-2 pb-2 text-white-50 text-center text-md-start">
            <div class="container text-center">
                <div class="row ">

                    <div class="col-md-12 col-lg-12">
                        <div class="links">
                            <h5 class="text-light">Logo <p>Here</p>
                            </h5>
                            <ul class="links  list-unstyled lh-lg d-flex justify-content-center gap-3 flex-wrap">
                                <li><a class="text-light" href="">Home</a></li>
                                <li><a class="text-white-50" href="">Coupons</a></li>
                                <li><a class="text-white-50" href="">About</a></li>
                                <li><a class="text-white-50" href="">Common Questions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=============== End Footer =========== -->

        <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/client/js/all.min.js') }}"></script>
        <script src="{{ asset('front/client/js/script.js') }}"></script>

</body>

</html>
