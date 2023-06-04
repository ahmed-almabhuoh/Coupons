@extends('frontend.client-v1.layouts.client')

@section('title', __('Home'))

@section('styles')

@endsection

@section('content')
    <!-- ================Start Hero Section=========== -->
    @include('frontend/client-v1/partials/slider', [
        'offers' => $offers,
    ])
    <!-- =============== End Hero Section ============ -->

    <!-- ============== Start Main Section ========== -->
    <div class=" pt-2 pb-5">
        <div class="container">

            <!--===== Start special-offers ====-->
            @include('frontend/client-v1/partials/special-offer', [
                'products' => $products,
            ])
            <!--===== End special-offers ====-->

            
            <livewire:front.client.home :coupons="$coupons" :stores="$stores" :categories="$categories" />
        </div>
        </section>
    </div>
@endsection

@section('scripts')

@endsection
