<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/bootstrap/css/bootstrap.min.css') }}">
    <!-- FontAwsome -->
    <link rel="stylesheet" href="{{ asset('front/authorization/css/all.min.css') }}">
    <!-- Css File -->
    @if (session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master-rtl.css') }}">
    @endif
    <!-- page Title -->
    <title> {{ __('Register a new account') }} </title>

    @livewireStyles
</head>

<!-- ================================================================= -->
<!-- Start Heaer -->
@include('frontend.partials.lang-switcher')
<!-- End Heaer -->

<body class="my-login-page">
    <!-- <img class="background" src="./img/line-in-background.png" alt=""> -->

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">

                    <div class="card fat register">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Register') }}</h4>

                            <livewire:front.auth.register />

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- JS File -->
    <script src="{{ asset('front/authorization/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    @livewireScripts
</body>

</html>
