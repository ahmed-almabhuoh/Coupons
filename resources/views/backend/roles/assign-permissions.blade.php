@extends('layouts.app')

@section('title', __('Assign Permissions'))
@section('page-index', __('Assign Permissions'))
@section('root', __('List'))
@section('sub-root', __('HR'))


@section('styles')
    <!-- BEGIN: Vendor CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('panel/app-assets/vendors/css/vendors.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('panel/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')

    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <div class="card">

                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                            role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead class="table-light">
                                <tr role="row">
                                    <th class="control sorting_disabled" rowspan="1" colspan="1"
                                        style="width: 31.6562px; display: none;" aria-label=""></th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 101.266px;"
                                        aria-label="User: activate to sort column ascending">
                                        {{ __('Permission name') }}</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135.891px;"
                                        aria-label="Actions"> {{ __('Actions') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!count($permissions))
                                    <tr class="odd">
                                        <td valign="top" colspan="6" class="dataTables_empty">
                                            {{ __('No permissions found yet ... !') }} </td>
                                    </tr>
                                @endif
                                @foreach ($permissions as $permission)
                                    <tr>
                                        @if (auth()->user()->lang == 'en')
                                            <td>{{ $permission->name }}</td>
                                        @elseif (auth()->user()->lang == 'ar')
                                            <td>{{ $permission->name_ar }}</td>
                                        @endif
                                        <td>
                                            <input type="checkbox"
                                                onchange="assignPermissionToRole('{{ Crypt::encrypt($role->id) }}', '{{ Crypt::encrypt($permission->id) }}')"
                                                class="form-check-input" id="permission_{{ $permission->id }}"
                                                @foreach ($role->permissions as $permission_role)
                                                    @if ($permission_role->id == $permission->id)
                                                        checked
                                                    @endif @endforeach>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between mx-2 row mb-1">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>


                <!-- Modal to add new user Ends-->
            </div>
            <!-- list section end -->
        </section>
        <!-- users list ends -->

    </div>
@endsection

@section('scripts')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('panel/app-assets/js/scripts/pages/app-user-list.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        function confirmationDelete(id, refrance, lang = 'ar') {

            var title, text, confirmButtonText, cancelButtonText;
            if (lang == "ar") {
                title = "هل أنت متأكد؟";
                text = "لن تتمكن من التراجع عن هذا!";
                confirmButtonText = "نعم، احذفها";
                cancelButtonText = "لا، ألغِ الأمر";
            } else {
                title = "Are you sure?";
                text = "You won't be able to revert this!";
                confirmButtonText = "Yes, delete it!";
                cancelButtonText = "No, cancel";
            }

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: confirmButtonText,
                cancelButtonText: cancelButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteAdmin(id, refrance);
                }
            })
        }

        function deleteAdmin(id, refrance) {
            axios.delete('/cpanel/roles/destroy/' + id)
                .then((response) => {
                    // console.log('Response:', response.data);
                    toastr.success(response.data.body, response.data.header);
                    refrance.closest('tr').remove();
                    showDeletingMessage(response.data);
                })
                .catch((error) => {
                    // console.error('Error:', error);
                    toastr.error(error.response.data.body, error.response.data.header);
                    showDeletingMessage(error.response.data);
                });
        }

        function showDeletingMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 4000
            });
        }

        function assignPermissionToRole(role_id, permission_id) {
            axios.get('/cpanel/roles/assign-permission/' + role_id + '/' + permission_id)
                .then((response) => {
                    // console.log('Response:', response.data);
                    toastr.success(response.data.body, response.data.header);
                })
                .catch((error) => {
                    // console.error('Error:', error);
                    toastr.error(error.response.data.body, error.response.data.header);
                });
        }
    </script>
@endsection
