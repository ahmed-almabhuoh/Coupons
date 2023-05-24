<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <div class="logo">
            <img src="{{ env('APP_URL') . 'content/' . $new_website_settings->logo }}" alt="" class="website-logo">

        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.home') active @endif"
                        href="{{ route('pages.home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.about') active @endif"
                        href="{{ route('pages.about') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.fqs') active @endif"
                        href="{{ route('pages.fqs') }}">{{ __('Common Questions') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.offers') active @endif"
                        href="{{ route('pages.offers') }}">{{ __('Offers') }}</a>
                </li>
            </ul>

            <!-- =============Start Drop Down Country========= -->
            <div class="btn-group drop-country">
                @php
                    // dd(\Illuminate\Support\Facades\Cookie::get('new_selected_country', 1));
                    $selectedCountry = \App\Models\Country::where('id', \Illuminate\Support\Facades\Cookie::get('new_selected_country', 1))->first();
                @endphp
                <button class="btn btn-secondary bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="selected-item">
                        <img class="selected-item-icon" src="{{ env('APP_URL') . 'content/' . $selectedCountry->img }}"
                            alt="">
                        <span class="selected-item-text">{{ $selectedCountry->name }}</span>
                    </span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    @foreach ($countries as $country)
                        <li onclick="changeCountry('{{ $country->id }}')">
                            <a class="dropdown-item" href="#">
                                <img class="dropdown-item-icon" src="{{ env('APP_URL') . 'content/' . $country->img }}"
                                    alt="">
                                <span class="dropdown-item-text">{{ $country->name }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <!-- =============End Drop Down Country========= -->

            <!-- =====>>>> Start User <<<<===== -->
            @if (auth('client')->check())
                <div class="link btn-group ml-3">
                    <div class="user-iamge">
                        @if (!auth('client')->user()->image)
                            <img src="{{ asset('front/pages/imgs/user-image.png') }}" alt="">
                        @else
                            <img src="{{ env('APP_URL') . 'human/' . auth('client')->user()->image }}" width="40px"
                                style="border-radius: 50%;" height="40px" alt="">
                        @endif
                    </div>
                    <button class="btn text-black-50  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth('client')->user()->fname . ' ' . auth('client')->user()->lname }}
                    </button>
                    <ul class="dropdown-menu mt-2 text-start">
                        <li>
                            <i class="fa-solid fa-user"></i>
                            <a href="{{ route('users.account') }}">{{ __('My account') }}</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="{{ route('logout') }}">{{ __('Sign Out') }}</a>
                        </li>
                    </ul>
                </div>
            @else
                <a class="btn rounded-pill main-btn" href="{{ route('users.register') }}"
                    onclick="">{{ __('Create account') }}</a>

                @if ($new_website_settings->lang_is_shown)
                    <div class="country btn-group m-3">
                        <button class="btn text-black-50  btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('front/client/imgs/united-states.png') }}" alt="">
                            {{ __('English') }}
                        </button>
                        <ul class="dropdown-menu mt-2 text-start">
                            <li>
                                <img src="{{ asset('front/client/imgs/saudi-arabia.png') }}" alt="">
                                <a class="text-black-50" href="#">{{ __('Arabic') }}</a>
                            </li>
                        </ul>
                    </div>
                @endif
            @endif
            <!-- =====>>>> End User <<<<====== -->

        </div>
    </div>
    <!-- End Container -->
</nav>

@push('scripts')
    <script>
        function changeCountry(country_id = 1) {
            fetch(`/update-selected-country/${country_id}`)
                .then(response => response.json())
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    // Handle the error, e.g., display an error message
                });
        }
    </script>
@endpush
