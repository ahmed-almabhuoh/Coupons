@extends('frontend.client-v1.layouts.client')

@section('title', __('Contact us'))

@section('styles')

@endsection

@section('content')
    <div class="main-section common pt-5 mt-5 pb-5">
        <div class="container">
            @if (session('message'))
                <div class="alert @if (session('code') == 200) alert-success @else alert-danger @endif" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center  mb-5 position-relative ">
                <h2 class="position-absolute "> {{ __('Common Questions') }}</h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-4">
                    <div class="accordion" id="accordionExample">
                        @if (!count($fqs))
                            <h2>{{ __('No questions published yet!') }}</h2>
                        @endif

                        @foreach ($fqs as $index => $fq)
                            <div class="accordion-item">
                                <h2 class="accordion-header"id="heading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                        aria-controls="collapse{{ $index }}">
                                        {{ $fq->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $fq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="form col-md-6 px-4">
                    <div class="row ">
                        <div class="col-md-12">
                            <h3> {{ __('Do you have a question in your mind?!') }} </h3>
                            <p> {{ __('Ask us and we will respond within 24 hours.') }} </p>

                            <form class="common-question" method="POST" action="{{ route('send.contact') }}">
                                @csrf
                                <div class="form-group ">
                                    <!-- <label for="email">Email address</label> -->
                                    <input type="email"
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        id="email" name="email" placeholder="{{ __('Your E-mail') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea
                                        class="form-control @error('message')
                                    is-invalid
                                    @enderror"
                                        id="message" name="message" rows="5" placeholder="{{ __('Your Message Here..') }}"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary col-6">{{ __('Submit') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
