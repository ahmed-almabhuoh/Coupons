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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- FontAwsome -->
    <link rel="stylesheet" href="{{ asset('front/authorization/css/all.min.css') }}">
    <!-- Css File -->
    @if (session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master-rtl.css') }}">
    @endif
    <!-- page Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>{{ __('Foreget Password') }}</title>

    <!-- ================================================================= -->
    <!-- Start Heaer -->
</head>
@include('frontend.partials.lang-switcher')
<!-- End Heaer -->

<body class="my-login-page ">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat forget-pas">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Recover Password') }}</h4>
                            <form method="POST" action="{{ route('clients.reset.password') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email"> {{ __('E-Mail Address') }} </label>
                                    <input id="email" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="" required autofocus>
                                </div>
                                @error('email')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                                <div class="form-group no-margin">
                                    <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        type="submit" class=" btn btn-primary btn-block">
                                        {{ __('Recover') }}
                                    </button>
                                </div>
                            </form>
                            <div class="forget-text-link  margin-top20 text-center">
                                {{ __('Don\'t have an account?.. ') }} <a href="{{ route('users.register') }}">
                                    {{ __('Create an account!') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- =================Start POPUP =============  -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog text-center">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h1 class="text-justify modal-title fs-3 " id="exampleModalLabel">Restore password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    We have sent a password recovery link to test1@gmail.com, you can access it and recover your
                    password
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block">Done</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- =================End POPUP =============  -->
    <!-- JS File -->
    <script src="{{ asset('front/authorization/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>
