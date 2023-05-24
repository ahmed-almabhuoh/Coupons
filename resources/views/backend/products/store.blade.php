@extends('layouts.app')

@section('title', __('Create a new product'))
@section('page-index', __('Products'))
@section('root', __('Create'))
@section('sub-root', __('CM'))


@section('styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
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
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create a new product') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.products.create :categories="$categories" :stores="$stores" :coupons="$coupons"
                            :countries="$countries" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

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

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('product-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
