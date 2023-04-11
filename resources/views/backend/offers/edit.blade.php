@extends('layouts.app')

@section('title', 'Update ' . $offer->title)
@section('page-index', 'Offers')
@section('root', 'Update')
@section('sub-root', 'CM')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/extensions/swiper.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/css/plugins/extensions/ext-component-swiper.css') }}">
@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update ') . $offer->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.offers.update :offer="$offer" />
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
@endsection
