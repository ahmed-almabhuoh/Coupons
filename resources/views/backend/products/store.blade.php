@extends('layouts.app')

@section('title', 'Create a product')
@section('page-index', 'Products')
@section('root', 'Create')
@section('sub-root', 'CM')


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create a product') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.products.create :categories="$categories" :stores="$stores" :coupons="$coupons" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('product-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
