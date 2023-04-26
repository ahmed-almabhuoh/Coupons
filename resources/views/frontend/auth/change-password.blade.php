@extends('frontend.layouts.client-pages')

@section('title', __('Change Password'))

@section('styles')

@endsection

@section('content')
    <div class="chang-password">
        <div class="header-text">
            <h3>{{ __('Change Password') }}</h3>
            <p>{{ __('Re-change your password when you feel someone has access to your account') }}</p>
        </div>

        <div class="card-wrapper">

            <input type="file" id="imageUpload">
            <div id="imagePreview"></div>
            <!--Start Card -->
            <div class="card-body">
                <!-- here Error on eye -->


                <livewire:front.auth.change-password />


            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
