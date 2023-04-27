@extends('layouts.app')

@section('title', __('Offers'))
@section('page-index', __('Offers'))
@section('root', __('List'))
@section('sub-root', __('CM'))


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
        <!-- offers list start -->
        <section class="app-user-list">
            <div class="card">
                <livewire:backend.offers.offer-search />
            </div>
            <!-- list section end -->
        </section>
        <!-- offers list ends -->

    </div>
@endsection

@section('scripts')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('panel/app-assets/js/scripts/pages/app-offer-list.js') }}"></script>
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
            axios.delete('/cpanel/offers/' + id)
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
