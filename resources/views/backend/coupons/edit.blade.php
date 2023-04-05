@extends('layouts.app')

@section('title', 'Update ' . $coupon->code)
@section('page-index', 'Coupons')
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
                        <h4 class="card-title">{{ __('Update ') . $coupon->code }}</h4>
                    </div>
                    <div class="card-body">
                        <livewire:backend.coupons.update :coupon="$coupon" :categories="$categories" :stores="$stores" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
