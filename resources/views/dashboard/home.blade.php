@extends('dashboard.layout.app')

@section('content')

    <style>
        a .btn{
            font-size: 29px;
            font-weight: bold;
        }
    </style>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الصفحة الرئيسية </h3>
                <span class="kt-subheader__separator kt-hidden"></span>

            </div>
        </div>
    </div>


    <div class="col-xl-12">

        <!--begin:: Widgets/Applications/User/Profile3-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__body">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="ibox-content">
                        <a href="{{route('dashboard.user.create')}}" class="btn btn-bold btn-label-brand mr-5"><i class="fa fa-user"></i>مستخدم جديد</a>
                        <a href="{{route('dashboard.category.create')}}" class="btn btn-bold btn-label-success mr-5"><i class="fa fa-list"></i>تصنيف جديد</a>
                        <a href="{{route('dashboard.store.create')}}" class="btn btn-bold btn-label-danger mr-5"><i class="fa fa-home"></i>مخزن جديد</a>
                        <a href="{{route('dashboard.supplier.create')}}" class="btn btn-bold btn-label-info mr-5"><i class="fa flaticon-user-settings"></i>مورد جديد</a>
                        <a href="{{route('dashboard.product.create')}}" class="btn btn-bold btn-bold btn-label-danger mr-5"><i class="fa fa-cubes"></i>منتج جديد</a>
                        <a href="{{route('dashboard.import.create')}}" class="btn btn-bold btn-label-success mr-5"><i class="fa fa-truck-loading"></i>وارد جديد</a>
                        <a href="{{route('dashboard.export.create')}}" class="btn btn-bold btn-label-danger mr-5"><i class="fa fa-cart-arrow-down"></i>طلبية جديدة</a>
                        <a href="{{route('dashboard.customer.create')}}" class="btn btn-bold btn-label-info mr-5"><i class="fa fa-users"></i>زبون جديد</a>
                    </div>
                    <div class="kt-widget__bottom">
                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-user"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">المستخدمين</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $users }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-list-2"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">التصنيفات</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $categories }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-home-1"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">المخازن</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $stores }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-shopping-cart"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">الموردين</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $suppliers }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-cube"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">المنتجات</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $products }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-download-1"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">الواردات</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $imports }}</a>
                            </div>
                        </div>


                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-shopping-cart-1"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">الطلبيات</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $exports }}</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-user-outline-symbol"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">الزبائن</span>
                                <a href="#" class="kt-widget__value kt-font-brand">{{ $customers }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Applications/User/Profile3-->
    </div>



@endsection
