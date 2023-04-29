@extends('layouts.app')

@section('title', __('Change my password'))
@section('page-index', __('Accounts'))
@section('root', __('Update'))
@section('sub-root', __('CM'))


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Change my password') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.accounts.change-password :user="$user" />
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
