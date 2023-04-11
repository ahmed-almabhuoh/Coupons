@extends('layouts.app')

@section('title', 'Create a blog')
@section('page-index', 'Blogs')
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
                        <h4 class="card-title">{{ __('Create a new blog') }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.blogs.create />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('blog-created', function(data) {
                // alert(data.message);
                console.log('Here');
            });
        });
    </script>
@endsection
