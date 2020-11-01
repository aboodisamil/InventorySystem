@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                   أماكن المنتجات </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        عرض أماكن المنتجات </a>
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
                   جدول أماكن المنتجات
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.location.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة جديد
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            {{--<form action="" method="get">--}}
                {{--<div class="row">--}}

                {{--<div class="col-md-4">--}}
                    {{--<input type="text" placeholder="Search To Category" name="search" class="form-control">--}}

                {{--</div>--}}

                    {{--<div class="col-md-2">--}}
                        {{--<button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</form>--}}
        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data"
             style="">

            @if(isset($locations) && $locations->count()>0)
                <table class="kt-datatable__table" style="display: block;">
                    <thead class="kt-datatable__head">
                    <tr class="kt-datatable__row" style="left: 0px;">
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">الرقم</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز القاطع الرئيسي</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز القاطع الفرعي</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز الرف</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">الاصناف</span></th>

                        <th data-field="Actions" data-autohide-disabled="false"
                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 110px;">العمليات</span></th>
                    </tr>
                    </thead>

                    <tbody class="kt-datatable__body">
                    @foreach($locations as $index=> $location)


                            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                <td data-field="CompanyName" class="kt-datatable__cell"><span
                                            style="width: 133px;">  #{{ $index+1 }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$location->section  }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$location->subsection }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$location->shelf  }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            class="badge badge-info"   style="width: 140px; color: white; font-size: 14px">
                                        @foreach($categoires as $category)
                                            @if($category->id == $location->category_id)
                                                {{  $category->name }}

                                            @endif

                                        @endforeach

                                    </span></td>



                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                            <span style="overflow: visible; position: relative; width: 110px;">

                                <a title="Edit details" href="{{ route('dashboard.location.edit' , $location->id) }}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i   style="font-size: 30px"  class="la la-edit"></i>
                                </a>

                                <form  name="myForm"   style="display: inline-block" action="{{ route('dashboard.location.destroy' , $location->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i
                                                style="font-size: 30px"  class="la la-trash"></i></button>
                                </form>



                            </span>
                                </td>
                            </tr>



                    @endforeach
                    </tbody>
                </table>

            @endif


        </div>

        <!--end: Datatable -->
    </div>
    </div>
@endsection