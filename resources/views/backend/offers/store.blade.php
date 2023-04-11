@extends('layouts.app')

@section('title', 'Create a offer')
@section('page-index', 'Offers')
@section('root', 'Create')
@section('sub-root', 'CM')


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create a new offer') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.offers.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('offer-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
