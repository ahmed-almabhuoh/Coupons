<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Css File -->
    @if (session('lang') == 'ar')
        <link rel="stylesheet" href="{{ asset('front/client/css/master-rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('front/client/css/master.css') }}" />
    @endif
    <!-- <link rel="stylesheet" href="css/master-rtl.css" /> -->
    <link rel="stylesheet" href="{{ asset('front/client/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/client/css/style.css') }}" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('front/client/css/swiper-bundle.min.css') }}" />
    <!-- Bootstrap File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front/client/"css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Page title -->
    <title>{{ __('Home') }}</title>
    @livewireStyles
</head>

<body>


    <!-- ================Start Header============== -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <div class="logo">
                @php
                    $logo = DB::table('website_settings')
                        ->orderByDESC('created_at')
                        ->first()->logo;
                @endphp
                <img src="{{ env('APP_URL') . 'content/' . $logo }}" alt="" style="width: 50px; height: 50px;"
                    class="website-logo">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">

                {{-- Header --}}
                @include('frontend.partials.header')

            </div>
        </div>
        <!-- End Container -->
    </nav>
    <!-- End Nav -->
    <!-- ================ End Header ================= -->


    <!-- ================Start Hero Section=========== -->
    {{-- <div id="carouselExampleControls" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner"> --}}
    {{-- @foreach ($offers as $key => $offer)
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
            @endforeach --}}

    {{-- @foreach ($offers as $key => $offer)
                <a href="{{ $offer->btn_action }}">
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="image-container">
                            <img src="./imgs/food-facebook-cover.png" class="d-block w-100" alt="Carousel One">
                            <img src="{{ env('APP_URL') . 'content/' . $offer->image }}" class="d-block  w-100"
                                alt="...">
                        </div>
                        <div class="carousel-caption">
                            <a class="dif-button btn btn-primary"
                                href="{{ $offer->btn_action }}">{{ $offer->btn_txt }}</a>
                        </div>
                    </div>
                </a>
            @endforeach --}}

    {{-- </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('Previous') }}</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('Next') }}</span>
        </button>
    </div> --}}

    <div id="CarouselSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#CarouselSlider" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#CarouselSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <div class="carousel-inner">

            @foreach ($offers as $key => $offer)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{ env('APP_URL') . 'content/' . $offer->image }}" class="d-block w-100"
                        alt="Carousel One">
                </div>
            @endforeach

            {{-- <div class="carousel-item" data-bs-interval="2000">
                <img src="./imgs/food-facebook-cover.png" class="d-block w-100" alt="Carousel Two">
            </div> --}}
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('Previous') }}</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#CarouselSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('Next') }}</span>
        </button>
    </div>
    <!-- =============== End Hero Section ============ -->

    <!-- ============== Start Main Section ========== -->
    {{-- <div class=" pt-5 pb-5">
        <div class="container">


            @if (count($products) >= 1)
                <div class="row">
                    <section class="portfolio special-offers" id="Portfolio">
                        <div class="container">
                            <!-- Head Text -->
                            <div
                                class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
                                <h2 class="position-absolute "> {{ __('Special Offers') }}</h2>
                            </div>
                            <!-- Cards -->
                            <!-- Card 1 -->
                            <div class="portfolio-gallery offers ">
                                <!-- Card 1 -->
                                @foreach ($products as $product)
                                    <div class="item">
                                        <div class="card inner special-offers">
                                            <!-- icon -->
                                            <div class="img-top">
                                                @if ($product->image)
                                                    <img src="{{ env('APP_URL') . 'content/' . $product->image }}"
                                                        class="card-img-top" alt="...">
                                                @else
                                                    <img src="{{ env('APP_URL') . 'content/products/default.jpg' }}"
                                                        class="card-img-top" alt="...">
                                                @endif
                                                <img src="{{ env('APP_URL') . 'content/' . $product->image ?? 'default.jpg' }}"
                                                    class="card-img-top" alt="...">
                                            </div>
                                            <!-- img -->
                                            <div class="img icons">
                                                <img src="{{ env('APP_URL') . 'content/' . $product->store->icon }}"
                                                    alt="portfolio" style="width: 50px; height: 50px;">
                                            </div>
                                            <!-- text -->
                                            <div class="body">
                                                <p>{{ $product->store->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                    </section>
                </div>
            @endif

            <livewire:front.client.home :coupons="$coupons" :stores="$stores" :categories="$categories" />

        </div>
        </section>
    </div> --}}


    <!-- ============== Start Main Section ========== -->
    <div class=" pt-2 pb-5">
        <div class="container">

            <!--===== Start special-offers ====-->
            <div class="container swiper">
                <h2 class="new-sec-title">Strong Offers</h2>
                <div class="slide-container">

                    <div class="card-wrapper swiper-wrapper">

                        <div class="card swiper-slide">
                            <!-- icon -->
                            <div class="image-box">
                                <img src="./imgs/product-1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="profile-details">
                                <img src="./imgs/noon-icon.png" alt="" />
                                <div class="name-job">
                                    <h3 class="name">Siliana Ramis</h3>
                                    <h4 class="job">Photographer</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card swiper-slide">
                            <div class="image-box">
                                <img src="./imgs/product-2.png" alt="" />
                            </div>
                            <div class="profile-details">
                                <img src="./imgs/flawerd-store.jpg" alt="" />
                                <div class="name-job">
                                    <h3 class="name">Siliana Ramis</h3>
                                    <h4 class="job">Photographer</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card swiper-slide">
                            <div class="image-box">
                                <img src="./imgs/product-3.png" alt="" />
                            </div>
                            <div class="profile-details">
                                <img src="./imgs/noon-icon.png" alt="" />
                                <div class="name-job">
                                    <h3 class="name">Richard Bond</h3>
                                    <h4 class="job">Data Analyst</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card swiper-slide">
                            <div class="image-box">
                                <img src="./imgs/product-4.png" alt="" />
                            </div>
                            <div class="profile-details">
                                <img src="./imgs/flawerd-store.jpg" alt="" />
                                <div class="name-job">
                                    <h3 class="name">Priase</h3>
                                    <h4 class="job">App Developer</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card swiper-slide">
                            <div class="image-box">
                                <img src="./imgs/product-5.png" alt="" />
                            </div>
                            <div class="profile-details">
                                <img src="./imgs/noon-icon.png" alt="" />
                                <div class="name-job">
                                    <h3 class="name">James Laze</h3>
                                    <h4 class="job">Blogger</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
            <!--===== End special-offers ====-->

            <div class="row">
                <section class="portfolio" id="Portfolio">
                    <div class="container">

                        <div class="row">

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


                        <div class="row">
                            <!-- =============Start portfolio=========== -->
                            <div class="portfolio-gallery" id="portfolio-gallery">
                                <div class="item" data-id="Fashion">

                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/flawerd-store.jpg" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="item" data-id="Shoes">
                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/noon-icon.png" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="item" data-id="Games">
                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/noon-icon.png" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="item" data-id="Games">
                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/flawerd-store.jpg" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="item" data-id="Games">
                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/noon-icon.png" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="item" data-id="Fashion">
                                    <div class="card inner">
                                        <!-- icon -->
                                        <div class="icon">
                                            <img src="imgs/share-icon-card.png" alt="icon">
                                            <img src="imgs/icon-card-multi.png" alt="icon">
                                        </div>
                                        <!-- img -->
                                        <div class="img edite">
                                            <img src="imgs/flawerd-store.jpg" alt="portfolio">
                                        </div>
                                        <!-- text -->
                                        <div class="text">
                                            <span>Floward</span>
                                            <p><span>Offers:</span> 15%</p>
                                        </div>
                                        <!-- button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <div class="left">
                                                Coupon details
                                            </div>
                                            <div class="right">
                                                15%
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <!-- Start Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title m-auto text-black-50 " id="exampleModalLabel">
                                                    Coupon details</h2>
                                            </div>


                                            <div class="modal-body ">
                                                <div class="first-sec d-flex justify-content-between">
                                                    <!--Section #1 -->
                                                    <div
                                                        class="content d-flex align-items-center justify-content-center">
                                                        <!-- <img class="icon-model website-logo" src="imgs/flaword-icon-card.png" alt=""> -->
                                                        <!-- img -->
                                                        <div class="img edite">
                                                            <img src="imgs/noon-icon.png" alt="portfolio">
                                                        </div>
                                                        <div class="text-des ml-3">
                                                            <strong>Floward</strong>
                                                            <p>A store that specializes in rose bouquets</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="button">
                            <a href="#">visite <span class="ms-1"> &rarr;</span></a>
                          </div> -->
                                                </div>
                                                <!--Section #2 -->
                                                <div class="midel-sec d-flex">
                                                    <div class="first-dev">
                                                        <span>Discount: <strong>15%</strong></span>
                                                    </div>
                                                    <div class="first-dev">
                                                        <span>Last use: <strong>a day ago</strong></span>
                                                    </div>
                                                    <div class="first-dev">
                                                        <span>Category: <strong>All products</strong></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="icon-container">
                                                <div class="icon-box bg-black">
                                                    <img src="imgs/shopping-bag-icon.png" alt=""
                                                        data-src="">
                                                    <div>
                                                        <p>shopping</p>
                                                    </div>
                                                </div>

                                                <div class="icon-box">
                                                    <img src="imgs/Heart, Favorite.png" alt=""
                                                        data-src="./imgs/heart-selceted.png">
                                                    <div>
                                                        <p>favourite</p>
                                                    </div>
                                                </div>
                                                <div class="icon-box">
                                                    <img src="imgs/thumbs-up-like-square.png" alt=""
                                                        data-src="./imgs/lik-selceted.png">
                                                    <div>
                                                        <p>active</p>
                                                    </div>
                                                </div>
                                                <div class="icon-box">
                                                    <img src="imgs/dislike.png" alt=""
                                                        data-src="./imgs/dis-selceted.png">
                                                    <div>
                                                        <p>inactive</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal-footer d-flex">
                                                <span><img src="imgs/share-icon-copuon.png" alt=""> Share
                                                </span>
                                                <a id="copyButton" type="button"
                                                    class="copy-button btn btn-secondary" onclick="copyCode()">
                                                    Copy Code
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                            </div>
                        </div>

                    </div>
            </div>
        </div>
        </section>
    </div>
    <!-- ============== End Main Section =========== -->


    <!-- ============== End Main Section =========== -->


    <!--=============== Start Footer =============== -->
    @include('frontend.partials.footer')
    <!--=============== End Footer =========== -->

    <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/all.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
