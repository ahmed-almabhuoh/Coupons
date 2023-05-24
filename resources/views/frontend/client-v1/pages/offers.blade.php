@extends('frontend.client-v1.layouts.client')

@section('title', __('Offers'))

@section('styles')

@endsection

@section('content')

    @include('frontend/client-v1/partials/slider', [
        'offers' => $offers,
    ])

    <livewire:front.client.offers :categories="$categories" :stores="$stores" :products="$products" />

@endsection

@section('scripts')

@endsection
