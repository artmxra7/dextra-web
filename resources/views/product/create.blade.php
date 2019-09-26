@extends('layouts.app')

@section('title', 'User Dashboard')

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
                <h3 class="m-subheader__title m-subheader__title--separator"><i class="m-menu__link-icon flaticon-map mr-2"></i> Product</h3>
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
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Add Product
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="POST" action="{{ route('product.store')}}">

                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="row">

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Title <sup class="text-danger">*</sup></label>
                                        {!! Form::text('title', null, array('placeholder' => 'title','class' => 'form-control m-input')) !!}
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">No Product <sup class="text-danger">*</sup></label>
                                        {!! Form::text('no_product', null, array('placeholder' => 'No Product','class' => 'form-control m-input')) !!}
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Sn Product: <sup class="text-danger">*</sup></label>
                                        {!! Form::text('sn_product', null, array('placeholder' => 'Sn Product','class' => 'form-control m-input')) !!}
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('product_brand_id', 'Product Brand:') !!}
                                        {!! Form::select('product_brand_id', $product_brands, null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- Choose one --']) !!}
                                    </div>
                                </div>

                                @php
                                    if (isset($product)) {
                                    $photo = explode(',', $product->photo);
                                    }
                                @endphp

                                <!-- Photo Field -->
                                <div class="form-group col-sm-12" align="center">

                                    {!! Form::label('photo', 'Photo:') !!}
                                    <div class="photo-list">
                                        <div class="photo-item">
                                            @if (isset($photo[0]))
                                                <img src="{{ url('attachments/products/' . $photo[0]) }}" class="photo" />
                                            @else
                                                <img src="" class="photo" />
                                            @endif
                                            <span>+</span>
                                        </div>

                                        <div class="photo-item">
                                            @if (isset($photo[1]))
                                                <img src="{{ url('attachments/products/' . $photo[1]) }}" class="photo" />
                                            @else
                                                <img src="" class="photo" />
                                            @endif
                                            <span>+</span>
                                        </div>

                                        <div class="photo-item">
                                            @if (isset($photo[2]))
                                                <img src="{{ url('attachments/products/' . $photo[1]) }}" class="photo" />
                                            @else
                                                <img src="" class="photo" />
                                            @endif
                                            <span>+</span>
                                        </div>
                                    </div>

                                    <div class="file-upload">
                                        <input type="file" name="filename[]" class="picker" />
                                        <input type="file" name="filename[]" class="picker" />
                                        <input type="file" name="filename[]" class="picker" />
                                    </div>

                                    <div class="form-group m-form__group">
                                        {!! Form::label('description', 'Description:') !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control rich-text']) !!}
                                    </div>

                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('price_piece', 'Price Piece:') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Rp</span>
                                            {!! Form::text('price_piece', null, ['class' => 'form-control currency-mask', 'required' => true ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('price_box', 'Price Box:') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Rp</span>
                                            {!! Form::text('price_box', null, ['class' => 'form-control currency-mask', 'required' => true ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('is_active', 'Active:') !!}
                                        {!! Form::select('is_active', [
                                            1 => 'Yes',
                                            0 => 'No',
                                        ], null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- Choose one --']) !!}
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('is_stock_available', 'Is Stock Available:') !!}
                                        {!! Form::select('is_stock_available', [
                                            1 => 'Yes',
                                            0 => 'No',
                                        ], null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- Choose one --']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="row">
                                <div class="col-12">
                                    <div class="m-form__actions text-right">

                                        <a href="{{ url('product') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder m-btn--icon"><i class="la la-ban"></i> Batal</a>
                                        <button type="button" onClick="confirmSubmitProcess(this)" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><i class="la la-plus-circle"></i> Buat</button>
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


<script>
        function getImagePreview(input, $image) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $image.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        var $photoItem = $('.photo-item');
        var $fileInput = $('input:file');
        $photoItem.find('.photo').css({ display: 'none' });
        $photoItem.on('click', function (event) {
            var index = $(this).index('.photo-item');
            $fileInput.eq(index).click();
        });
        $fileInput.on('change', function () {
            var index = $(this).index('.picker');
            var $image = $photoItem.eq(index).find('img');
            var $plus = $photoItem.eq(index).find('span');
            var $photo = $photoItem.eq(index).find('.photo');
            getImagePreview(this, $image);
            $plus.css({ display: 'none' });
            $photo.css({ display: 'inline' });
        });
    </script>
@endsection
