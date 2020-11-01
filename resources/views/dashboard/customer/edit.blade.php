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
                        تعديل معلومات الزبون </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    اضافة زبون جديد
                </h3>
            </div>
        </div>
        <form method="post" action="{{route('dashboard.customer.update' , $customer->id)}}" class="validate">
            <input type="hidden" name="id" value="{{ $customer->id }}">

            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label> اسم الزبون</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user "></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" data-rule-required="true"
                               value="{{ $customer->name }}"    placeholder="مثال : محمد أحمد ">
                        </div>
                        <span style="color: red">{{ $errors->first('name') }}</span>

                    </div>


                    <div class="col-lg-4">
                        <label>ادخل رقم التواصل</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fa fa-phone"></i></span></div>
                            <input type="text" class="form-control" data-rule-required="true" data-rule-number="true"
                                   value="{{ $customer->phone }}"
                                   name="phone"
                                   placeholder="مثال : 0569211707">
                        </div>
                        <span style="color: red">{{ $errors->first('phone') }}</span>

                    </div>



                    <div class="col-lg-4">
                        <label>ادخل العنوان</label>

                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fa fa-location-arrow"></i></span></div>
                            <input type="text" class="form-control" name="address" data-rule-required="true"
                                   value="{{ $customer->address }}"
                                   placeholder="مثال : شمال قطاع غزة">
                        </div>
                        <span style="color: red">{{ $errors->first('address') }}</span>

                    </div>

                </div>


            </div>

            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </div>
        </form>

    </div>

@endsection

