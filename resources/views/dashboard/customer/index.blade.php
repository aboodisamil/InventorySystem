@extends('dashboard.layout.app')
@section('content')



    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الزبائن </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        قائمة الزبائن </a>
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
                    قائمة الزبائن
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.customer.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة زبون
                        </a>
                    </div>
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
                                    <input type="text" class="form-control" placeholder="البحث بالاسم :"
                                           id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--end: Search Form -->
        </div>

        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded " id="local_data">

                <table class="kt_datatable">

                </table>
            </div>

            <!--end: Datatable -->
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
                            url: '{{ route('dashboard.customer.index') }}',
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
                }, {field: "name", title: "الاسم"},
                    {field: "address", title: "العنوان"},
                    {field: "phone", title: "رقم التواصل"},
                    {
                        field: "order_count", title: "عدد الطلبيات", template: function (row) {
                            return row.orders_count;
                        }
                    },
                    {
                        field: "action", title: "العمليات", template: function (row) {
                            return '<a class="editcustomer mr-3" data-id="'+row.id+'" href="{{ url('dashboard/customer')}}/' +row.id + '/edit" ><i class="flaticon2-pen "></i> </a>' +
                                '<a class="delete mr-4" data-id="' + row.id + '"  data-token="{{ csrf_token() }}" ><i class="flaticon2-trash"></i></a>'+
                             '<a class="mr-3" data-id="'+row.id+'" href="{{ url('dashboard/customer')}}/' +row.id + '" ><i class="fa fa-eye "></i> </a>'
                        }
                    },
                ],
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
                            url: "{{ url('dashboard/customer')}}/" + id + " ",
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

        })

    </script>
@endsection

