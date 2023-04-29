<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Css File -->
    {{-- <link rel="stylesheet" href="{{ asset('front/client/css/master.css') }}" /> --}}
    @if (session('lang') == 'ar')
        <link rel="stylesheet" href="{{ asset('front/client/css/master-rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('front/client/css/master.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('front/client/css/bootstrap.min.css') }}" />
    <!-- Bootstrap File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front/client/css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Page title -->
    <title>{{ __('Articals') }}</title>
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
    <!-- ============== Start Main Section ========== -->

    <div class="blogs ">
        <div class="container">

            <div class="row pt-5">
                <section class="portfolio" id="Portfolio">
                    <div class="container">

                        <div class="row">
                            <!-- header img  -->
                            <img src="{{ env('APP_URL') . 'content/' . $blog->image }}" class="img-fluid"
                                alt="...">

                            <!-- section -->
                            <div class="pt-5 pb-4 title-blog ">
                                <h2> {{ $blog->title }} </h2>
                            </div>

                            @foreach ($blog->articals as $index => $artical)
                                <div class="row">
                                    {{-- <h3>{{$index + 1}}</h3> --}}
                                    @if ($index % 2 != 0)
                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                            <img src="{{ env('APP_URL') . 'content/' . $artical->image }}"
                                                class="img-fluid" alt="صورة">
                                        </div>
                                    @endif
                                    <div class="description col-xl-7 col-md-12">
                                        <p> {{ $artical->description }} </p>
                                    </div>
                                    @if ($index % 2 == 0)
                                        <div class="col-lg-5 col-md-12">
                                            <img src="{{ env('APP_URL') . 'content/' . $artical->image }}"
                                                class="img-fluid" alt="صورة">
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>



    <div class=" pt-5 pb-5">
        <div class="container">


            @if (count($blogs) > 1)
                <div class="row">
                    <section class="portfolio" id="Portfolio">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
                                    <h2 class="position-absolute "> Blog</h2>
                                </div>
                            </div>

                            <div class="row mb-lg-3">
                                <!-- =============Start portfolio=========== -->
                                <div class="portfolio-gallery offers-product" id="portfolio-gallery">

                                    @foreach ($blogs as $new_blog)
                                        @if ($blog->id != $new_blog->id)
                                            <div class="item" data-id="Fashion">
                                                <!-- card #1 -->
                                                <div class="card offers-product blog">
                                                    <a class="category"
                                                        href="#">{{ $new_blog->category->name }}</a>
                                                    <img src="{{ env('APP_URL') . 'content/' . $new_blog->image }}"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h6 class="card-title blog">{{ $new_blog->title }}</h6>
                                                        </p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="bottom-text mb-5 d-flex justify-content-around">
                                                            <button id="myButton"
                                                                class="button blog btn btn-primary"><span
                                                                    class="m-auto"> {{ __('Git it') }}
                                                                </span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!-- ============================================= -->

                                </div>
                                <!-- =============Start portfolio=========== -->
                            </div>

                        </div>
                </div>
            @endif
        </div>
        </section>
    </div>

    <!-- ============== End Main Section =========== -->

    <!--=============== Start Footer =============== -->
    @include('frontend.partials.footer')
    <!--=============== End Footer =========== -->

    <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/all.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script.js') }}"></script>

</body>

</html>
