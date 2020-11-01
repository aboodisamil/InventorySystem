@extends('dashboard.layout.app')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        الموظفين </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a class="kt-subheader__breadcrumbs-link">
                            عرض الموظفين </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="kt-portlet__body mb-4">

            <!--begin: Search Form -->
            <form action="" method="get">
                <div class="row">

                    <div class="col-md-4">
                        <input type="text" placeholder="بحث باسم الموظف" name="search" class="form-control"
                               value="{{ old('name') }}">

                    </div>

                    <div class="col-md-4">
                        <select name="role"  class="selecte2" >
                            <option value="">بحث حسب دور الموظف</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-1">
                        <button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>
                    </div>

                </div>
            </form>
            <!--end: Search Form -->
        </div>

        <!--Begin::Section-->
        <div class="row mt-auto">
            @foreach($users as $user)

                <div class="col-4">

                <!--Begin::Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head mb-4">
                                <div class="kt-widget__media">
                                    <img class="kt-hidden" src="{{ asset('assets/media//users/100_1.jpg') }} " alt="image">
                                    <div class="kt-widget__pic kt-widget__pic--info kt-font-info kt-font-boldest  kt-hidden-">
                                        {{ strtoupper( substr($user->name , 0,4)) }}
                                    </div>
                                </div>
                                <div class="kt-widget__info">
                                    <a  class="kt-widget__username "   style="font-size: 14px ">
                                       {{  $user->name }}
                                    </a>

                                    <span class="kt-widget__desc badge badge-primary mt-3" style="font-size: 10px; color: white ">
															{{  implode('-' , $user->roles->pluck('name')->toArray() )  }}
														</span>
                                </div>
                            </div>
                            <div class="kt-widget__body">

                                <div class="kt-widget__item">
                                    <div class="kt-widget__contact mt-2">
                                        <span class="kt-widget__label">البريد الاكتروني</span>
                                        <a  class="kt-widget__data">{{ $user->email }}</a>
                                    </div>

                                    <div  style="direction: ltr" class="kt-widget__contact mb-2">
                                        <a class="kt-widget__data">{{ $user->phone }}</a>

                                        <span class="kt-widget__label ">رقم الاتصال</span>
                                    </div>
                                    <div class="kt-widget__contact mr-0" >
                                        <span class="kt-widget__label">العنوان</span>
                                        <span  class="kt-widget__data mr-0">{{ $user->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div  style="text-align: center" class="mt-4">

                                <a title="Edit details" href="{{ route('dashboard.user.edit' , $user->id) }}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i   style="font-size: 27px"  class="la la-edit"></i>
                                </a>

                                <form  name="myForm"   style="display: inline-block"
                                       action="{{ route('dashboard.user.destroy' , $user->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i
                                                style="font-size: 27px"  class="la la-trash"></i></button>
                                </form>


                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>

                <!--End::Portlet-->
            </div>
            @endforeach

        </div>
        <!--End::Section-->




        <!--Begin::Pagination-->
        {{--<div class="row">--}}
            {{--<div class="col-xl-12">--}}

                {{--<!--begin:: Components/Pagination/Default-->--}}
                {{--<div class="kt-portlet">--}}
                    {{--<div class="kt-portlet__body">--}}

                        {{--<!--begin: Pagination-->--}}
                        {{--<div class="kt-pagination kt-pagination--brand">--}}
                            {{--<ul class="kt-pagination__links">--}}
                                {{--<li class="kt-pagination__link--first">--}}
                                    {{--<a href="#"><i class="fa fa-angle-double-left kt-font-brand"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-pagination__link--next">--}}
                                    {{--<a href="#"><i class="fa fa-angle-left kt-font-brand"></i></a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">...</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">29</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">30</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-pagination__link--active">--}}
                                    {{--<a href="#">31</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">32</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">33</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">34</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">...</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-pagination__link--prev">--}}
                                    {{--<a href="#"><i class="fa fa-angle-right kt-font-brand"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-pagination__link--last">--}}
                                    {{--<a href="#"><i class="fa fa-angle-double-right kt-font-brand"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="kt-pagination__toolbar">--}}
                                {{--<select class="form-control kt-font-brand" style="width: 60px">--}}
                                    {{--<option value="10">10</option>--}}
                                    {{--<option value="20">20</option>--}}
                                    {{--<option value="30">30</option>--}}
                                    {{--<option value="50">50</option>--}}
                                    {{--<option value="100">100</option>--}}
                                {{--</select>--}}
                                {{--<span class="pagination__desc">--}}
														{{--Displaying 10 of 230 records--}}
													{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!--end: Pagination-->--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!--end:: Components/Pagination/Default-->--}}
            {{--</div>--}}
        {{--</div>--}}

        <!--End::Pagination-->
    </div>

@endsection









