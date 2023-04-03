@extends('layouts.app')

@section('title', 'Update {{ $admin->full_name }}')
@section('page-index', 'Admins')
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
                        <h4 class="card-title">{{ __('Update ') . $admin->full_name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.admins.update :admin="$admin" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
