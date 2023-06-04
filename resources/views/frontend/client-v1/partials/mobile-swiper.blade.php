<!-- Start new button -->
<div class="show-btn pt-2">
    <div class=" new-btn d-flex justify-content-center ">
        <a class="@if ($currentURL == env('APP_URL') . '' || $currentURL == env('APP_URL') . 'livewire/message/front.client.home/') active @endif btn rounded-pill main-btn"
            href="{{ route('pages.home') }}" onclick="">{{ __('Coupons') }}</a>
        <a class="@if ($currentURL == env('APP_URL') . 'offers/' || $currentURL == env('APP_URL') . 'livewire/message/front.client.offers/') active @endif  btn rounded-pill main-btn"
            href="{{ route('pages.offers') }}" onclick=""> {{ __('Offers') }} </a>
    </div>
</div>
<!-- End new button -->
