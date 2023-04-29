@extends('layouts.app')

@section('title', __('Update') . $product->code)
@section('page-index', __('Products'))
@section('root', __('Update'))
@section('sub-root', __('CM'))

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/extensions/swiper.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/css/plugins/extensions/ext-component-swiper.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')


    @if (count($images))
        <section id="component-swiper-cube-effect">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Product Images') }}</h4>
                </div>
                <div class="card-body">
                    <div class="swiper-cube-effect swiper-container swiper-container-cube swiper-container-3d swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
                        style="cursor: grab;">
                        <div class="swiper-wrapper" id="swiper-wrapper-1063b3d3d4d8a2a3d" aria-live="polite"
                            style="transform-origin: 50% 50% -150px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); transition-duration: 0ms;">

                            @foreach ($images as $image)
                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4"
                                    style="width: 300px; transform: rotateX(0deg) rotateY(0deg) translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                    <img class="img-fluid" src="{{ env('APP_URL') . 'content/' . $image->image }}"
                                        alt="banner">
                                    <div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;">
                                    </div>
                                    <div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;">
                                    </div>
                                </div>
                            @endforeach

                            <div class="swiper-cube-shadow"
                                style="height: 300px; transform: translate3d(0px, 170px, -150px) rotateX(90deg) rotateZ(0deg) scale(0.94);">
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-white swiper-pagination-bullets"><span
                                class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span
                                class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span
                                class="swiper-pagination-bullet"></span>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update') . ' ' . $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.products.update :product="$product" :categories="$categories" :stores="$stores"
                            :coupons="$coupons" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('panel/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('panel/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('panel/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('panel/app-assets/js/scripts/extensions/ext-component-swiper.js') }}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('panel/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('panel/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('panel/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('panel/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('panel/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('panel/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('panel/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('panel/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <!-- END: Page JS-->
@endsection
