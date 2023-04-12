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
    <link rel="stylesheet" type="text/css" href="{{ asset('front/authorization/css/master.css') }}">
    <!-- page Title -->
    <title> Login Page</title>


    @livewireStyles
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

                    <div class="card fat login">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>

                            <livewire:front.auth.login />

                            <div class="footer">
                                <span>Forgot your password?.. <a href="./forgot.html">Recover your
                                        password</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{ asset('front/authorization/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    @livewireScripts
</body>

</html>
