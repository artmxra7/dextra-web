@extends('layouts.app')

@section('title', 'News Category')

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
                    <h3 class="m-subheader__title m-subheader__title--separator">News Category</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ url('/news') }}" class="m-nav__link">
                                <span class="m-nav__link-text">News Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                        <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create</span>
                            </span>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Person A</td>
                            <td>person_a@gmail.com</td>
                            <td>08123456789</td>
                            <td nowrap></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Person B</td>
                            <td>person_b@gmail.com</td>
                            <td>08123456789</td>
                            <td nowrap></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Person C</td>
                            <td>person_c@gmail.com</td>
                            <td>08123456789</td>
                            <td nowrap></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Person D</td>
                            <td>person_d@gmail.com</td>
                            <td>08123456789</td>
                            <td nowrap></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Person E</td>
                            <td>person_e@gmail.com</td>
                            <td>08123456789</td>
                            <td nowrap></td>
                        </tr>
                    </tbody>
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
@endsection
