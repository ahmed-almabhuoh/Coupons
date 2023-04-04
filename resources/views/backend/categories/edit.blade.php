@extends('layouts.app')

@section('title', 'Update ' . $category->full_name)
@section('page-index', 'Categories')
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
                        <h4 class="card-title">{{ __('Update ') . $category->full_name }}</h4>
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
