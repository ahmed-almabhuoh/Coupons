<div class="row">
    <div class="filter-buttons">
        <ul id="filter-btns">
            <li class="{{ $selected_category == 'all' ? 'active' : '' }}"
                wire:click="getCouponsFromCategory('all')">{{ __('All') }}</li>
            @foreach ($categories as $category)
                <li class="{{ $selected_category == $category->id ? 'active' : '' }}"
                    wire:click="getCouponsFromCategory('{{ $category->id }}')">
                    <img class="img-product" src="{{ env('APP_URL') . 'content/' . $category->image }}"
                        alt="">
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="row">
    <!-- =============Start portfolio=========== -->
    <div class="portfolio-gallery" id="portfolio-gallery">

        @foreach ($coupons as $coupon)
            <div class="item" data-id="Fashion">
                <div class="card inner">
                    <!-- icon -->
                    <div class="icon">
                        <img src="{{ asset('front/client/imgs/share-icon-card.png') }}" alt="icon"
                            onclick="shareByEmail('{{ $coupon->store->name }}', '{{ $coupon->code }}', '{{ $coupon->discount }}')">
                        <img src="{{ asset('front/client/imgs/icon-card-multi.png') }}" alt="icon"
                            onclick="copyCodeToClipboard('{{ $coupon->code }}', {{ $coupon }})">
                    </div>
                    <!-- img -->

                    <div class="img edite">
                        @if (!is_null($coupon->store))
                            <img src="{{ env('APP_URL') . 'content/' . $coupon->store->icon }}"
                                alt="portfolio">
                        @else
                            <img src="{{ env('APP_URL') . 'content/coupons/default.png' }}"
                                alt="portfolio">
                        @endif
                    </div>
                    <!-- text -->
                    <div class="text">
                        {{-- <span>Floward</span> --}}
                        @if (!is_null($coupon->store))
                            <span>{{ $coupon->store->name }}</span>
                        @else
                            <span>{{ __('No Store') }}</span>
                        @endif
                        <p><span>{{ __('Offers') }}:</span> {{ '%' . $coupon->discount }}</p>
                    </div>
                    <!-- button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        onclick="getCoupon('{{ $coupon->id }}')">
                        <div class="left">
                            {{ __('Coupon details') }}
                        </div>
                        <div class="right">
                            {{ '%' . $coupon->discount }}
                        </div>
                    </button>
                </div>
            </div>
        @endforeach


        <!-- Start Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title m-auto text-black-50 " id="exampleModalLabel">
                            {{ __('Coupon details') }}</h2>
                    </div>


                    <div class="modal-body ">
                        <div class="first-sec d-flex justify-content-between">
                            <!--Section #1 -->
                            <div class="content d-flex align-items-center justify-content-center">
                                <!-- <img class="icon-model website-logo" src="imgs/flaword-icon-card.png" alt=""> -->
                                <!-- img -->
                                <div class="img edite">
                                    <img src="" url="{{ env('APP_URL') . 'content/' }}"
                                        alt="portfolio" id="coupon_store_image">
                                </div>
                                <div class="text-des ml-3">
                                    <strong id="coupon_store_name">Floward</strong>
                                    <p id="coupon_description">A store that specializes in rose bouquets</p>
                                </div>
                            </div>
                        </div>

                        <!--Section #2 -->
                        <div class="midel-sec d-flex">
                            <div class="first-dev">
                                <span>{{ __('Discount') }}: <strong id="coupon_discount"></strong></span>
                            </div>
                            {{-- <div class="first-dev">
                                <span>{{ __('Last use') }}: <strong id="coupon_last_use">a day
                                        ago</strong></span>
                            </div> --}}
                            <div class="first-dev">
                                <span>{{ __('Category') }}: <strong
                                        id="coupon_category_name"></strong></span>
                            </div>
                        </div>
                    </div>

                    <div class="icon-container">

                        {{-- <div class="icon-box" id="shopping_coupon_action">
                            <img src="{{ asset('front/client/imgs/cart.png') }}" alt=""
                                data-src="">
                            <div>
                                <p> {{ __('shopping') }} </p>
                            </div>
                        </div> --}}

                        <div class="icon-box bg-black" id="shopping_coupon_action">
                            <img src="{{ asset('front/client/imgs/shopping-bag-icon.png') }}"
                                alt="" data-src="">
                            <div>
                                <p>{{ __('shopping') }}</p>
                            </div>
                        </div>

                        <div class="icon-box">
                            <img src="{{ asset('front/client/imgs/Heart, Favorite.png') }}" alt=""
                                id="favorite_icon"
                                data-src="{{ asset('front/client/imgs/heart-selceted.png') }}">
                            <div>
                                <p> {{ __('favourite') }}</p>
                            </div>
                        </div>

                        <div class="icon-box">
                            <img src="{{ asset('front/client/imgs/thumbs-up-like-square.png') }}"
                                alt="" id="coupon_activation"
                                data-src="{{ asset('front/client/imgs/lik-selceted.png') }}">
                            <div>
                                <p> {{ __('active') }} </p>
                            </div>
                        </div>


                        <div class="icon-box">
                            <img src="{{ asset('front/client/imgs/dislike.png') }}"
                                id="coupon_inactivation" alt=""
                                data-src="{{ asset('front/client/imgs/dis-selceted.png') }}">
                            <div>
                                <p>{{ __('inactive') }}</p>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer d-flex">
                        <span><img id="modal_share_element"
                                src="{{ asset('front/client/imgs/share-icon-copuon.png') }}"
                                alt=""> {{ __('Share') }}
                        </span>
                        <a id="copyButton" type="button" class="copy-button btn btn-secondary"
                            onclick="copyCode()">
                            {{ __('Copy Code') }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

    </div>
</div>
