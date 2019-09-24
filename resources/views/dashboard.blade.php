@extends('layouts.app')

@section('title', 'Dashboard')

@section('style')

@endsection()

@section('sidebar')
    @parent

    @include('layouts.sidebar')
@endsection

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">

        <!--end:: Widgets/Stats-->

        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title "><i class="fas fa-chart-bar fa-sm"></i>&nbsp;Dashboard</h3>
            </div>
            <div>
                <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                    <span class="m-subheader__daterange-label">
                        <span class="m-subheader__daterange-title"></span>
                        <span class="m-subheader__daterange-date m--font-brand"></span>
                    </span>
                    <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                        <i class="la la-angle-down"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin:: Widgets/Stats-->
        <div class="m-portlet">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-lg-4">

                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__desc">
                                    Pesansn
                                </span>
                                <span class="m-widget24__stats m--font-brand">
                                        {{--  {{$komunitas}}  --}}
                                </span>
                                <div class="m--space-10"></div>
                                <br>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-lg-4">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__desc">
                                    User
                                </span>
                                <span class="m-widget24__stats m--font-info">
                                   {{$users}}
                                </span>
                                <div class="m--space-10"></div>
                                <br>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-lg-4">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__desc">
                                    Transaksi
                                </span>
                                <span class="m-widget24__stats m--font-danger">
                                    0
                                </span>
                                <div class="m--space-10"></div>
                                <br>
                            </div>
                        </div>

                        <!--end::New Orders-->
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Stats-->
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('metronic/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/default/custom/components/charts/morris-charts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/app/js/dashboard.js') }}" type="text/javascript"></script>

@endsection

