@extends('dashboard.layout.app')
@section('content')


    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    ادارة المخزن
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        اضافة مخزن </a>
                </div>
            </div>

        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    اضافة معلومات المخزن
                </h3>
            </div>
        </div>
        <form method="post" action="{{route('dashboard.store.store')}}" class="validate">
            <div class="kt-portlet__body">
                @csrf
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>اسم المخزن</label>
                        <div class="kt-input-icon">
                        <input type="text" class="form-control" name="name" data-rule-required="true"
                               placeholder="ادخل اسم المخزن">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-store-alt"></i></span></span>

                        </div>
                        <span class="ml-4" style="color: red">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="col-lg-4">
                        <label>انواع التصنيفات المتوفرة داخل المخزن</label>
                        <select name="categories[]" class="selecte2" multiple data-rule-required="true">
                            @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <span class="ml-4" style="color: red">{{ $errors->first('categories') }}</span>
                    </div>

                    <div class="col-lg-4">
                        <label>عنوان المخزن</label>
                        <div class="kt-input-icon">
                        <input type="text" class="form-control" name="address" data-rule-required="true" placeholder="ادخل عنوان المخزن">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-location-arrow"></i></span></span>

                        </div>
                        <span class="ml-4" style="color: red">{{ $errors->first('address') }}</span>
                    </div>
                </div>

            </div>

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        اضافة معلومات أجار المخزن
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                @csrf
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>تاريخ بداية التأجير</label>
                        <input data-rule-required="true" type="text" class="form-control" id="kt_datepicker_1"
                               name="rental_date" readonly="" placeholder="اختر تاريخ بداية التأجير">
                        <span class="ml-4" style="color: red">{{ $errors->first('rental_date') }}</span>

                    </div>

                    <div class="col-lg-4">
                        <label>مدة التأجير </label>
                        <select class="selecte2" name="duration_of_the_rental" data-rule-required="true">
                            <option value="">اختر</option>
                            <option value="1">سنوي</option>
                            <option value="2">شهري</option>
                        </select>
                        <span class="ml-4" style="color: red">{{ $errors->first('duration_of_the_rental') }}</span>

                    </div>

                    <div class="col-lg-4">
                        <label>قيمة الأجار سنوياً</label>
                        <input type="text" class="form-control" name="rental_salary" data-rule-required="true"
                               placeholder="ادخل قيمة الأجار سنوياً">
                        <span class="ml-4" style="color: red">{{ $errors->first('rental_salary') }}</span>
                    </div>

                </div>


            </div>


            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </div>
        </form>


        {{--<div class="alert alert-primary mt-3 mr-4 ml-4 " role="alert">--}}
        {{--<div class="alert-text ">يجب اولاً اضافة اقسام لتتمكن من اضافة موردين</div>--}}
        {{--</div>--}}

    </div>




@endsection
