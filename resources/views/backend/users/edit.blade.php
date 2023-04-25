@extends('layouts.app')

@section('title', __('Update') . ' ' . $user->full_name)
@section('page-index', __('Users'))
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
                        <h4 class="card-title">{{ __('Update') . ' ' . $user->full_name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.users.update :user="$user" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
