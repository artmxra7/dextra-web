@extends('layouts.app')

@section('title', 'Create News')

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
                <h3 class="m-subheader__title m-subheader__title--separator"><i class="m-menu__link-icon flaticon-map mr-2"></i> Create News</h3>
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
                                    <i class="m-menu__link-icon flaticon-plus mr-2"></i> Create News
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="POST" action="{{ route('news.store')}}">

                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        <label for="name">Title News <sup class="text-danger">*</sup></label>
                                        {!! Form::text('name', null, array('placeholder' => 'Name Category','class' => 'form-control m-input')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group m-form__group">
                                        {!! Form::label('news_category_id', 'News Category:') !!}
                                        {!! Form::select('news_category_id', $news_categories, null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- Choose one --']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 m--padding-top-30">
                                    <div class="form-group m-form__group">
                                        <label for="name">Image News <sup class="text-danger">*</sup></label>
                                        <div id="image-cropper">
                                        <!-- This is where the preview image is displayed -->
                                            <div class="cropit-preview"></div>

                                            <!-- This range input controls zoom -->
                                            <!-- You can add additional elements here, e.g. the image icons -->
                                            <br>
                                            <input type="range" class="cropit-image-zoom-input" />
                                            <br>
                                            <!-- This is where user selects new image -->
                                            <input type="file" class="cropit-image-input" />

                                            @if (isset($news))
                                                <input class="cropit-target hidden" name="photo" value="{{ asset('storage/news/' . $news->photo) }}" />
                                            @else
                                                <input class="cropit-target hidden" name="photo" />
                                            @endif
                                            <!-- The cropit- classes above are needed
                                                so cropit can identify these elements -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group m-form__group">

                                                        {!! Form::label('content', 'Content:') !!}
                                                        {!! Form::textarea('content', null, ['class' => 'form-control rich-text']) !!}


                                        </div>
                                    </div>
                                </div>






                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="row">
                                <div class="col-12">
                                    <div class="m-form__actions text-right">

                                        <a href="{{ url('news-category') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder m-btn--icon"><i class="la la-ban"></i> Batal</a>
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
   $(function() {
    if ($('#image-cropper').length > 0) {
        $('#image-cropper').cropit({
            imageBackground: false
        });
        $('#image-cropper').cropit('imageSrc', $('.cropit-target').val())
        $('.cropit-trigger').on('click', function (e) {
            $('.cropit-target').val($('#image-cropper').cropit('export'))
        })
    }
      });
  </script>

@endsection
