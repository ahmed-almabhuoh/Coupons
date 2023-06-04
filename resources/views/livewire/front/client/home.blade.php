<div class="row">
    <section class="portfolio" id="Portfolio">
        {{-- <div class="container"> --}}

        {{-- <!-- Start new button -->
        <div class="show-btn">
            <div class=" new-btn d-flex justify-content-center ">
                <a class=" btn rounded-pill main-btn" href="#" onclick="">Copunes</a>
                <a class="active btn rounded-pill main-btn" href="#" onclick="">Offers</a>
            </div>
        </div>
        <!-- End new button --> --}}


        @include('frontend/client-v1/partials/mobile-swiper')

        @include('frontend/client-v1/partials/coupons', [
            'selected_category' => $selected_category,
            'categories' => $categories,
            'coupons' => $coupons,
        ])

        {{-- </div> --}}
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
                    document.getElementById('coupon_discount').textContent = '%' + response.data.coupon.discount;


                    var store_image = document.getElementById('coupon_store_image');
                    var src = store_image.getAttribute("url");
                    store_image.setAttribute("src", src + response.data.coupon.store.icon);

                    // shareByEmail(store_name, code, discount) {
                    var modal_share_element = document.getElementById('modal_share_element').setAttribute("onclick",
                        'shareByEmail("' + response.data.coupon.store.name + '", "' + response.data.coupon
                        .code +
                        '", "' + response.data.coupon.discount + '")');


                    var favorite_icon = document.getElementById('favorite_icon');

                    favorite_icon.setAttribute('onclick',
                        'addToFavorite(' + response.data.coupon.id + ', "coupon")');

                    var shopping_div = document.getElementById('shopping_coupon_action');
                    shopping_div.setAttribute('onclick', 'shoppingCoupon("' + response.data.coupon.url + '")')

                    document.getElementById('coupon_activation').setAttribute('onclick', 'markAsActivation(' +
                        response.data.coupon.id + ')');



                    var c = document.getElementById('coupon_inactivation').setAttribute('onclick',
                        'markAsInActivation(' +
                        response.data.coupon.id + ')');

                    // Get the copy button element by ID
                    const copyButton = document.getElementById('copyButton');
                    // const anotherCopyButton = document.getElementById('another-copying-element');
                    copyButton.setAttribute('value', response.data.coupon.code);
                    // anotherCopyButton.setAttribute('value', response.data.coupon.code);

                    // Add a click event to the copy button
                    copyButton.onclick = function() {
                        setLastUse(response.data.coupon.id, 'coupons');
                        navigator.clipboard.writeText(copyButton.getAttribute('value'));
                    };

                    // Shopping Element
                    document.getElementById('shopping_coupon_action').setAttribute('onclick',
                        `redirectShopping('${response.data.coupon.url}')`);



                    axios.get('/check-user-coupon/' + coupon_id)
                        .then(function(response) {
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

        // Redirect for shopping coupon
        function shoppingCoupon($url) {
            window.redirect = $url;
        }

        // Make coupon as activation
        function markAsActivation(id) {
            this.setLastUse(id, 'coupons');
            axios.get('/set-as-activation/' + id)
                .then(function(response) {})
        }

        // Make coupon as activation
        function markAsInActivation(id) {
            this.setLastUse(id, 'coupons');
            axios.get('/set-as-inactivation/' + id)
                .then(function(response) {})
        }

        function addToFavorite(id, position) {
            axios.get('/add-to-favorite/' + id + '/' + position)
                .then(function(response) {
                    // console.log(response);
                })
                .catch(function(error) {
                    window.location.href = '/login';
                });
        }

        // Share Button
        function shareByEmail(store_name, code, discount) {
            const body =
                `استخدم كود (${code}) للحصول على خصم العرض ${discount}% في ${store_name} 😁\n\nتصفح موقع الكوبونات للحصول على أحدث كوبونات الخصم`;

            const phoneNumber =
                '+972567077653'; // Replace with the phone number you want to send the message to, including country code but without any symbols or spaces
            const message = 'Hello!'; // Replace with the message you want to send
            const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(body)}`;
            window.location.href = whatsappLink;
        }

        // Copy Element
        function copyCodeToClipboard(code, coupon) {
            navigator.clipboard.writeText(code);
            alert('Code copy successfully');
            this.setLastUse(coupon.id, 'coupon');
        }

        // Shopping Redirect
        function redirectShopping(url) {
            location.href = url;
        }

        // Set Last Use
        function setLastUse(id, position) {
            axios.get('/set-last-use/' + id + '/' + position)
                .then(function(response) {
                    // console.log(response);
                });
        }
    </script>
@endpush
