@extends('layouts.app')

@section('title', __('Update') . ' ' . $aq->title)
@section('page-index', __('FQs'))
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
                        <h4 class="card-title">{{ __('Update') . ' ' . $aq->title }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.aqs.update :aq="$aq" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
