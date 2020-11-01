@extends('dashboard.layout.app')
@section('content')


    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    المنتجات
                </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('dashboard.product.index') }}" class="kt-subheader__breadcrumbs-home"><i
                                class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('dashboard.product.index') }}" class="kt-subheader__breadcrumbs-link">
                        المنتجات </a>
                </div>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>
    </div>


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    عرض المنتجات
                </h3>
            </div>                <!--begin: Search Form -->

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.product.create') }}" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة جديد
                        </a>
                    </div>
                </div>
                    <a  target="_blank" href="{{route('dashboard.exportExcel')}}" type="button"  class="btn btn-default btn-icon-sm ml-4" >
                        <i class="la la-file-excel-o"></i>Export
                    </a>

            </div>
        </div>

        <div class="kt-portlet__body">

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
                                            @foreach($category as $cateogry)

                                                <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>

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
            <table class="kt_datatable">
            </table>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">رمز QR الخاص بالمنتج</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            var datatable = $(".kt_datatable").KTDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            method: 'GET',
                            url: '{{ route('dashboard.product.index') }}',
                            params: {
                                datatable: 1
                            }
                        },

                    },
                    pageSize: 10,
                    serverPaging: !0,
                    serverFiltering: !0,
                    serverSorting: !0,

                }
                ,
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
                }, {field: "product_name", title: "المنتج"},
                    {field: "num_of_box", title: "عدد الصناديق"},
                    {field: "num_of_package_in_box", title: "عدد الرزم"},
                    {field: "num_of_Piece_in_package", title: "عدد القطع"},
                    {field: "price_by_piece", title: "السعر مفرق"},
                    {field: "price_by_package", title: "السعر جملة"},
                    {
                        field: "category_id", title: "الصنف", template: function (row) {

                            //    return row.category.name
                            return '<span class="badge badge-primary">' + row.category.name + '</span>';

                        }
                    },

                    {
                        field: 'Actions',
                        title: 'العمليات',
                        sortable: false,
                        width: 110,
                        overflow: 'visible',
                        autoHide: false,
                        template: function (row) {
                            var id = row.id;
                            return '<a class="mr-3 ml-3" href="{{ route('dashboard.product.index')}}/' + id + '/edit" ><i class="flaticon2-pen"></i> </a>' +
                                '<a data-toggle="modal" data-target="#exampleModal" class="product" href="{{ route('dashboard.product.index')}}/' + id + '"><i class="fa fa-qrcode"></i></a>'
                        +   '<a data-id="'+id+'"  data-token="{{ csrf_token() }}" class="delete mr-4"><i class="flaticon2-trash delete"></i></a>'

                        }
                    },
                ],

            });

            $('#kt_form_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'category_id');
            });

            $(document).on('click', '.product', function (e) {
                e.preventDefault();

                var that = $(this);
                var url = that.attr('href');
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        $('.modal-body').html(data);
                        $('#exampleModal').modal().show()
                    }
                })

            }); //

            $(document).on('click' , '.delete' , function (e)
            {
                var id=$(this).data('id');
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
                        if (result.value)
                        {
                            $.ajax({
                              url: "{{ url('dashboard/product')}}/"+id+" " ,
                                type:'POST' ,
                                data: {
                                    "id": id,
                                    "_token": token,
                                    "_method": 'DELETE',
                                },
                                success:function ()
                                {
                                    datatable.reload();
                                }

                            })
                        }
                    })



            })

        });
    </script>

@endsection