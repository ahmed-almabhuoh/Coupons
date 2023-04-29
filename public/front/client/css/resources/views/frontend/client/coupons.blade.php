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
    <title> {{ __('Coupons') }} </title>

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



    <!-- ============== Start Main Section ========== -->
    <div class=" pt-5 pb-5">
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
                                                <img src="{{ env('APP_URL') . 'content/' . $product->image }}"
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

            <livewire:front.client.coupons :categories="$categories" :stores="$stores" :coupons="$coupons" />

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
