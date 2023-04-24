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
    <title>Offers User</title>

    @livewireStyles
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
                        <a class="nav-link p-2 p-lg-3  @if (Route::currentRouteName() == 'pages.coupons') active @endif"
                            href="{{ route('pages.coupons') }}">Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.about') active @endif"
                            href="{{ route('pages.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.fqs') active @endif"
                            href="{{ route('pages.fqs') }}">Common Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.offers') active @endif "
                            href="{{ route('pages.offers') }}">Offers</a>
                    </li>
                    @if (auth('client')->check())
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.blogs') active @endif"
                                href="{{ route('pages.blogs') }}">Blog</a>
                        </li>
                    @endif
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
                @else
                    <a class="btn rounded-pill main-btn" href="{{ route('users.register') }}" onclick="">Create
                        account</a>
                    <div class="country btn-group m-3">
                        <button class="btn text-black-50  btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('front/client/imgs/united-states.png') }}" alt="">
                            English
                        </button>
                        <ul class="dropdown-menu mt-2 text-start">
                            <li>
                                <img src="{{ asset('front/client/imgs/saudi-arabia.png') }}" alt="">
                                <a class="text-black-50" href="#">Saudi Arabia</a>
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

    <!-- ================Start Hero Section=========== -->
    {{-- <div id="carouselExampleControls" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($offers as $offer)
                <div class="carousel-item active">
                    <img src="{{ asset('front/client/imgs/liner-background.png') }}" class="d-block w-100"
                        alt="...">
                    <img class="flowerd" src="{{ asset('front/client/imgs/flowerd.png') }}" alt="">
                    <div class="carousel-caption  ">
                        <h3 style="width: 50% !important;" class="pb-4">{{ $offer->title }}</h3>
                        <h3 class="pb-4">On the occasion of the Saudi National Day</h3>
                        <a class="dif-button btn btn-primary"
                            href="{{ $offer->btn_action }}">{{ $offer->btn_txt }}</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front/client/imgs/liner-background.png') }}" class="d-block w-100"
                        alt="...">
                    <img class="flowerd" src="{{ asset('front/client/imgs/flowerd.png') }}" alt="">
                    <div class="carousel-caption  ">
                        <h3>30% Discounts From the Floward store</h3>
                        <h3 class="pb-4">On the occasion of the Saudi National Day</h3>
                        <a class="dif-button btn btn-primary ">Get a discount coupon</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}

    <div id="carouselExampleControls" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($offers as $key => $offer)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('front/client/imgs/liner-background.png') }}" class="d-block w-100"
                        alt="...">
                    <img class="flowerd" src="{{ env('APP_URL') . 'content/' . $offer->image }}" alt="">
                    <div class="carousel-caption">
                        <h3 class="pd-6" style="width: 50%">{{ $offer->title }}</h3>
                        <a class="dif-button btn btn-primary"
                            href="{{ $offer->btn_action }}">{{ $offer->btn_txt }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- =============== End Hero Section ============ -->



    <!-- ============== Start Main Section ========== -->

    <div class=" pt-5 pb-5">
        <div class="container">



            {{-- </section> --}}
            <livewire:front.client.offers :products="$products" />
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
    </div>
    <!--=============== End Footer =========== -->

    <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/all.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
