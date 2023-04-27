<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Css File -->
    @if (session('lang') == 'ar')
        <link rel="stylesheet" href="{{ asset('front/pages/css/master-rtl.css') }}" />
        {{-- <link rel="stylesheet" href="{{ asset('front/authorization/css/master-rtl.css') }}" /> --}}
    @else
        <link rel="stylesheet" href="{{ asset('front/pages/css/master.css') }}" />
        {{-- <link rel="stylesheet" href="{{ asset('front/authorization/css/master.css') }}" /> --}}
    @endif
    <link rel="stylesheet" href="{{ asset('front/pages/css/bootstrap.min.css') }}" />
    <!-- Title Page -->

    @yield('styles')

    <title>@yield('title')</title>
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

                @include('frontend.partials.header')

            </div>
        </div>
    </nav>
    <!-- ================End Header============== -->

    <!-- ================Start Main Section============== -->
    <div class="sections  d-flex">
        <!-- Start Sidebar -->
        <sidebar class="sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">

                <ul class="nav pt-5 nav-pills flex-column mb-auto ">

                    <li class="nav-item pb-2 ">
                        <a href="{{ route('users.account') }}"
                            class="nav-link text-black-50 @if (Route::currentRouteName() == 'users.account') active @endif"
                            aria-current="page">
                            <i class="fa-solid fa-user"></i>
                            <span>{{ __('My Account') }}</span>
                        </a>
                    </li>

                    <li class="pb-2">
                        <a href="{{ route('users.favorite') }}"
                            class="nav-link link-dark text-black-50  @if (Route::currentRouteName() == 'users.favorite') active @endif">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>{{ __('Favorite') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.change.password') }}"
                            class="nav-link link-dark text-black-50 @if (Route::currentRouteName() == 'users.change.password') active @endif">
                            <i class="fa-solid fa-gear"></i>
                            <span>{{ __('Change Password') }}</span>
                        </a>
                    </li>

                </ul>

            </div>
        </sidebar>
        <!-- End Sidebar -->
        <!-- ====================== -->


        @yield('content')
    </div>
    <!-- ================End Main Section============== -->


    <!--=============== Start Footer =============== -->
    @include('frontend.partials.footer')
    <!--=============== End Footer =========== -->
    <script src="{{ asset('front/pages/js/script.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v6.4.0/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/pages/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/pages/js/all.min.js') }}"></script>

    @yield('scripts')
    @livewireScripts
</body>

</html>
