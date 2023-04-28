@extends('layouts.app')

@section('title', __('Create a new FQs'))
@section('page-index', __('FQs'))
@section('root', __('Create'))
@section('sub-root', __('CM'))


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create a new FQs') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.aqs.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('category-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
