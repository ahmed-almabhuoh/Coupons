<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false" title="Platform">
                            {{ __('Filter by Platform') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($stores as $store)
                                <li><a class="dropdown-item" wire:click="filterByPlatform('{{ $store->id }}')"
                                        href="#">{{ $store->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </th>
                <th scope="col">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Filter by Status') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="#" wire:click="filterByStatus('active')">
                                    {{ __('Active') }}
                                </a></li>
                            <li><a class="dropdown-item" href="#" wire:click="filterByStatus('draft')">
                                    {{ __('Inactive') }} </a></li>
                        </ul>
                    </div>
                </th>
                <th scope="col">
                    <label for="searchInput" class="visually-hidden"> {{ __('Search') }} </label>
                    <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                        placeholder="{{ __('Find what You want..') }}">
                </th>
            </tr>
            <tr>
                <th class="header-tabel" scope="col"> {{ __('Coupon') }} </th>
                <th class="header-tabel" scope="col"> {{ __('Platform name') }} </th>
                <th class="header-tabel" scope="col"> {{ __('Discount') }} </th>
                <th class="header-tabel" scope="col"> {{ __('Status') }} </th>
                <th class="header-tabel" scope="col"> {{ __('Commands') }} </th>
            </tr>
        </thead>
        <tbody>
            @if (!count($favorites))
                <tr>
                    <td colspan="5">{{ __('Favorite is empty right now, start browsing and using coupons :(') }}
                    </td>
                </tr>
            @endif
            @foreach ($favorites as $favorite)
                <tr>
                    <th scope="row" class="text-black fw-normal">
                        @if ($favorite->coupon)
                            {{ $favorite->coupon->code }}
                        @elseif ($favorite->product)
                            {{ $favorite->product->name }}
                        @endif
                    </th>
                    <td>
                        @if ($favorite->coupon)
                            {{ $favorite->coupon->store->name }}
                        @elseif ($favorite->product)
                            {{ $favorite->product->store->name }}
                        @endif
                    </td>
                    <td>
                        @if ($favorite->coupon)
                            {{ $favorite->coupon->discount . '%' }}
                        @elseif ($favorite->product)
                            {{ $favorite->product->offer . '%' }}
                        @endif
                    </td>
                    @if ($favorite->coupon)
                        <td class="@if ($favorite->coupon->status == 'active') green-text @else red-text @endif">
                            {{ __(ucfirst($favorite->coupon->status)) }}</td>
                    @elseif ($favorite->product)
                        <td class="@if ($favorite->product->status == 'active') green-text @else red-text @endif">
                            {{ __(ucfirst($favorite->product->status)) }}</td>
                    @endif

                    {{-- Copy Buttong --}}
                    @if ($favorite->coupon)
                        <td class="btn" id="copying_button" onclick="copyCode({{ $favorite }})">
                            {{ __('Copy') }} </td>
                    @elseif ($favorite->product)
                        <td class="btn" id="copying_button" onclick="copyCode({{ $favorite }})">
                            {{ __('Copy') }} </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        {{-- <div class="mt-15">
            {{ $favorites->links() }}
        </div> --}}

        <div class="paginator">
            {{ $favorites->links() }}
        </div>
    </table>

</div>

@push('scripts')
    <script>
        function copyCode(favorite) {
            // var btn = document.getElementById('copying_button');
            if (favorite.coupon) {
                navigator.clipboard.writeText(favorite.coupon.code)
                    .then(() => {
                        alert("Code copied to clipboard");
                    })
                    .catch((error) => {
                        alert("Failed to copy text: ", error);
                    });
            } else {
                navigator.clipboard.writeText(favorite.product.name)
                    .then(() => {
                        alert("Code copied to clipboard");
                    })
                    .catch((error) => {
                        alert("Failed to copy text: ", error);
                    });
            }
            // navigator.clipboard.writeText(btn.getAttribute('value'))
            //     .then(() => {
            //         alert("Code copied to clipboard");
            //     })
            //     .catch((error) => {
            //         alert("Failed to copy text: ", error);
            //     });
        }
    </script>
@endpush
