@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    اضافة منتجات للمخزن </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        اضافة منتجات للمخزن </a>
                </div>
            </div>

        </div>
    </div>



    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-list"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    جدول المنتجات المتوفرة داخل المخزن
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">

                        <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal"
                                data-target="#kt_modal_4">اضافة منتج داخل المخزن
                        </button>

                    </div>

                    <a target="_blank" href="{{route('dashboard.importExcel')}}" type="button"
                       class="btn btn-default btn-icon-sm ml-4">
                        <i class="la la-file-excel-o"></i>Export
                    </a>

                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <div class="kt-form kt-form--label-right kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>

                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <select name="category_id" class="form-control" id="kt_form_status">
                                        <option value="">ALL</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--end: Search Form -->
        </div>
        <!--begin: Datatable -->
        <table class="kt_datatable">


        </table>

        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة منتجات جديدة للمخزن</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('dashboard.import.store')}}" method="post" class="validate" id="form">
                            <div class="modal-body">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label>اختر الصنف</label>
                                        <select name="category_id" class="selecte2 category_id"
                                                data-rule-required="true">
                                            <option value="">اختر</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-4">
                                        <label>اختر المنتج</label>
                                        <select name="product_id" class="selecte2 product"
                                                data-rule-required="true">
                                            <option value="">اختر</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>الكمية</label>
                                        <div class="input-group">
                                            <input name="quantity" data-rule-required="true" type="text"
                                                   class="form-control">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span id="unit">كم</span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row hidden ">
                                    <div class="col-lg-4">
                                        <label>عدد الصناديق</label>
                                        <div class="input-group">
                                            <input name="num_of_box" type="text" readonly
                                                   data-rule-required="true"
                                                   class="form-control" id="box">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="enable1" type="checkbox">
                                                        <span></span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>عدد الرزم داخل كل صندوق</label>
                                        <div class="input-group">
                                            <input name="num_of_package_in_box" data-rule-required="true" type="text"
                                                   readonly
                                                   class="form-control package" id="package">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="enable2" type="checkbox">
                                                        <span></span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>عدد القطع داخل كل رزمة</label>
                                        <div class="input-group">
                                            <input name="num_of_Piece_in_package" type="text"
                                                   data-rule-required="true"
                                                   readonly id="piece"
                                                   class="form-control piece">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox" class="enable3">
                                                        <span></span>
                                                    </span>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="form-group row hidden  ">
                                    <div class="col-lg-4">
                                        <label>السعر جملة</label>
                                        <div class="input-group">
                                            <input name="price_by_package" type="text" readonly
                                                   data-rule-required="true"
                                                   class="form-control price_package" id="price_by_package">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="enable4" type="checkbox">
                                                        <span></span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>السعر مفرق</label>
                                        <div class="input-group">
                                            <input name="price_by_piece" type="text"
                                                   required
                                                   class="form-control price_piece" id="price_by_piece">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input class="enable5" type="checkbox">
                                                        <span></span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>المصنوعية</label>
                                        <div class="input-group">
                                            <input name="manufacturer" type="text" value="صنع في الصين" readonly
                                                   data-rule-required="true"
                                                   class="form-control" id="manufacturer">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <div class="modal-footer">
                                        <span class="kt-switch kt-switch--icon mt-3">
                                            <label>
                                                <input type="checkbox" class="switch_form ">
                                                <span></span>
                                            </label>
                                        </span>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                <button type="submit" id="add" class="btn btn-primary">اضافة</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!--end::Modal-->



        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة منتجات جديدة للمخزن</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body-5">

                    </div>


                </div>
            </div>
        </div>


    </div>
    {{--</div>--}}
    {{--</div>--}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            var datatable = $(".kt_datatable").KTDatatable(
                {
                    data: {
                        type: "remote",
                        source: {
                            read: {
                                method: 'GET',
                                url: '{{ route('dashboard.import.index') }}',
                            },
                        },
                        pageSize: 10,
                        serverPaging: !0,
                        serverFiltering: !0,
                        serverSorting: !0,
                    },
                    layout: {scroll: !1, footer: !1},
                    sortable: !0,
                    pagination: !0,
                    search: {input: $("#generalSearch"), key: "generalSearch"},
                    columns: [{
                        field: "id",
                        title: "#",
                        sortable: "asc",
                        width: 30,
                        type: "number",
                        selector: !1,
                        textAlign: "center"
                    }, {
                        field: "product_id", title: "المنتج", template: function (row) {
                            return row.product.product_name
                        }
                    },
                        {field: "quantity", title: "الكمية"},
                        {field: "num_of_box", title: "عدد الصناديق"},
                        {field: "num_of_package_in_box", title: "عدد الرزم"},
                        {field: "num_of_Piece_in_package", title: "عدد القطع"},
                        {field: "price_by_piece", title: "السعر مفرق"},
                        {field: "price_by_package", title: "السعر جملة"},
                        {
                            field: 'Actions',
                            title: 'العمليات',
                            sortable: false,
                            width: 110,
                            overflow: 'visible',
                            autoHide: false,
                            template: function (row) {
                                var id = row.id;
                                return '<a class="editProduct mr-3" data-id="'+id+'" href="{{ route('dashboard.import.index')}}/' + id + '" ><i class="flaticon2-pen "></i> </a>' +
                                    '<a data-id="' + id + '"  data-token="{{ csrf_token() }}" class="delete mr-4"><i class="flaticon2-trash delete"></i></a>'

                            }
                        },
                    ],
                });
            $('#kt_form_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'category_id');
            });
            //
            $('.hidden').hide();
            $('.product').on('change', function () {
                var category_id = $('.category_id option:selected').val();
                var product = $('.product option:selected').val();
                if (category_id === '' || product === '') {
                    $('.hidden').hide();
                } else {
                    $('.hidden').show();
                }
            });

            $('.category_id').on('change', function () {

                var category_id = $('.category_id').val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{route('dashboard.import.index')}}",
                    method: 'GET',
                    data:
                        {
                            category_id: category_id,
                        },
                    success: function (data) {
                        $('.product').html('');
                        $('.product').html('<option value="">اختر</option>');
                        $.each(data.data, function (index, value) {
                            $('.product').append('<option value="' + value.id + '" data-unit="' + value.unit.unit + '" data-box="' + value.num_of_box + '"  data-package="' + value.num_of_package_in_box + '" data-manufacturer="' + value.manufacturer + '"   data-piece="' + value.num_of_Piece_in_package + '" data-price-by-package="' + value.price_by_package + '" data-price-by-piece="' + value.price_by_piece + '">' + value.product_name + '</option>')
                        });
                    }
                });

                $(document).on('change', '.product', function () {
                    $('#unit').text($(this).find(':selected').attr('data-unit'));
                    $('#box').val($(this).find(':selected').attr('data-box'));
                    $('#package').val($(this).find(':selected').attr('data-package'));
                    $('#piece').val($(this).find(':selected').attr('data-piece'));
                    $('#price_by_package').val($(this).find(':selected').attr('data-price-by-package'));
                    $('#price_by_piece').val($(this).find(':selected').attr('data-price-by-piece'));
                    $('#manufacturer').val($(this).find(':selected').attr('data-manufacturer'))
                })
            });
            $('.input-group input[type="checkbox"]').on('change', function () {
                if ($(this).is(":checked")) {
                    $(this).closest('.input-group').find('input[type="text"]').removeAttr('readonly')
                } else {
                    $(this).closest('.input-group').find('input[type="text"]').attr('readonly')
                }
            });
            $('#kt_modal_4').on('hide.modal.bs', function () {
                $('.hidden').hide();
                $('.category_id').val('').change()
            });

            $('#form').on('submit', function (e) {
                e.preventDefault();
                var $form = $(this);
                if ($form.valid()) {
                    $.ajax({
                        type: "POST",
                        url: $form.attr('action'),
                        data: $form.serialize(),
                        success: function (product) {
                            if (product.status === true) {
                                init_validator();
                                $('#kt_modal_4').modal('hide')

                                    Swal.fire({
                                        position: 'center',
                                        type: 'success',
                                        title: product.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })

                                $('.modal-form').trigger('reset');
                                $('.product').find('option').remove().end().append('<option value="">اختر</option>').val('');
                                datatable.reload()
                            } else {
                                alert(false)
                            }

                        },
                        dataType: 'JSON' ,

                    });
                }
            });
            $(document).on('click', '.delete', function (e) {
                var id = $(this).data('id');
                var token = $(this).data("token");
                e.preventDefault();
                Swal.fire({
                    title: 'هل انت متأكد من الحذف',
                    text: "هل بالفعل تريد الحذف؟",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('dashboard/import')}}/" + id + " ",
                            type: 'POST',
                            data: {
                                "id": id,
                                "_token": token,
                                "_method": 'DELETE',
                            },
                            success: function () {
                                datatable.reload();
                            }

                        })
                    }
                })


            });

            $(document).on('click' , '.editProduct' , function (e)
            {
                e.preventDefault();
                var url =$(this).closest('a').attr('href');
                var id =$(this).closest('a').data('id');
                $.ajax({
                    type:'GET' ,
                    url:url,
                    data:{
                        id:id
                    } ,
                    success:function (data)
                    {
                        $('.modal-body-5').html(data)
                        $('#kt_modal_5').modal().show();
                        $('.selecte2').select2();
                    }
                })

            })

            $(document).on('submit','#Editform' , function (e)
            {

                e.preventDefault()
                var data=$(this);

                if (data.valid())
                {
                    $.ajax({
                        type:'post' ,
                        url:$(this).attr('action') ,
                        data:data.serialize(),
                        success:function ()
                        {
                            datatable.reload()
                            $('#kt_modal_5').modal('hide')
                        }
                    })

                }

            } )
        });
    </script>

@endsection

