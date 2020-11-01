@extends('dashboard.layout.app')
@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الطلبيات </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        الطلبيات </a>
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
                    جدول الطلبيات
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">

                        <a type="button" class="btn btn-bold btn-label-brand btn-sm"
                           href="{{route('dashboard.export.create')}}">اضافة طلبية جديدة
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
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>

                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <select name="status" class="form-control" id="kt_form_status">
                                        <option value="">الحالة</option>
                                        <option value="1">مكتمل</option>
                                        <option value="2"> قيد التنفيذ</option>
                                        <option value="3">غير مكتمل</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data"
                 style="">
                <table class="kt_datatable">


                </table>

            </div>
        </div>
    </div>
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
                                url: '{{ route('dashboard.export.index') }}',
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
                    columns: [

                        {
                            field: "id",
                            title: "#",
                            sortable: "asc",
                            width: 30,
                            type: "number",
                            selector: !1,
                            textAlign: "center",

                        }, {
                            field: "customer_id", title: "اسم الزبون", template: function (row) {
                                return row.customer.name
                            }
                        },

                        {
                            field: "user_id", title: "تم ادخال عن طريق", template: function (row) {
                                return row.user.name
                            }
                        },

                        {
                            field: "dateTime", title: "وقت و تاريخ الطلبية"
                        },
                        {
                            field: "notes", title: "ملاحظات"
                        },
                        {
                            field: "status", title: "الحالة", template: function (row) {
                                if (row.status === 'قيد التنفيذ')
                                    return '<span class="badge badge-primary">' + row.status + '</span>';
                                else if (row.status === 'غير مكتمل')
                                    return '<span class="badge badge-danger">' + row.status + '</span>';
                                else
                                    return '<span class="badge badge-success">' + row.status + '</span>';

                            }
                        },
                        {
                            field: 'action', title: 'العمليات', template: function (row) {
                                  return '<a class="editProduct mr-3" data-id="'+row.id+'" href="{{ url('dashboard/export')}}/' +row.id + '/edit" ><i class="flaticon2-pen "></i> </a>'
                            }
                        }

                    ],
                });
            $('#kt_form_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'status');
            });

        });
    </script>

@endsection

