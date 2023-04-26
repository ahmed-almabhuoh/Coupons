<div class="row">
    <section class="portfolio" id="Portfolio">
        <div class="container">
            <div class="row">
                <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
                    <h2 class="position-absolute "> {{ __('Offers') }} </h2>
                </div>
            </div>
            <div class="row">

                <div class="dropdown">
                    <a class="btn  dropdown-toggle offers" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('All Stores') }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($allStores as $store)
                            <li><a class="dropdown-item text-black-50" href="#"
                                    wire:click="getStores('{{ Crypt::encrypt($store->id) }}')">{{ $store->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <li class="{{ $newSelectedCategory == 'all' ? 'active' : '' }}" wire:click="getCategories"
                            data-target="all"> {{ __('All') }} </li>
                        @foreach ($categories as $category)
                            <li data-target="Fashion"
                                class="{{ $newSelectedCategory == $category->id ? 'active' : '' }}"
                                wire:click="getCategories('{{ Crypt::encrypt($category->id) }}')">
                                {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>


            </div>
            <div class="row mb-lg-3">
                <!-- =============Start portfolio=========== -->
                <div class="portfolio-gallery offers-product" id="portfolio-gallery">
                    @if (!count($products))
                        <h3>{{ __('No products found yet!') }}</h3>
                    @endif
                    @foreach ($products as $product)
                        <div class="item" data-id="Fashion">
                            <div class="card offers-product">
                                @if ($product->image)
                                    <img src="{{ env('APP_URL') . 'content/' . $product->image }}" class="card-img-top"
                                        alt="...">
                                @else
                                    <img src="{{ env('APP_URL') . 'content/' . $product->store->icon }}"
                                        class="card-img-top" alt="...">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->price }} {{ __('Riyals') }} <br>
                                        @if ($product->original_price)
                                            <small class="text-muted">{{ $product->original_price }}
                                                {{ __('Riyals') }}
                                            </small>
                                        @endif

                                    </p>
                                </div>
                                <div class="position-relative">
                                    <div class="bottom-text mb-5 d-flex justify-content-around">
                                        <div class="left-sec"> <img class="card-icon"
                                                src="{{ env('APP_URL') . 'content/' . $product->store->icon }}"
                                                alt="">
                                            <span>{{ $product->store->name }}</span>
                                        </div>
                                        <button class="button btn btn-primary"
                                            onclick="getProduct('{{ $product->id }}')" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <span class="m-auto">{{ __('Git it') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- ============================================= -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title m-auto text-black-50 " id="exampleModalLabel">
                                        {{ __('Product details') }}</h2>
                                </div>


                                <div class="modal-body ">
                                    <div class="first-sec d-flex justify-content-between">
                                        <!--Section #1 -->
                                        <div class="content d-flex align-items-center justify-content-center">
                                            <img class="icon-model"
                                                src="{{ asset('front/client/imgs/flaword-icon-card.png') }}"
                                                alt="">
                                            <div class="text-des ml-3">
                                                <strong id="product_store_name"></strong>
                                                <p id="product_description"></p>
                                            </div>
                                        </div>
                                        <div class="button">
                                            <a href="#" id="product_action" target="_blank">Visit &rarr;</a>
                                        </div>
                                    </div>
                                    <!--Section #2 -->
                                    <div class="midel-sec offers-card d-flex flex-wrap">
                                        <div class="first-dev">

                                            <span>{{ __('Discount') }}: <strong
                                                    class="product_discount"></strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Last use') }}: <strong>a day ago</strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Category') }}: <strong
                                                    id="product_category_name"></strong></span>
                                        </div>
                                    </div>
                                    <!--Section #3 -->
                                    <div class="midel-sec offers-card d-flex  flex-wrap ">
                                        <div class="first-dev">

                                            <span>{{ __('Original price') }}: <strong
                                                    id="product_original_price"></strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Discount') }}:<strong
                                                    class="text-black-50 product_discount"></strong></span>
                                        </div>
                                        <div class="first-dev">
                                            <span>{{ __('Final price') }}: <strong id="product_price"></strong></span>
                                        </div>
                                    </div>

                                    <div class="icon-container">
                                        <div class="icon-box">
                                            <img src="{{ asset('front/client/imgs/cart.png') }}" alt=""
                                                data-src="">
                                            <div>
                                                <p>{{ __('shopping') }}</p>
                                            </div>
                                        </div>
                                        <div class="icon-box">
                                            <img src="{{ asset('front/client/imgs/Heart, Favorite.png') }}"
                                                alt=""
                                                data-src="{{ asset('front/client/imgs/heart-selceted.png') }}">
                                            <div>
                                                <p>{{ __('favourite') }}</p>
                                            </div>
                                        </div>
                                        <div class="icon-box">
                                            <img src="{{ asset('front/client/imgs/thumbs-up-like-square.png') }}"
                                                alt=""
                                                data-src="{{ asset('front/client/imgs/lik-selceted.png') }}">
                                            <div>
                                                <p>{{ __('active') }}</p>
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
                                            {{ __('Copy Code') }} <img
                                                src="{{ asset('front/client/imgs/copy-icon.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- =============End portfolio=========== -->


            </div>
        </div>
</div>

@push('scripts')
    <script>
        async function getProduct(product_id) {
            axios.get('/get-product/' + product_id)
                .then(function(response) {
                    document.getElementById('product_store_name').textContent = response.data.product.store.name;
                    document.getElementById('product_category_name').textContent = response.data.product.category
                        .name;
                    document.getElementById('product_description').textContent = response.data.product.description;
                    document.getElementById('product_original_price').textContent = response.data.product
                        .original_price + ' Riyals';
                    document.getElementById('product_price').textContent = response.data.product.price + ' Riyals';
                    const elements = document.getElementsByClassName('product_discount');
                    for (let i = 0; i < elements.length; i++) {
                        elements[i].textContent = response.data.product.offer + '%';
                    }

                    const product_action = document.getElementById('product_action');
                    product_action.setAttribute('href', response.data.product.action);

                    // console.log(product_store_name);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endpush
