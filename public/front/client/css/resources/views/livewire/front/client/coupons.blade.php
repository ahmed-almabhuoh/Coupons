<div class="row">
    <section class="portfolio" id="Portfolio">
        <div class="container">
            <div class="row">
                <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
                    <h2 class="position-absolute "> {{ __('Various discount codes') }} </h2>
                </div>
            </div>
            <div class="row">

                <div class="dropdown">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('All Stores') }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($stores as $store)
                            <li><a class="dropdown-item text-black-50"
                                    wire:click="getCouponsDependOnStore('{{ $store->id }}')"
                                    href="#">{{ $store->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <li class="{{ $selected_category == 'all' ? 'active' : '' }}"
                            wire:click="getCouponsDependOnCategory('all')" data-target="all"> {{ __('All') }} </li>
                        @foreach ($categories as $category)
                            <li data-target="Fashion" class="{{ $selected_category == $category->id ? 'active' : '' }}"
                                wire:click="getCouponsDependOnCategory('{{ $category->id }}')">
                                {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>


            </div>
            <div class="row">
                <!-- =============Start portfolio=========== -->
                <div class="portfolio-gallery" id="portfolio-gallery">

                    @if (!count($coupons))
                        <h3> {{ __('No coupons found yet!') }} </h3>
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
                                    <img src="{{ env('APP_URL') . 'content/' . $coupon->store->icon }}"
                                        alt="portfolio">
                                </div>
                                <!-- text -->
                                <div class="text">
                                    <span>{{ $coupon->store->name }}</span>
                                </div>
                                <!-- button -->
                                <button class="btn btn-primary" onclick="getCoupon('{{ $coupon->id }}')"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                            <a href="#" id="store_action">Visit &rarr;</a>
                                        </div>
                                    </div>
                                    <!--Section #2 -->
                                    <div class="midel-sec d-flex">
                                        <div class="first-dev">
                                            <span>Discount: <strong id="coupon_discount"></strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>Last use: <strong>a day ago</strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>Category: <strong id="coupon_category_name"></strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="icon-container">
                                    <div class="icon-box">
                                        <img src="imgs/cart.png" alt="" data-src="">
                                        <div>
                                            <p>shopping</p>
                                        </div>
                                    </div>

                                    <div class="icon-box">
                                        <img src="imgs/Heart, Favorite.png" alt=""
                                            data-src="./imgs/heart-selceted.png">
                                        <div>
                                            <p>favourite</p>
                                        </div>
                                    </div>
                                    <div class="icon-box">
                                        <img src="imgs/thumbs-up-like-square.png" alt=""
                                            data-src="./imgs/lik-selceted.png">
                                        <div>
                                            <p>active</p>
                                        </div>
                                    </div>
                                    <div class="icon-box">
                                        <img src="imgs/dislike.png" alt="" data-src="./imgs/dis-selceted.png">
                                        <div>
                                            <p>inactive</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer d-flex">
                                    <span><img src="imgs/share-icon-copuon.png" alt=""> Share
                                    </span>
                                    <a type="button" class="copy-button btn btn-secondary">
                                        {{__('Copy Code')}} <img src="imgs/copy-icon.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- =============Start portfolio=========== -->
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

                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endpush
