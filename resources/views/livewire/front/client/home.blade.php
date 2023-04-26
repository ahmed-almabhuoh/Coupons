<div class="row">
    <section class="portfolio" id="Portfolio">
        <div class="container">
            <div class="row">
                <div
                    class="main-title fw-bold fs-2 d-flex justify-content-center text-center mt-5 mb-5 position-relative ">
                    <h2 class="position-absolute "> {{ __('Various discount codes') }} </h2>
                </div>
            </div>

            <div class="row" id="coupons-section">
                <div class="dropdown">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('All Stores') }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($stores as $store)
                            <li><a class="dropdown-item text-black-50"
                                    wire:click="getCouponsFromStore('{{ $store->id }}')"
                                    href="#coupons-section">{{ $store->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <li data-target="all" class="{{ $selected_category == 'all' ? 'active' : '' }}"
                            wire:click="getCouponsFromCategory('all')">All</li>
                        @foreach ($categories as $category)
                            <li data-target="Fashion" class="{{ $selected_category == $category->id ? 'active' : '' }}"
                                wire:click="getCouponsFromCategory('{{ $category->id }}')">
                                {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="row">
                <!-- ============= Start portfolio =========== -->
                <div class="portfolio-gallery" id="portfolio-gallery">

                    @if (!count($coupons))
                        <h1>{{ __('No coupons found yet!') }}</h1>
                    @endif

                    @foreach ($coupons as $coupon)
                        <div class="item" data-id="Fashion">
                            <div class="card inner">
                                <!-- icon -->
                                <div class="icon">
                                    <img src="{{ asset('front/client/imgs/share-icon-card.png') }}" alt="icon">
                                    <img src="{{ asset('front/client/imgs/icon-card-multi.png') }}" alt="icon">
                                </div>
                                <!-- img -->
                                <div class="img">
                                    @if (!is_null($coupon->store))
                                        <img src="{{ env('APP_URL') . 'content/' . $coupon->store->icon }}"
                                            alt="portfolio" style="width: 50px; height: 50px;">
                                    @else
                                        <img src="{{ env('APP_URL') . 'content/coupons/default.png' }}" alt="portfolio"
                                            style="width: 50px; height: 50px;">
                                    @endif

                                </div>
                                <!-- text -->
                                <div class="text">
                                    @if (!is_null($coupon->store))
                                        <span>{{ $coupon->store->name }}</span>
                                    @else
                                        <span>{{ __('No Store') }}</span>
                                    @endif
                                </div>
                                <!-- button -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="getCoupon('{{ $coupon->id }}')">
                                    <div class="left">
                                        {{ __('Coupon details') }}
                                    </div>
                                    <div class="right">
                                        {{ $coupon->discount }}%
                                    </div>
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title m-auto text-black-50 " id="exampleModalLabel">
                                        {{ __('Coupon details') }}
                                    </h2>
                                </div>


                                <div class="modal-body ">
                                    <div class="first-sec d-flex justify-content-between">
                                        <!--Section #1 -->
                                        <div class="content d-flex align-items-center justify-content-center">
                                            <img class="icon-model" src="" style="width: 50px; height: 50px;"
                                                id="coupon_store_image" url="{{ env('APP_URL') . 'content/' }}"
                                                alt="">
                                            <div class="text-des ml-3">
                                                <strong id="coupon_store_name">Floward</strong>
                                                <p id="coupon_description">A store that specializes in rose bouquets</p>
                                            </div>
                                        </div>
                                        <div class="button">
                                            <a href="#" id="store_action">{{ __('Visit') }} &rarr;</a>
                                        </div>
                                    </div>
                                    <!--Section #2 -->
                                    <div class="midel-sec d-flex">
                                        <div class="first-dev">
                                            <span>{{ __('Discount') }}: <strong id="coupon_discount"></strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Last use') }}: <strong>a day ago</strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Category') }}: <strong
                                                    id="coupon_category_name"></strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="icon-container">
                                    <div class="icon-box">
                                        <img src="{{ asset('front/client/imgs/cart.png') }}" alt=""
                                            data-src="">
                                        <div>
                                            <p> {{ __('shopping') }} </p>
                                        </div>
                                    </div>

                                    <div class="icon-box">
                                        {{-- @if (auth('client')->check())
                                            <img src="{{ asset('front/client/imgs/heart-selceted.png') }}"
                                                id="favorite_icon" alt=""
                                                data-src="{{ asset('front/client/imgs/Heart, Favorite.png') }}">
                                        @else --}}
                                        <img src="{{ asset('front/client/imgs/Heart, Favorite.png') }}" alt=""
                                            id="favorite_icon"
                                            data-src="{{ asset('front/client/imgs/heart-selceted.png') }}">
                                        {{-- @endif --}}
                                        <div>
                                            <p> {{ __('favourite') }} </p>
                                        </div>
                                    </div>
                                    <div class="icon-box">
                                        <img src="{{ asset('front/client/imgs/thumbs-up-like-square.png') }}"
                                            alt=""
                                            data-src="{{ asset('front/client/imgs/lik-selceted.png') }}">
                                        <div>
                                            <p> {{ __('active') }} </p>
                                        </div>
                                    </div>
                                    <div class="icon-box">
                                        <img src="{{ asset('front/client/imgs/dislike.png') }}" alt=""
                                            data-src="{{ asset('front/client/imgs/dis-selceted.png') }}">
                                        <div>
                                            <p>{{ __('inactive') }}</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer d-flex">
                                    <span><img src="{{ asset('front/client/imgs/share-icon-copuon.png') }}"
                                            alt=""> {{ __('Share') }}
                                    </span>
                                    <a type="button" class="copy-button btn btn-secondary">
                                        {{ __('Copy Code') }}
                                        <img src="{{ asset('front/client/imgs/copy-icon.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============= End portfolio =========== -->
            </div>

        </div>
