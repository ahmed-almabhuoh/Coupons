@extends('layouts.app')

@section('title', __('Update') . ' ' . $role->name)
@section('page-index', __('Roles'))
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
                        <h4 class="card-title">{{ __('Update') . ' ' . $role->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.roles.update :role="$role" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
