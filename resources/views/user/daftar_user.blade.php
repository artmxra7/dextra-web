@extends('layouts.app')

@section('title', 'Daftar User')

@section('style')

@endsection()

@section('sidebar')
@parent

@include('layouts.sidebar')
@endsection

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!--subheaderhere -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    <i class="m-menu__link-icon fa fa-users"></i> Daftar User
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                   <li class="m-nav__item m-nav__item--home">
                        <a href="{{ url('/') }}" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--end subheaderhere -->

    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										User Terdaftar
									</h3>
								</div>
							</div>
						</div>

            <div class="m-portlet__body">

                <!--begin: Menu Search Bar -->
                <div class="m-form m-form--label-align-right m--margin-top-5 m--margin-bottom-5">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-xl-1 ">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-sm-4 order-1 order-xl-2 m--align-left m--margin-bottom-20">
                                    <a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--pill m-btn--air">
                                        <span>
                                            <i class="la la-file-excel-o"></i>
                                            <span>Export ke Excel</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-6 order-2">
                                    <div class="m-input-icon m-input-icon--left m--align-right m--margin-bottom-20">
                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Menu Search Bar -->
                <table class="m-datatable" id="html_table" width="100%">
									<thead>
										<tr>
											<th title="Field #1" data-field="OrderID">ID</th>
											<th title="Field #2" data-field="Nama">Nama</th>
											<th title="Field #3" data-field="Email">Email</th>
											<th title="Field #4" data-field="NoTelp">No Telp</th>
											<th>Action</th>
											{{-- <th title="Field #6" data-field="Color">Color</th>
											<th title="Field #7" data-field="DepositPaid">Deposit Paid</th>
											<th title="Field #8" data-field="OrderDate">Order Date</th>
											<th title="Field #9" data-field="Status">Status</th>
											<th title="Field #10" data-field="Type">Type</th> --}}
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>1</td>
											<td>Lorem Ipsum</td>
											<td>(864) 8888888</td>
											<td>Lorem Ipsum</td>
											<td>
                                                <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Detail">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Ubah">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
										</tr>
                                    </tbody>
                                </table>

            </div>
        </div>




    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('metronic/assets/my-asset/mxwin.js') }}" type="text/javascript"></script>

@endsection
