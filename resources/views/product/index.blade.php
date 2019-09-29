@extends('layouts.app')

@section('title', 'Product')

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
                    <h3 class="m-subheader__title m-subheader__title--separator">Product</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ url('/product') }}" class="m-nav__link">
                                <span class="m-nav__link-text">Product</span>
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
                        <a href="{!! route('product.create') !!}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                <table class="table table-striped table-bordered table-hover table-checkable" id="table_data">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>No Product</th>
                            <th>Price Piece</th>
                            <th>Price Box</th>
                            <th>Active</th>
                            <th>Action</th>
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
                var myVar = 1;
               $('#table_data').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'{{ route('datatable_product') }}',
                    },
                    columnDefs: [
                            {
                               targets: 0 ,
                               className: 'title'
                            },
                            {
                               targets: 1 ,
                               className: 'no_product'
                            },
                            {
                               targets: 2 ,
                               className: 'price_piece'
                            },
                            {
                                targets: 3 ,
                                className: 'price_box'
                             },
                            {
                               targets: 4 ,
                               className: 'is_active'
                            },
                            {
                                targets: 5 ,
                                className: 'center'
                             },


                          ],
                    columns: [
                      {data: 'title', name: 'title'},
                      {data: 'no_product', name: 'no_product'},
                      {data: 'price_piece', name: 'price_piece'},
                      {data: 'price_box', name: 'price_box'},
                      {data: 'is_active', name: 'is_active'},
                      {data: 'aksi', name: 'aksi'}
                    ]
              });
            })
            $('.btn_modal').click(function(){
              $('.nama').focus();
            })
            $('.simpan').click(function(){
              $.ajax({
                  url:baseUrl +'/setting/simpan_jabatan',
                  type:'get',
                  data:$('.tabel_modal :input').serialize(),
                  dataType:'json',
                  success:function(data){
                      if (data.status == 0) {
                        iziToast.warning({
                            icon: 'fa fa-times',
                            title: 'Nama',
                            message: 'Sudah Digunakan!',
                        });
                      }else if(data.status == 1){
                        iziToast.success({
                            icon: 'fa fa-save',
                            title: 'Berhasil',
                            message: 'Menambah Data!',
                        });
                      }else{
                        iziToast.success({
                            icon: 'fa fa-pencil-alt',
                            title: 'Berhasil',
                            message: 'Mengupdate Data!',
                        });
                      }
                      $('#tambah-jabatan').modal('hide');
                      var table = $('#table_data').DataTable();
                      table.ajax.reload();
                      $('.tabel_modal input').val('');
                  },
                  error:function(){
                    iziToast.warning({
                      icon: 'fa fa-times',
                      message: 'Terjadi Kesalahan!',
                    });
                  }
              });
            });
            function edit(a) {

              var par   = $(a).parents('tr');
              var id    = $(par).find('.d_id').text();
              var nama  = $(par).find('.d_nama').text();
              var ket   = $(par).find('.d_keterangan').text();
              $('.id').val(id);
              $('.nama').val(nama);
              $('.keterangan').val(ket);
              $('#tambah-jabatan').modal('show');
            }
            function hapus(a) {
              var par   = $(a).parents('tr');
              var id    = $(par).find('.d_id').text();
              $.ajax({
                  url:baseUrl +'/setting/hapus_jabatan',
                  type:'get',
                  data:{id},
                  dataType:'json',
                  success:function(data){
                    $('#tambah-jabatan').modal('hide');
                    var table = $('#table_data').DataTable();
                    table.ajax.reload();
                    if (data.status == 1) {
                      iziToast.success({
                            icon: 'fa fa-trash',
                            title: 'Berhasil',
                            color:'yellow',
                            message: 'Menghapus Data!',
                      });
                    }else{
                      iziToast.warning({
                            icon: 'fa fa-times',
                            title: 'Oops,',
                            message: ' Superuser Tidak Boleh Dihapus!',
                      });
                    }
                  },
                  error:function(){
                    iziToast.warning({
                      icon: 'fa fa-times',
                      message: 'Terjadi Kesalahan!',
                    });
                  }
              });
            }
          </script>
@endsection