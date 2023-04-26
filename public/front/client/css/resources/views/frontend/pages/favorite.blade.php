@extends('frontend.layouts.client-pages')

@section('title', 'Favorite')

@section('styles')
    <style>
        .red-text {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="card-tabel">
        <div class="header-text">
            <h3>{{ __('Coupons') }}</h3>
            <p>{{__('Coupons that you have obtained through us or that you have posted we\'ve got')}}</p>
        </div>
        <!-- Start Tabel -->
        <div class="container">
            <livewire:front.auth.favorite />
        </div>
        <!-- End Tabel -->
    </div>

@endsection

@section('scripts')

@endsection
