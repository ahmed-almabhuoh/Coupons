@extends('layouts.app')

@section('title', __('Update') . ' ' . $country->name)
@section('page-index', __('Countries'))
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
                        <h4 class="card-title">{{ __('Update') . ' ' . $country->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.countries.update :country="$country" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
