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
                        تعديل مخزن </a>
                </div>
            </div>

        </div>
    </div>


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    تعديل معلومات المخزن
                </h3>
            </div>
        </div>
        <form method="post" action="{{route('dashboard.store.update' , $store->id)}}" class="validate">
            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$store->id  }}">
                <div class="form-group row">

                    <div class="col-lg-6">
                        <label>اسم المخزن</label>
                        <input type="text" class="form-control" value="{{ $store->name }}" name="name"
                               placeholder="ادخل اسم المخزن" data-rule-required="true">
                        <span class="ml-4" style="color: red">{{ $errors->first('name') }}</span>

                    </div>


                    <div class="col-lg-6">
                        <label>انواع التصنيفات المتوفرة داخل المخزن</label>
                        <select name="categories[]" class="selecte2" multiple  data-rule-required="true" >
                            @foreach($category as $category)
                                <option
                                        @foreach($store->categories as $categoryStore)
                                        {{  $category->id ==  $categoryStore->id ?'selected' :'' }}
                                        @endforeach
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <span class="ml-4" style="color: red">{{ $errors->first('categories') }}</span>

                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>عنوان المخزن</label>
                        <input value="{{ $store->address }}" type="text" class="form-control" name="address"  data-rule-required="true"
                               placeholder="ادخل عنوان المخزن">
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

                    <div class="col-lg-6">
                        <label>تاريخ بداية التأجير</label>
                        <input   type="text" class="form-control" id="kt_datepicker_1"
                               name="rental_date" readonly="" placeholder="اختر تاريخ بداية التأجير"  data-rule-required="true" >
                        <span class="ml-4" style="color: red">{{ $errors->first('rental_date') }}</span>

                    </div>

                    <div class="col-lg-6">
                        <label>مدة التأجير </label>
                        <select
                            class="selecte2" name="duration_of_the_rental"  data-rule-required="true" >
                            <option >___________</option>
                            <option {{ $store->duration_of_the_rental ==1 ?'selected':'' }}  value="1">سنوي</option>
                            <option  {{ $store->duration_of_the_rental ==2 ?'selected':'' }} value="2">شهري</option>
                        </select>
                        <span class="ml-4" style="color: red">{{ $errors->first('duration_of_the_rental') }}</span>

                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>قيمة الأجار سنوياً</label>
                        <input value="{{ $store->rental_salary }}" type="text" class="form-control" name="rental_salary"  data-rule-required="true"
                               placeholder="ادخل قيمة الأجار سنوياً"  data-rule-required="true" >
                        <span class="ml-4" style="color: red">{{ $errors->first('rental_salary') }}</span>

                    </div>

                </div>
                <div class="form-group row">
                        <label>حالة المخزن</label>

                            <div class="kt-radio-inline"  data-rule-required="true">
                                <br>
                                <label class="kt-radio">
                                    <input type="radio" value="1" {{ $store->status ==1 ?'checked':'' }} name="status"> نشط
                                    <span></span>
                                </label>
                                <label class="kt-radio">
                                    <input type="radio" value="2"  {{ $store->status ==2 ?'checked':'' }} name="status"> مغلق
                                    <span></span>
                                </label>
                            </div>

                </div>
                <span class="ml-4" style="color: red">{{ $errors->first('status') }}</span>

            </div>


            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>


        {{--<div class="alert alert-primary mt-3 mr-4 ml-4 " role="alert">--}}
        {{--<div class="alert-text ">يجب اولاً اضافة اقسام لتتمكن من اضافة موردين</div>--}}
        {{--</div>--}}

    </div>




@endsection
