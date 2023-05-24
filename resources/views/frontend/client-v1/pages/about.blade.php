@extends('frontend.client-v1.layouts.client')

@section('title', __('About'))

@section('styles')

@endsection

@section('content')
    <div class="main-section about pt-5 pb-3 mt-5">
        <div class="container">
            <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center  mb-5 position-relative ">
                <h2 class="position-absolute ">{{ __('About Us') }}</h2>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- text -->
                    <div class="col-md-6">
                        <div class="text">
                            <div class="about-text-header">
                                <h4> {{ __('About our platform') }}</h4>
                            </div>
                            <div class="about-text-body">
                                <p>
                                    {{ __('A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what this site offers specifically A mini-paragraph talking about what This site presents a mini-paragraph that talks about what exactly this site offers. A mini-paragraph that specifically talks about what this site offers.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- img -->
                    <div class="about-img col-md-6">
                        <img src="{{ asset('front/client/imgs/about-avatar.png') }}" alt="">
                    </div>

                </div>

            </div>


        </div>
    </div>
@endsection

@section('scripts')

@endsection
