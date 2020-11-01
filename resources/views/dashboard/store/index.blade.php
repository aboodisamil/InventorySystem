@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    ادارة المخازن </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        عرض المخازن </a>
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
                    عرض جدول المخازن
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.store.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة جديد
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <form action="" method="get">
                <div class="row">

                    <div class="col-md-4">
                        <input type="text" placeholder="بحث باسم المخزن" name="search" class="form-control"
                               value="{{ old('name') }}">
                    </div>

                    <div class="col-md-4">
                        <select name="status" class="selecte2">
                            <option value="">اختر نوع المخزن</option>
                            <option value="1">مخازن متاحة</option>
                            <option value="2">مخازن معطلة</option>

                        </select>

                    </div>

                    <div class="col-md-1">
                        <button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>
                    </div>

                </div>
            </form>
            <!--end: Search Form -->
        </div>
        <br><br>
        <div class="kt-portlet__body kt-portlet__body--fit">


                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" style="font-size: 16px; font-weight: bold">المخزن</th>
                                    <th class="text-center" style="font-size: 16px; font-weight: bold">العنوان</th>
                                    <th style="font-size: 16px; font-weight: bold; ">الحالة</th>
                                    <th class="text-center" style="font-size: 16px; font-weight: bold">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($stores as $index=>$store)
                                    <tr>
                                        <th class="text-center" style="font-size: 14px" scope="row">{{$index+=1}}#</th>
                                        <td class="text-center" style="font-size: 16px">{{$store->name  }}</td>
                                        <td class="text-center" style="font-size: 16px">{{$store->address  }}</td>
                                        <td  class="{{ $store->status ===1?'kt-badge kt-badge--success kt-badge--inline':'kt-badge kt-badge--danger kt-badge--inline' }} mt-3 " style="font-size: 14px; width: 60px;height: 30px;">{{$store->status ==1 ?'متاح' : 'معطل'  }}</td>
                                        <td class="text-center">

                                            <a type="button"
                                               href="{{route('dashboard.store.show' , $store->id)}}"
                                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-getdate store" data-toggle="modal" data-target="#exampleModal">

                                                <i style="font-size: 23px" class="la la-eye"></i>
                                            </a>

                                            <a  href="{{ route('dashboard.store.edit' , $store->id) }}"
                                                 class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                <i style="font-size: 23px" class="la la-edit"></i>
                                            </a>

                                            <form name="myForm" style="display: inline-block"
                                                  action="{{ route('dashboard.store.destroy' , $store->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button   class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit">
                                                    <i style="font-size: 23px"  class="la la-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">معلومات المخزن</h5>
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
        $(".store").on('click', function (e) {
            e.preventDefault();
            //a element
             var $this = $(this);
             var url = $this.attr('href');
            // var id = $('#store_id').val();
            $.ajax({
                type: "GET",
                url: url ,
                success: function (html) {
                    $('.modal-body').html(html);
                    $('#exampleModal').modal().show();
                },
                dataType: 'HTML'
            });

        })
    </script>

@endsection

