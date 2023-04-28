@extends('frontend.layouts.client-pages')

@section('title', __('Manage Account'))

@section('styles')

@endsection

@section('content')
    <div class="header-text">
        <h3>{{ __('Edit account information') }}</h3>
        <p> {{ __('You can modify the account information once and you will need 60 days before you can edit again') }} </p>
    </div>


    <livewire:front.auth.manage-account />


@endsection

@section('scripts')

@endsection
