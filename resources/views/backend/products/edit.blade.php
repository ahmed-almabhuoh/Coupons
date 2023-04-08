@extends('layouts.app')

@section('title', 'Update ' . $product->code)
@section('page-index', 'Products')
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
                        <h4 class="card-title">{{ __('Update ') . $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.products.update :product="$product" :categories="$categories" :stores="$stores" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
