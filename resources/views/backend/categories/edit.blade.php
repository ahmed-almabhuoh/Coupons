@extends('layouts.app')

@section('title', __('Update') . ' ' . $category->name)
@section('page-index', __('Categories'))
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
                        <h4 class="card-title">{{ __('Update') . ' ' . $category->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.categories.update :category="$category" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
