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
                        {{ __('E-mail') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Message') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Status') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 101.266px;" aria-label="Coupon: activate to sort column ascending">
                        {{ __('Sended at') }}</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135.891px;"
                        aria-label="Actions"> {{ __('Actions') }} </th>
                </tr>
            </thead>
            <tbody>
                @if (!count($contacts))
                    <tr class="odd">
                        <td valign="top" colspan="6" class="dataTables_empty">
                            {{ __('No contacts found yet ... !') }} </td>
                    </tr>
                @endif
                @foreach ($contacts as $contact)
                    <tr>
                        <td>
                            <a href="mailto: {{ $contact->email }}">{{ $contact->email }}</a>

                        </td>
                        <td style="width: 150px;">
                            {{ $contact->message }}
                        </td>
                        <td>
                            <span
                                class="badge badge-glow @if ($contact->status == 'pending') bg-warning @elseif('readed') bg-secondary @else bg-success @endif">{{ ucfirst($contact->status) }}</span>
                        </td>
                        <td>
                            <span>{{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</span>
                        </td>
                        <td>

                            <a href="{{ route('contacts.to.questions', Crypt::encrypt($contact->id)) }}"
                                class="btn btn-icon btn-info waves-effect waves-float waves-light">
                                <i data-feather="plus-circle"></i>
                            </a>

                            <button type="button"
                                onclick="confirmationDelete('{{ Crypt::encrypt($contact->id) }}', this, '{{ auth('admin')->user()->lang }}')"
                                class="btn btn-icon btn-danger waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
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
                        {{ __('Searching about contacts ...') }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between mx-2 row mb-1">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
