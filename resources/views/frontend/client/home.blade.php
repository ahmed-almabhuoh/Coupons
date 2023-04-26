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
    <title>{{ __('Home') }}</title>

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

                {{-- Header --}}
                @include('frontend.partials.header')

            </div>
        </div>
        <!-- End Container -->
    </nav>
    <!-- End Nav -->
    <!-- ================ End Header ================= -->


    <!-- ================Start Hero Section=========== -->
    <div id="carouselExampleControls" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($offers as $key => $offer)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('front/client/imgs/liner-background.png') }}" class="d-block w-100"
                        alt="...">
                    <img class="flowerd" src="{{ env('APP_URL') . 'content/' . $offer->image }}" alt="">
                    <div class="carousel-caption">
                        <h3 class="pd-6" style="width: 50%">{{ $offer->title }}</h3>
                        <a class="dif-button btn btn-primary" href="{{ $offer->btn_action }}">{{ $offer->btn_txt }}</a>
                    </div>
                </div>
            @endforeach
        </div>
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
    </div>
    <!-- =============== End Hero Section ============ -->

    <!-- ============== Start Main Section ========== -->
    <div class=" pt-5 pb-5">
        <div class="container">

            <livewire:front.client.home :coupons="$coupons" :stores="$stores" :categories="$categories" />

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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
