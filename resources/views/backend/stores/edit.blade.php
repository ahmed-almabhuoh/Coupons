@extends('layouts.app')

@section('title', 'Update ' . $store->name)
@section('page-index', 'Stores')
@section('root', 'Update')
@section('sub-root', 'CM')

@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update ') . $store->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.stores.update :store="$store" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection