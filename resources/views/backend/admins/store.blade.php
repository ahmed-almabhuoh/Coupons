@extends('layouts.app')

@section('title', __('Create an admin'))
@section('page-index', __('Admins'))
@section('root', __('Create'))
@section('sub-root', __('HR'))


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create an admin') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.admins.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('admin-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
