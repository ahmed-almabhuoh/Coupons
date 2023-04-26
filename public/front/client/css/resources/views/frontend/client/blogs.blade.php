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
    <title> {{__('Blogs')}} </title>

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
    <!-- ============== Start Main Section ========== -->

    <div class=" pt-5 pb-5">
        <div class="container">


            <div class="row">
                <section class="portfolio" id="Portfolio">

                    <livewire:front.client.blogs :categories="$categories" :blogs="$blogs" :stores="$stores" />
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

        @livewireScripts
</body>

</html>
