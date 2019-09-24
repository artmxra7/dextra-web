@extends('layouts.app')

@section('title', 'Detail User')

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
                    <h3 class="m-subheader__title m-subheader__title--separator">Detail User</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ url('/user') }}" class="m-nav__link">
                                <span class="m-nav__link-text">User</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ url('/user/detail_user') }}" class="m-nav__link">
                                <span class="m-nav__link-text">Detail User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->  
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Detail User
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__body">
                    <div class="m-widget3" style="padding-left:50px;">
                        <div class="m-widget3__item">
                            <div class="m-widget3__header">
                                <div class="m-widget3__user-img">
                                    <img class="m-widget3__img" src="{{ url('metronic/assets/app/media/img/users/user5.jpg')}}" alt="" style="width:150px;">
                                    <div style="padding-top:20px;">
                                        <strong style="display: inline; font-size:15px;">Name: </strong>
                                        <p style="display: inline; font-size:15px;">Betty Lapea</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Email: </strong>
                                        <p style="display: inline; font-size:15px;">bettylapea@gmail.com</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">No. HP: </strong>
                                        <p style="display: inline; font-size:15px;">08123456789</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Tanggal Lahir: </strong>
                                        <p style="display: inline; font-size:15px;">12 Agustus 1990</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Alamat: </strong>
                                        <p style="display: inline; font-size:15px;">Jl. Kebenaran</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Kecamatan: </strong>
                                        <p style="display: inline; font-size:15px;">Pondok Pucung</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Kab/Kota: </strong>
                                        <p style="display: inline; font-size:15px;">Tangerang Selatan</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Provinsi: </strong>
                                        <p style="display: inline; font-size:15px;">Banten</p>
                                    </div>
                                    <div>
                                        <strong style="display: inline; font-size:15px;">Kode Pos: </strong>
                                        <p style="display: inline; font-size:15px;">15635</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-section__content" style="padding-left:50px;padding-right:50px;padding-bottom:50px;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Komunitas</th>
                                <th>Kategori</th>
                                <th>Member Since</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Komunitas A</td>
                                <td>Kategori A</td>
                                <td>1 Januari 2019</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Komunitas B</td>
                                <td>Kategori B</td>
                                <td>1 Januari 2019</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Komunitas C</td>
                                <td>Kategori C</td>
                                <td>1 Januari 2019</td>
                                <td>Admin</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions text-right">
                    <div class="row">
                        <div class="col-lg-6 text-left">
                            <strong style="font-size:15px; margin-bottom: 10px;">Action</strong><br><br>
                            <button type="reset" class="btn btn-primary"><a href="" style="color:white;">Delete</a></button>
                        </div>
                        <div class="col-lg-6 text-right">
                        </div>
                    </div>        
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('metronic/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
@endsection
