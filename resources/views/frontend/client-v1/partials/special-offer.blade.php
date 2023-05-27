<div class="container swiper">
    <h2 class="new-sec-title">{{ __('Strong Offers') }}</h2>
    <div class="slide-container">

        <div class="card-wrapper swiper-wrapper">

            @foreach ($products as $product)
                <div class="swiper-slide super-offer-product" onclick="navToSuperOffer('{{ $product->action }}')">
                    <div class="card-offers">
                        <div class="image-box">
                            @if ($product->image)
                                <img src="{{ env('APP_URL') . 'content/' . $product->image }}" class="card-img-top"
                                    alt="...">
                            @else
                                <img src="{{ env('APP_URL') . 'content/products/default.jpg' }}}" class="card-img-top"
                                    alt="...">
                            @endif
                        </div>

                        <div class="profile-details">
                            <img src="{{ env('APP_URL') . 'content/' . $product->store->icon }}" alt="" />
                            <div class="name-job">
                                <h3 class="name">{{ $product->store->name }}</h3>
                                <h4 class="job">{{ $product->store->description }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>


@push('scripts')
    <script>
        // var superOfferElements = document.querySelector('#super-offer-product');
        // superOffer.style.cursor = 'pointer';
        var superOfferElements = document.querySelectorAll('.super-offer-product');

        superOfferElements.forEach(function(element) {
            element.style.cursor = 'pointer';
        });

        // function navToSuperOffer(url) {
        //     window.location.href = url;
        // }

        function navToSuperOffer(url) {
            window.open(url, '_blank');
        }
    </script>
@endpush
