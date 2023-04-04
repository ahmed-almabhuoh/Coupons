@extends('layouts.app')

@section('title', 'Create a user')
@section('page-index', 'Users')
@section('root', 'Create')
@section('sub-root', 'HR')


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create an user') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.users.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('user-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
