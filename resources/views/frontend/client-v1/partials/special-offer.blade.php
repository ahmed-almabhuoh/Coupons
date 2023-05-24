<div class="container swiper">
    <h2 class="new-sec-title">{{ __('Strong Offers') }}</h2>
    <div class="slide-container">

        <div class="card-wrapper swiper-wrapper">

            @foreach ($products as $product)
                <div class="card swiper-slide">
                    <div class="image-box">
                        @if ($product->image)
                            <img src="{{ env('APP_URL') . 'content/' . $product->image }}" class="card-img-top"
                                alt="...">
                        @else
                            <img src="{{ env('APP_URL') . 'content/products/default.jpg' }}}"
                                class="card-img-top" alt="...">
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
            @endforeach

        </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
