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
    <link rel="stylesheet" href="{{ asset('front/client/css/bootstrap.min.css') }}" />
    <!-- Bootstrap File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front/client/css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Page title -->
    <title>{{ __('About') }}</title>
</head>

<body>
    <!-- ================ Start Header ============ -->
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
    </nav>
    <!-- ================ End Header ============== -->

    <!-- ============== Start Main Section ======== -->
    <div class="main-section about pt-5 pb-3 mt-5">
        <div class="container">
            <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center  mb-5 position-relative ">
                <h2 class="position-absolute "> {{ __('About Us') }} </h2>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- text -->
                    <div class="col-md-6">
                        <div class="text">
                            <div class="about-text-header">
                                <h4> {{ __('About our platform') }} </h4>
                            </div>
                            <div class="about-text-body">
                                <p>
                                    {{ __('A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what This site presents a mini-paragraph that talks about what exactly this site offers. A mini-paragraph that specifically talks about what this site offers.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- img -->
                    <div class="about-img col-md-6">
                        <img src="{{ asset('front/client/imgs/about-avatar.png') }}" alt="">
                    </div>

                </div>

            </div>


        </div>
    </div>
    <!-- ============= End Main Section ========== -->

    <!--=============== Start Footer ============= -->

    @include('frontend.partials.footer')

    <!--=============== End Footer =============== -->
    <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/all.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script.js') }}"></script>

</body>

</html>
