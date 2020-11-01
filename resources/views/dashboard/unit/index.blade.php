@extends('dashboard.layout.app')
@section('content')


    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    وحدات المنتجات </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        وحدات المنتجات </a>
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
                    جدول وحدات المنتجات
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@mdo">اضافة وحدة جديدة
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data"
                 style="">


                <div class="card card-custom gutter-b">

                    <div class="card-body">
                        <!--begin::Example-->
                        <div class="example mb-10">

                            <div class="example-preview">
                                <table class="table ">
                                    <thead class="thead-light">
                                    <tr>
                                    <tr>
                                        <th style="font-size: 14px" scope="col">#</th>
                                        <th style="font-size: 14px" scope="col">الوحدة</th>
                                        <th style="font-size: 14px" scope="col">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($units as $index=>$unit)

                                        <tr>
                                            <td style="font-size: 14px" width="280" scope="row">{{ $index+=1 }}#</td>
                                            <td style="font-size: 14px" width="400">{{ $unit->unit }}</td>
                                            <td style="font-size: 14px" data-field="Actions"
                                                data-autohide-disabled="false"
                                                class="kt-datatable__cell">
                            <span style="overflow: visible; position: relative; width: 110px;">

                                <a data-toggle="modal" data-target="#exampleModal2"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md unit" id="{{ $unit->id }}">
                                    <i style="font-size: 25px" class="la la-edit"></i>
                                </a>

                                <form name="myForm" style="display: inline-block"
                                      action="{{ route('dashboard.unit.destroy' , $unit->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button data-value="{{$unit->id}}" id="delete"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i
                                                style="font-size: 25px" class="la la-trash"></i></button>
                                </form>
                            </span>
                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form id="form" action="{{ route('dashboard.unit.store') }}" method="post"
                                          class="validate">
                                        @csrf

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ادخل الوحدة</label>
                                            <input type="text" data-rule-required="true" class="form-control"
                                                   name="unit">
                                        </div>
                                        <button type="submit" id="add" class="btn btn-primary">اضافة</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء
                                        </button>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"--}}
                    {{--aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                    {{--<div class="modal-dialog" role="document">--}}
                    {{--<div class="modal-content">--}}
                    {{--<div class="modal-body">--}}

                    {{--<form id="editform" action="{{ route('dashboard.unit.update' , $unit->id) }}"--}}
                    {{--method="post" class="validate">--}}
                    {{--@csrf--}}
                    {{--@method('put')--}}

                    {{--<div class="form-group">--}}
                    {{--<label for="recipient-name" class="col-form-label">ادخل الوحدة</label>--}}
                    {{--<input type="text" value="{{ $unit->unit }}" data-rule-required="true"--}}
                    {{--class="form-control" name="unitEdit">--}}
                    {{--</div>--}}
                    {{--<button type="submit" id="edit" class="btn btn-primary">حفظ</button>--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء--}}
                    {{--</button>--}}

                    {{--</form>--}}
                    {{--<div class="modal-footer">--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>

        $(document).ready(function () {

            $('#add').on('click', function (e) {

                e.preventDefault();

                var unit = $("input[name='unit']").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('dashboard.unit.store') }}",
                    data: {
                        '_token': "{{ csrf_token()  }}",
                        'unit': unit

                    },
                    success: function (unit) {
                        if (unit.ajax_status === true) {
                            $('#exampleModal').modal('hide');
                           var $index = $('.example-preview .table tbody tr').length +1;
                            $('table tbody .trlast').removeClass('trlast');
                            $('table tbody').append(`<tr class="trlast">
                                            <td class="trindex" style="font-size: 14px" width="280" scope="row">`+$index+`#</td>
                                            <td style="font-size: 14px" width="400">` + unit.unit + `</td>

                                            <td style="font-size: 14px" data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                            <span style="overflow: visible; position: relative; width: 110px;">

                                <a data-toggle="modal" data-target="#exampleModal2" class="btn btn-sm btn-clean btn-icon btn-icon-md unit" id="1">
                                    <i style="font-size: 25px" class="la la-edit"></i>
                                </a>
                                <form name="myForm" action="{{ url('dashboard/unit')}}/+`+unit.id+`+" style="display: inline-block" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
@method('delete')
<button  data-id=` + unit.id + ` class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i style="font-size: 25px" class="la la-trash"></i></button>
                            </span>
                            </form>
                            </td></tr>`);
                        } else {
                            alert(unit.message)
                        }
                    },

                });

            });


        });
    </script>

@endsection

