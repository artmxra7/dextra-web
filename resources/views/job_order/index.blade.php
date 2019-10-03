@extends('layouts.app')

@section('title', 'Job Order')

@section('style')
<link href="{{ asset('metronic/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection()

@section('sidebar')
    @parent

    @include('layouts.sidebar')
@endsection

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader" style="padding:0px;margin-bottom:20px;">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Job Order</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ url('/job-order') }}" class="m-nav__link">
                                <span class="m-nav__link-text">Job Order</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped table-bordered table-hover table-checkable" id="table_data">
                    <thead>
                        <tr>

                            <th>Name Users</th>
                            <th>Categories Job</th>
                            <th>Job Code</th>
                            <th>Job Description</th>
                            <th>Job Location Name</th>
                            <th>Job Create</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('metronic/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/default/custom/crud/datatables/basic/pagination_user.js') }}" type="text/javascript"></script>


    <script>
            $(document).ready(function(){
               $('#table_data').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'{{ route('datatable_orderjob') }}',
                    },


                    columns: [

                    {
                        data: 'users_name',
                        name: 'name'
                    },
                    {
                        data: 'name',
                        name: 'categories'
                    },
                    {
                        data: 'job_categories_code',
                        name: 'job_code'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'location_name',
                        name: 'location'
                    },
                    {
                        data: 'created_at',
                        name: 'created'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    },

                    ]
              });


})





          </script>
@endsection
