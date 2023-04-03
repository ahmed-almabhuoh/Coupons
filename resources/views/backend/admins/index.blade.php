@extends('layouts.app')

@section('title', 'Admins')
@section('page-index', 'Admins')
@section('root', 'List')
@section('sub-root', 'HR')


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
                <livewire:backend.admins.admin-search />
                <!-- Modal to add new user starts-->
                {{-- <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                    <div class="modal-dialog">
                        <form class="add-new-user modal-content pt-0" novalidate="novalidate">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                        placeholder="John Doe" name="user-fullname" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-uname">Username</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                        placeholder="Web Developer" aria-label="jdoe1"
                                        aria-describedby="basic-icon-default-uname2" name="user-name">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                        placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                        aria-describedby="basic-icon-default-email2" name="user-email">
                                    <small class="form-text"> You can use letters, numbers &amp; periods </small>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="user-role">User Role</label>
                                    <select id="user-role" class="form-select">
                                        <option value="subscriber">Subscriber</option>
                                        <option value="editor">Editor</option>
                                        <option value="maintainer">Maintainer</option>
                                        <option value="author">Author</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="user-plan">Select Plan</label>
                                    <select id="user-plan" class="form-select">
                                        <option value="basic">Basic</option>
                                        <option value="enterprise">Enterprise</option>
                                        <option value="company">Company</option>
                                        <option value="team">Team</option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
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
        function confirmationDelete(id, refrance) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteAdmin(id, refrance);
                }
            })
        }

        function deleteAdmin(id, refrance) {
            axios.delete('/cpanel/admins/' + id)
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
    </script>
@endsection
