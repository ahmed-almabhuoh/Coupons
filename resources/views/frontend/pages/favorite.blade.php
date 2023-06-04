@extends('frontend.layouts.client-pages')

@section('title', __('Favorite'))

@section('styles')
    <style>
        .red-text {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="new-class position-relative">
        <div class="card-tabel">
            <div class="header-text fav">
                <h3>{{ __('Coupons') }}</h3>
                <p>{{ __('Coupons that you have obtained through us or that you have posted we\'ve got') }}</p>
            </div>
            <!-- Start Tabel -->
            <div class="table-responsive">
                <livewire:front.auth.favorite />
            </div>
            <!-- End Tabel -->
        </div>
    </div>
@endsection

@section('scripts')
    @stack('scripts')
@endsection
