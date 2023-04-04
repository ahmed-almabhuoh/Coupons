@extends('layouts.app')

@section('title', 'Create a category')
@section('page-index', 'Categories')
@section('root', 'Create')
@section('sub-root', 'HR')


@section('styles')

@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create an category') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.categories.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('category-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
