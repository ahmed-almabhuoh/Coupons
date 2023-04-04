@extends('layouts.app')

@section('title', 'Update ' . $user->full_name)
@section('page-index', 'Users')
@section('root', 'Update')
@section('sub-root', 'HR')

@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update ') . $user->full_name }}</h4>
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
