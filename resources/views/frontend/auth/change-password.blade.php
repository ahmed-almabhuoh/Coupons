@extends('frontend.layouts.client-pages')

@section('title', 'Change Password')

@section('styles')

@endsection

@section('content')
<div class="header-text">
    <h3>Change Password</h3>
    <p>Re-change your password when you feel someone has access to your account</p>
</div>
<div class="card-wrapper change-pas">

    <input type="file" id="imageUpload">
    <div id="imagePreview"></div>
    <!--Start Card -->
    <div class="card-body">
        <!-- here Error on eye -->


        <livewire:front.auth.change-password />


    </div>
</div>
@endsection

@section('scripts')

@endsection
