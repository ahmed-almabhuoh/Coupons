<div id="CarouselSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#CarouselSlider" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#CarouselSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

    <div class="carousel-inner">
        @foreach ($offers as $key => $offer)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                <img src="{{ env('APP_URL') . 'content/' . $offer->image }}" class="d-block w-100" alt="Carousel One">
            </div>
        @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#CarouselSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{ __('Previous') }}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#CarouselSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{ __('Next') }}</span>
    </button>
</div>
