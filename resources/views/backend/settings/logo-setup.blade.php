@extends('layouts.app')

@section('title', __('Setup Website Logo'))
@section('page-index', __('Website'))
@section('root', __('Setup'))
@section('sub-root', __('CM'))


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css"
        integrity="sha512-3UMpdtCnKd9XmeFHsBFV7Ux64O/+uV7K8pKdGRzLgoftghLGUuV6U2G6UjxP0TpHbKnK2O/8i/61bnN5ElC+w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <section class="validations" id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Setup the logo') }}</h4>
                    </div>
                    <div class="card-body">

                        <livewire:backend.website-settings.setup-logo />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"
        integrity="sha512-X3q3tFpHtS0S8vjZdL1z2tRJ4R4lX96f4lMpP+DxLnI+WsLKml8GwvMh5uk5ivz+5B60E8Bv96gz+7N13L1bdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#color-picker").spectrum({
                showInput: true,
                preferredFormat: "hex",
                showAlpha: false
            });
        });
    </script>
@endsection
