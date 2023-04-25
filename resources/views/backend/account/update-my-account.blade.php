@extends('layouts.app')

@section('title', __('Update acccount info'))
@section('page-index', __('Accounts'))
@section('root', __('Update'))
@section('sub-root', __('HR'))


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update account info') . ': ' . $user->full_name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.accounts.update-admin-account :user="$user" />
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
