@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الاصناف </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        عرض الاصناف </a>
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
                    جدول التصنيفات
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.category.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة تصنيف
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
                        <input type="text" placeholder="بحث عن طريق اسم التصنيف" name="search" class="form-control"
                               value="{{ old('name') }}">

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

            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data"
                 style="">
                @if(isset($categories) && $categories->count()>0)

                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center" style="font-size: 16px; font-weight: bold">التصنيف</th>
                            <th class="text-center" style="font-size: 16px; font-weight: bold">الحالة</th>
                            <th  class="text-center" style="font-size: 16px; font-weight: bold">العمليات</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $index=>$category)
                            <tr>
                                <th class="text-center" style="font-size: 14px">{{$index+=1}}#</th>
                                <td class="text-center" class="name" style="font-size: 16px">{{$category->name  }}</td>
                                <td class="text-center">
                                      <span class="kt-switch kt-switch--icon">
                                            <label>
                                                <input {{$category->status ==1?'checked':''  }} type="checkbox"
                                                       data-id="{{$category->id}}" data-name="{{$category->name}}"

                                                       data-status="{{$category->status}}"
                                                       class="switch_form ">
                                                <span></span>
                                            </label>
                                        </span>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('dashboard.category.edit' , $category->id) }}"
                                       class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        <i style="font-size: 23px" class="la la-edit"></i>
                                    </a>

                                    <form name="myForm" style="display: inline-block"
                                          action="{{ route('dashboard.category.destroy' , $category->id) }}"
                                          method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit">
                                            <i style="font-size: 25px" class="la la-trash"></i></button>
                                    </form>


                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end mt-4 mr-5">

                        {{ $categories->appends(request()->query())->links() }}

                    </div>
                @endif


            </div>

            <!--end: Datatable -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', "input[type='checkbox']", function (e) {

                var id = $(this).data('id');
                e.preventDefault();
                var switchButton = '';
                if ($(this).prop('checked') === true) {
                    switchButton = '1';
                } else {
                    switchButton = '0'
                }
                $.ajax
                ({
                    url: "{{ url('dashboard/updateStatus')}}/" + id + "",
                    type: 'post',
                    data: {
                        'status': switchButton,
                        '_token': $("input[name='_token']").val(),
                        'id': id
                    },
                })

            });
        })
    </script>

@endsection
