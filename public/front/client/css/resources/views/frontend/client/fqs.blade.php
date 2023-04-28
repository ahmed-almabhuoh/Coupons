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
    <title> {{ __('Common questions') }} </title>
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

    <!-- ============== Start Main Section ======== -->
    <div class="main-section pt-5 pb-3 mt-5">
        <div class="container">
            @if (session('message'))
                <div class="alert @if (session('code') == 200) alert-success @else alert-danger @endif"
                    role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center  mb-5 position-relative ">
                <h2 class="position-absolute "> {{ __('Common Questions') }}</h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-4">
                    <div class="accordion" id="accordionExample">

                        @if (!count($fqs))
                            <h2>{{ __('No questions published yet!') }}</h2>
                        @endif
                        @foreach ($fqs as $fq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $fq->title }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $fq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="form col-md-6 px-4">
                    <div class="row ">
                        <div class="col-md-12">

                            <h3> {{ __('Do you have a question in your mind?!') }} </h3>
                            <p> {{ __('Ask us and we will respond within 24 hours.') }} </p>

                            <form class="common-question" method="POST" action="{{ route('send.contact') }}">
                                @csrf
                                <div class="form-group ">
                                    <!-- <label for="email">Email address</label> -->
                                    <input type="email"
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        id="email" name="email" placeholder="{{ __('Your E-mail') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea
                                        class="form-control @error('message')
                                    is-invalid
                                    @enderror"
                                        id="message" name="message" rows="5" placeholder="{{ __('Your Message Here..') }}"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary col-6">{{ __('Submit') }}</button>
                                </div>
                            </form>

                        </div>
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
