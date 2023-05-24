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
        <link rel="stylesheet" href="{{ asset('front/client/css/style-rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('front/client/css/master.css') }}" />
        <link rel="stylesheet" href="{{ asset('front/client/css/style.css') }}" />
    @endif
    <!-- <link rel="stylesheet" href="css/master-rtl.css" /> -->
    <link rel="stylesheet" href="{{ asset('front/client/css/bootstrap.min.css') }}" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('front/client/css/swiper-bundle.min.css') }}" />
    <!-- Bootstrap File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front/client/css/all.min.cs') }}s" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Page title -->
    <title>@yield('title')</title>

    @yield('styles')
    @livewireStyles
</head>

<body>

    <!-- ================Start Header============== -->
    @include('frontend/client-v1/partials/header')
    <!-- ================ End Header ================= -->

    {{-- Content --}}
    @yield('content')

    <!--=============== Start Footer =============== -->
    @include('frontend/client-v1/partials/footer')
    <!--=============== End Footer =========== -->


    <script src="{{ asset('front/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/all.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script.js') }}"></script>
    <script src="{{ asset('front/client/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/client/js/script-slider.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @yield('scripts')
    @livewireScripts
    @stack('scripts')
</body>

</html>
