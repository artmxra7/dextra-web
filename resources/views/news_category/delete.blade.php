@extends('layouts.app')

@section('title', 'Delete News Category')

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
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator"><i class="m-menu__link-icon flaticon-map mr-2"></i> Delete News Category</h3>
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
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Delete News Category
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="POST" action="{{ route ('news-category.delete', $result->news_category_code) }}">

                        {{ csrf_field() }}

                        @method('PATCH')
                        <div class="m-portlet__body">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Name Category <sup class="text-danger">*</sup></label>
                                        {!! Form::text('name', $result -> news_category_name, array('placeholder' => 'Name Category','class' => 'form-control m-input', 'readonly' )) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="row">
                                <div class="col-12">
                                    <div class="m-form__actions text-right">

                                        <a href="{{ url('news-category') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder m-btn--icon"><i class="la la-ban"></i> Batal</a>
                                        <button type="button" onClick="confirmSubmitProcess(this)" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><i class="la la-plus-circle"></i> Delete</button>
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
