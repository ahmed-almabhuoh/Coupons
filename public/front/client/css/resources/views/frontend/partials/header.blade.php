<ul class="navbar-nav m-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.home') active @endif" aria-current="page"
            href="{{ route('pages.home') }}">{{ __('Home') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-2 p-lg-3  @if (Route::currentRouteName() == 'pages.coupons') active @endif"
            href="{{ route('pages.coupons') }}">{{ __('Coupons') }}</a>
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
        <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.offers') active @endif "
            href="{{ route('pages.offers') }}">{{ __('Offers') }}</a>
    </li>
    @if (auth('client')->check())
        <li class="nav-item">
            <a class="nav-link p-2 p-lg-3 @if (Route::currentRouteName() == 'pages.blogs') active @endif"
                href="{{ route('pages.blogs') }}">{{ __('Blogs') }}</a>
        </li>
    @endif
</ul>


@if (auth('client')->check())
    <div class="link btn-group ml-3">
        <div class="user-iamge">
            @if (!auth('client')->user()->image)
                <img src="{{ asset('front/pages/imgs/user-image.png') }}" alt="">
            @else
                <img src="{{ env('APP_URL') . 'human/' . auth('client')->user()->image }}" width="40px"
                    height="40px" alt="">
            @endif
        </div>
        <button class="btn text-black-50 btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ auth('client')->user()->fname . ' ' . auth('client')->user()->lname }}
        </button>
        <ul class="dropdown-menu mt-2 text-start">
            <li>
                <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                    </path>
                </svg><!-- <i class="fa-solid fa-user"></i> Font Awesome fontawesome.com -->
                <a href="{{ route('users.account') }}">My account</a>
            </li>
            <li>
                <svg class="svg-inline--fa fa-arrow-right-from-bracket" aria-hidden="true" focusable="false"
                    data-prefix="fas" data-icon="arrow-right-from-bracket" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z">
                    </path>
                </svg>
                <!-- <i class="fa-solid fa-arrow-right-from-bracket"></i> Font Awesome fontawesome.com -->
                <a href="{{ route('logout') }}">Sign Out</a>
            </li>
        </ul>
    </div>
@else
    <a class="btn rounded-pill main-btn" href="{{ route('users.register') }}" onclick="">Create
        account</a>
    <div class="country btn-group m-3">
        <button class="btn text-black-50  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('front/client/imgs/united-states.png') }}" alt="">
            English
        </button>
        <ul class="dropdown-menu mt-2 text-start">
            <li>
                <img src="{{ asset('front/client/imgs/saudi-arabia.png') }}" alt="">
                <a class="text-black-50" href="#">Saudi Arabia</a>
            </li>
        </ul>
    </div>
@endif
