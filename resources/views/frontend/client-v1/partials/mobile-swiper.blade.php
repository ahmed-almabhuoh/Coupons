<!-- Start new button -->
<div class="show-btn pt-2">
    <div class=" new-btn d-flex justify-content-center ">
        <a class="  @if (Route::currentRouteName() == 'pages.home') active @endif btn rounded-pill main-btn"
            href="{{ route('pages.home') }}" onclick="">{{ __('Coupons') }}</a>
        <a class=" @if (Route::currentRouteName() == 'pages.offers') active @endif  btn rounded-pill main-btn"
            href="{{ route('pages.offers') }}" onclick=""> {{ __('Offers') }} </a>
    </div>
</div>
<!-- End new button -->
