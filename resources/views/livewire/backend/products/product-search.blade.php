<div class="card-datatable table-responsive pt-0">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
            <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="dataTables_length" id="DataTables_Table_0_length"><label>{{ __('Show') }} <select
                            wire:model="paginate" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                            class="form-select">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> {{ __('entries') }}</label></div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                <div
                    class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1">
                    <div class="me-1">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> {{ __('Search') }} <input
                                    type="search" class="form-control" placeholder="" wire:model="searchTerm"
                                    aria-controls="DataTables_Table_0"></label></div>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ route('products.create') }}" class="btn add-new btn-primary mt-50">
                            <span>{{ __('Add New Product') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <table class="coupon-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
            aria-describedby="DataTables_Table_0_info">
            <thead class="table-light">
                <tr role="row">
                    <th class="control sorting_disabled" rowspan="1" colspan="1"
                        style="width: 31.6562px; display: none;" aria-label=""></th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.734px;" aria-label="Role: activate to sort column ascending">
                        {{ __('Name') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Price') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Discount') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Offer') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Is Specail') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Active Actions') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Inactive Actions') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Code') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Action') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                        colspan="1" style="width: 125.906px;"
                        aria-label="Status: activate to sort column ascending">
                        {{ __('Category') }} </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                        colspan="1" style="width: 125.906px;"
                        aria-label="Status: activate to sort column ascending">
                        {{ __('Store') }} </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                        colspan="1" style="width: 125.906px;"
                        aria-label="Status: activate to sort column ascending">
                        {{ __('Coupon') }} </th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135.891px;"
                        aria-label="Actions"> {{ __('Actions') }} </th>
                </tr>
            </thead>
            <tbody>
                @if (!count($products))
                    <tr class="odd">
                        <td valign="top" colspan="14" class="dataTables_empty">
                            {{ __('No products found yet ... !') }} </td>
                    </tr>
                @endif
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ round($product->original_price) . ' SR' }}
                        </td>
                        <td>
                            {{ round($product->price) . ' SR' }}
                        </td>
                        <td>
                            {{ $product->offer . ' %' }}
                        </td>
                        <td>
                            {{ $product->specail ? __('Specail') : __('NOT') }}
                        </td>
                        <td>
                            @if ($product->activation_count)
                                <img src="{{ asset('front/client/imgs/thumbs-up-like-square.png') }}" alt=""
                                    data-src="./imgs/lik-selceted.png">
                                {{ $product->activation_count }}
                            @else
                                {{ __('No Interactions') }}
                            @endif
                        </td>
                        <td>
                            @if ($product->inactivation_count)
                                <img src="{{ asset('front/client/imgs/dislike.png') }}" alt=""
                                    data-src="./imgs/lik-selceted.png">
                                {{ $product->inactivation_count }}
                            @else
                                {{ __('No Interactions') }}
                            @endif
                        </td>
                        <td>
                            {{ $product->code }}
                        </td>
                        <td>
                            @if ($product->action)
                                <a href="{{ $product->action }}" target="_blank"> {{ __('Link') }} </a>
                            @else
                                {{ __('No link') }}
                            @endif
                        </td>
                        <td>
                            <a
                                href="{{ route('categories.edit', Crypt::encrypt($product->category->id)) }}">{{ $product->category->name }}</a>
                        </td>
                        <td>
                            <a
                                href="{{ route('stores.edit', Crypt::encrypt($product->store->id)) }}">{{ $product->store->name }}</a>
                        </td>
                        <td>
                            @if ($product->coupon)
                                <a
                                    href="{{ route('coupons.edit', Crypt::encrypt($product->coupon->id)) }}">{{ $product->coupon->discount . '%' }}</a>
                            @endif
                        </td>
                        <td>

                            <a href="{{ route('products.edit', Crypt::encrypt($product->id)) }}"
                                class="btn btn-icon btn-info waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                    {{-- <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline> --}}
                                    <path
                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10h-2c0 4.411-3.589 8-8 8s-8-3.589-8-8 3.589-8 8-8c2.394 0 4.561.988 6.129 2.571l-2.058 2.058h5.929v-5.929l-2.057 2.057c-1.323-1.323-3.058-2.057-4.872-2.057zm5.5 5.5l-2.5 2.5v-7h-1v7l-2.5-2.5-1.414 1.414 4.914 4.914 4.914-4.914-1.414-1.414z">
                                    </path>
                                </svg>
                            </a>

                            <button type="button"
                                onclick="confirmationDelete('{{ Crypt::encrypt($product->id) }}', this, '{{ auth('admin')->user()->lang }}')"
                                class="btn btn-icon btn-danger waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                    {{-- <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline> --}}
                                    <path
                                        d="M19 5h-3.5l-1-1h-5l-1 1H5v2h14V5zM8.5 8l-1.5 9h9l-1.5-9h-6zM10 18v-7h1v7h-1zm3 0v-7h1v7h-1zm3 0v-7h1v7h-1z">
                                    </path>
                                </svg>
                            </button>

                        </td>
                    </tr>
                @endforeach
                <tr class="odd" wire:loading>
                    <td valign="top" colspan="6" class="dataTables_empty">
                        {{ __('Searching about products ...') }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between mx-2 row mb-1">
            {{ $products->links() }}
        </div>
    </div>
</div>
