<div>
    <div class="container">
        <!-- Start Section title -->
        {{-- <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-3  ">
            <h2 class="position-absolute ">{{ __('Offers') }}</h2>
        </div> --}}
        <!-- End Section title -->

        @include('frontend/client-v1/partials/mobile-swiper')

        <div class="filter-buttons">
            <ul id="filter-btns">
                <li class="{{ $selected_category == 'all' ? 'active' : '' }}" wire:click="getProductFromCategory('all')">
                    {{ __('All') }}</li>
                @foreach ($categories as $category)
                    <li class="{{ $selected_category == $category->id ? 'active' : '' }}"
                        wire:click="getProductFromCategory('{{ $category->id }}')">
                        <img class="img-product" src="{{ env('APP_URL') . 'content/' . $category->image }}" alt="">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>


        <div class="row">
            <!-- =============Start main section=========== -->
            <div class="main-section">
                <div class="cards" id="portfolio-gallery">

                    @foreach ($products as $product)
                        <div class="item" data-id="Fashion">
                            <div class="p-i-w" data-label="Loose-fitting oxford shirt with front buttons"
                                data-co="" data-disc="40" data-pr="120.00" data-r="9999"
                                data-st="61a5b82332665843d5f6e510">
                                <div class="p-i">

                                    <div class="p-s1">
                                        <div class="p-bdg disc">
                                            @if ($product->offer != 0)
                                                <div>{{ $product->offer }}% {{ __('discount') }} </div>
                                            @else
                                                <div>{{ $product->price }} {{ __('RS') }} </div>
                                            @endif
                                        </div>
                                        <div class="p-img lz">
                                            @php
                                                $img = DB::table('product_images')
                                                    ->where('product_id', $product->id)
                                                    ->exists()
                                                    ? DB::table('product_images')
                                                        ->where('product_id', $product->id)
                                                        ->first()->image
                                                    : 'products/default.jpg';
                                            @endphp
                                            <img src="{{ env('APP_URL') . 'content/' . $img }}" alt="product"
                                                loading="lazy" height="100">
                                        </div>
                                    </div>

                                    <div class="p-s2">
                                        <div class="p-t">{{ $product->name }}</div>

                                        <div class="p-pr-w">
                                            <div class="p-pr1">
                                                <div class="p-cur">R.H.</div> {{ $product->price }}
                                            </div>
                                            <div class="p-pr2">
                                                <div class="p-cur">R.H.</div> {{ $product->original_price }}
                                            </div>
                                        </div>


                                        <div class="p-b-w">
                                            <div class="p-b-s1">
                                                <img class="p-b-logo lz"
                                                    src="https://cdn.almowafir.com/files/w200_ae.jpg"
                                                    data-src="https://cdn.almowafir.com/files/w200_ae.jpg"
                                                    data-srcset="https://cdn.almowafir.com/files/w100_ae.jpg 100w, https://cdn.almowafir.com/files/w200_ae.jpg 200w"
                                                    data-sizes="92px" alt="61a5b82332665843d5f6e510" width="200"
                                                    height="100" loading="lazy"
                                                    srcset="https://cdn.almowafir.com/files/w100_ae.jpg 100w, https://cdn.almowafir.com/files/w200_ae.jpg 200w">
                                            </div>
                                            <div class="p-b-s2">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                </a>
                                <div class="share-btns">
                                    <img loading="lazy" class="share-btn" alt="Share Product"
                                        onclick="shareProductOnWhatsApp({{ $product }})"
                                        src="https://cdn.almowafir.com/1/alw_ic_share.png" width="70"
                                        height="70">
                                    <img class="share-btn-x none lz"
                                        src="https://cdn.almowafir.com/1/alw_ic_closepopup.png"
                                        data-src="https://cdn.almowafir.com/1/alw_ic_closepopup.png"
                                        alt="Close Share Popup" width="70" height="70" loading="lazy">
                                </div>

                            </div>
                        </div>
                    @endforeach


                    <div class="product-paginator">
                        {{ $products->links() }}
                    </div>


                </div>
            </div>
            <!-- =============End main section=========== -->
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function shareProductOnWhatsApp(product) {
            // Get the product details
            const productName = product.name;
            const productURL = product.action;

            // Create the WhatsApp share message in Arabic
            const message = `تحقق من هذا المنتج: ${productName}\n${productURL}`;

            // Encode the message for the WhatsApp URL
            const encodedMessage = encodeURIComponent(message);

            // Construct the WhatsApp share URL
            const whatsappURL = `https://api.whatsapp.com/send?text=${encodedMessage}`;

            // Open the WhatsApp share URL in a new tab
            window.open(whatsappURL, '_blank');
        }

        // Get the WhatsApp share button element
        const whatsappShareBtn = document.getElementById('whatsapp_share');

        // Add a click event listener to the WhatsApp share button
        whatsappShareBtn.addEventListener('click', () => {
            // Define the product details
            const product = {
                name: 'اسم المنتج',
                url: 'https://example.com/product'
            };

            // Call the function to share the product on WhatsApp
            shareProductOnWhatsApp(product);
        });
    </script>
@endpush
