@extends('layouts.app')

@section('title', 'User Dashboard')

@section('style')
<script type='text/javascript'>
    var centreGot = false;
</script>
{!! $map['js'] !!}
@endsection()

@section('sidebar')
    @parent

    @include('layouts.sidebar')
@endsection

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator"><i class="m-menu__link-icon flaticon-map mr-2"></i> Detail Order</h3>
                {!! generateBreadcrumb($breadcrumb) !!}
            </div>
        </div>
    </div>

    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Detail Customer Order
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right m--margin-10 m--padding-10">

                        <div class="m-portlet__body">
                            <div class="row">

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Nama User</label>
                                        <h3>{{$result->users_name}}</h3>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">No Order <sup class="text-danger">*</sup></label>
                                        <h3>{{$result->job_code}}</h3>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6 m--margin-top-20">
                                    <div class="form-group m-form__group">
                                        <label for="name">Jenis Pekerjaan:</label>
                                        <h3>{{$result->name}}</h3>

                                    </div>
                                </div>

                                <div class="col-6 col-md-6 m--margin-top-20">
                                    <div class="form-group m-form__group">
                                        <label for="name">Status Pekerjaan:</label>

                                        @if($result->status == 0)
                                        <h3>Waiting</h3>
                                        @elseif ($result->status == 1)
                                        <h3>On Going</h3>
                                        @elseif ($result->status == 2)
                                        <h3>Done</h3>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-6 col-md-6 m--margin-top-20">
                                    <div class="form-group m-form__group">
                                        <label for="name">Kontak User:</label>
                                        <h3>{{$result->users_hp}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Detail Order Lokasi
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right m--margin-10 m--padding-10">

                        <div class="m-portlet__body">
                            <div class="row">

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Alamat Order</label>
                                        <h3>{{$result->location_name}}</h3>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Alamat Detail</label>
                                        <h3>{{$result->location_description}}</h3>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <div class="row">
                                    <div class="col-12 col-xl-12 " style="height: 500px">
                                            <div id="rightTopControls" >

                                            </div>
                                            {!! $map['html'] !!}
                                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Detail Part
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right m--margin-10 m--padding-10">

                        <div class="m-portlet__body">
                            <div class="row">


                                <div class="col-2 col-md-4">
                                    <div class="form-group m-form__group">
                                        <label for="name">Nama Brand Part:</label>
                                        <h3>{{$result->brand}}</h3>

                                    </div>
                                </div>

                                <div class="col-2 col-md-4">
                                    <div class="form-group m-form__group">
                                        <label for="name">Nama Model Part:</label>
                                        <h3>{{$result->model}}</h3>
                                    </div>
                                </div>

                                <div class="col-2 col-md-4 ">
                                    <div class="form-group m-form__group">
                                        <label for="name">Serial Number Part:</label>
                                        <h3>{{$result->job_serial_number}}</h3>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>


                </div>
            </div>


            <div class="col-xl-12">
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <i class="m-menu__link-icon flaticon-plus mr-2"></i> Detail Kebutuhan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <form class="m-form m-form--fit m-form--label-align-right m--margin-10 m--padding-10">

                            <div class="m-portlet__body">
                                <div class="row">


                                    <div class="col-2 col-md-4">
                                        <div class="form-group m-form__group">
                                            <label for="name">Deskripsi Permasalahan:</label>
                                            <h3>{{$result->description}}</h3>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </form>


                    </div>
                </div>

        </div>
    </div>
</div>
@endsection

@section('script')


@endsection