</div>


@push('scripts')
    <script>
        async function getCoupon(coupon_id) {
            axios.get('/get-coupon/' + coupon_id)
                .then(function(response) {
                    document.getElementById('coupon_store_name').textContent = response.data.coupon.store.name;
                    document.getElementById('coupon_category_name').textContent = response.data.coupon.category
                        .name;
                    document.getElementById('coupon_description').textContent = response.data.coupon.description;
                    document.getElementById('coupon_discount').textContent = response.data.coupon.discount + '%';
                    var store_image = document.getElementById('coupon_store_image');
                    var src = store_image.getAttribute("url");
                    store_image.setAttribute("src", src + response.data.coupon.store.icon);
                    var favorite_icon = document.getElementById('favorite_icon');
                    favorite_icon.setAttribute('onclick',
                        'addToFavorite(' + response.data.coupon.id + ', "coupon")');
                    document.getElementById('store_action').setAttribute('href', response.data.coupon.store.action);

                    axios.get('/check-user-coupon/' + coupon_id)
                        .then(function(response) {
                            console.log(response.data.has_coupon);
                            if (response.data.has_coupon) {
                                favorite_icon.setAttribute("src",
                                    "{{ asset('/front/client/imgs/heart-selceted.png') }}");
                                favorite_icon.setAttribute("data-src",
                                    "{{ asset('/front/client/imgs/Heart, Favorite.png') }}");
                            } else {
                                favorite_icon.setAttribute("src",
                                    "{{ asset('/front/client/imgs/Heart, Favorite.png') }}");
                                favorite_icon.setAttribute("data-src",
                                    "{{ asset('/front/client/imgs/heart-selceted.png') }}");
                            }
                        })

                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function addToFavorite(id, position) {
            axios.get('/add-to-favorite/' + id + '/' + position)
                .then(function(response) {})
                .catch(function(error) {
                    window.location.href = '/login';
                });
        }
    </script>
@endpush
