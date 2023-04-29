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
    <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master.css') }}">
    <!-- page Title -->
    <title> {{ __('Recover Password') }} </title>
</head>

<!-- ================================================================= -->
<!-- Start Heaer -->
<nav class="header">
    <div class="language-switcher">
        <ul>
            <li><a href="#" class="active" onclick="switchLanguage('english')">Eng</a></li>
            <li><a href="#" class="" onclick="switchLanguage('arabic')">عربي</a></li>
        </ul>
    </div>
</nav>
<!-- End Heaer -->

<body class="my-login-page ">
    <!-- <img class="background" src="./img/line-in-background.png" alt=""> -->
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">

                    <div class="card fat reset-pas">
                        <div class="card-body">
                            <h4 class="card-title"> {{ __('Recover Password') }} </h4>

                            <form method="POST" action="{{ route('clients.reset.password.submitted', $token) }}">
                                @csrf
                                <!-- 1 -->
                                <div class="form-group">
                                    <label for="password1">{{ __('New Password') }}</label>
                                    <input id="password1" name="password" type="password"
                                        class="form-control @error('password') is-invalide @enderror" name="password1"
                                        placeholder="New Password" required autofocus>
                                    <span toggle="#password" class="toggle-password fa fa-fw fa-eye"
                                        data-target="#password1"></span>
                                </div>
                                @error('password')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                                <!-- 2 -->
                                <div class="form-group">
                                    <label for="password2">{{ __('Password Confirmation') }}</label>
                                    <input id="password2" name="password_confirmation" type="password"
                                        class="form-control" name="password2" placeholder="Confirm password" required
                                        autofocus>
                                    <span toggle="#password" class="toggle-password fa fa-fw fa-eye"
                                        data-target="#password2"></span>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </form>
                            <div class="forget-text-link  margin-top20 text-center">
                                {{ __('Don\'t have an account?..') }} <a
                                    href="register.html">{{ __('Create an account!') }}</a>
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

</body>

</html>
