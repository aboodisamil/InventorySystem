@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الوظائف </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        عرض الوظائف  </a>
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
                    عرض الوظائف المتاحة
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.role.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i>اضافة جديد
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
                        <input type="text" placeholder="البحث باسم الوظيفة" name="search" class="form-control"
                               value="{{ old('name') }}">

                    </div>

                    <div class="col-md-1">
                        <button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>
                    </div>

                </div>
            </form>
            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit mt-3">


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center" style="font-size: 16px; font-weight: bold">الوظيفة</th>
                    <th class="text-center" style="font-size: 16px; font-weight: bold">العمليات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($roles as $index=>$role)
                    <tr>
                        <th class="text-center" style="font-size: 14px">{{$index+=1}}#</th>
                        <td class="text-center" style="font-size: 16px">{{$role->name  }}</td>
                        <td class="text-center">

                            <a href="{{ route('dashboard.role.edit' , $role->id) }}"
                               class="btn btn-sm btn-clean btn-icon-md">
                                <i style="font-size: 260%" class="la la-edit text-center"></i>
                            </a>

                            <form name="myForm" style="display: inline-block"
                                  action="{{ route('dashboard.role.destroy' , $role->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-clean btn-icon-md delete center" type="submit">
                                    <i style="font-size: 250%" class="la la-trash"></i>
                                </button>
                            </form>



                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4 mr-5">

                {{ $roles->appends(request()->query())->links() }}

            </div>


        </div>
    </div>


@endsection
