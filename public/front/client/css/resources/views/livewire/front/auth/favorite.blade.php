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
                        <li><a class="dropdown-item" href="#">{{ __('Namshi') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Floward') }}</a></li>
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
                        <li><a class="dropdown-item" href="#">Active</a></li>
                        <li><a class="dropdown-item" href="#">Inactive</a></li>
                    </ul>
                </div>
            </th>
            <th scope="col">
                <label for="searchInput" class="visually-hidden"> {{ __('Search') }} </label>
                <input type="text" id="searchInput" class="form-control" placeholder="Find what You want..">
            </th>
        </tr>
        <tr>
            <th class="header-tabel" scope="col"> {{ __('Coupon') }} </th>
            <th class="header-tabel" scope="col"> {{ __('Platform name') }} </th>
            <th class="header-tabel" scope="col"> {{ __('Discounting') }} </th>
            <th class="header-tabel" scope="col"> {{ __('Status') }} </th>
            <th class="header-tabel" scope="col"> {{ __('Commands') }} </th>
        </tr>
    </thead>
    <tbody>
        @if (!count($favorites))
            <tr>
                <td colspan="5">{{ __('Favorite is empty right now, start browsing and using coupons :(') }}</td>
            </tr>
        @endif
        @foreach ($favorites as $favorite)
            <tr>
                <th scope="row" class="text-black fw-normal">{{ $favorite->coupon->code }}</th>
                <td>{{ $favorite->coupon->store->name }}</td>
                <td>{{ $favorite->coupon->discount . '%' }} </td>
                <td class="@if ($favorite->coupon->status == 'active') green-text @else red-text @endif">
                    {{ ucfirst($favorite->coupon->status) }}</td>
                <td class="btn"> {{ __('Copy') }} </td>
            </tr>
        @endforeach
    </tbody>
    <div class="mt-15">
        {{ $favorites->links() }}
    </div>
</table>
