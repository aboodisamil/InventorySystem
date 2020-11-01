@extends('dashboard.layout.app')
@section('content')



    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    المنتجات
                </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('dashboard.supplier.index') }}" class="kt-subheader__breadcrumbs-home"><i
                                class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('dashboard.supplier.index') }}" class="kt-subheader__breadcrumbs-link">
                        المنتجات </a>
                </div>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        تعديل منتج </a>
                </div>
            </div>

        </div>
    </div>


    @include('dashboard.layout._errors')
    <div class="kt-portlet kt-portlet--mobile">

        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    تعديل منتج
                </h3>
            </div>
        </div>
        <form method="post" action="{{route('dashboard.product.update' , $product->id)}}" class="validate">
            <input type="hidden" name="id" value="{{ $product->id}}">
            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>اختر نوع الصنف</label>
                        <select name="category_id" class="selecte2 category" data-rule-required="true">
                            <option value="">فرع نوع الصنف</option>

                            @foreach($categories as $category)
                                <option {{ $category->id ==$product->category->id ? 'selected':'' }} value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-lg-4">
                        <label>ادخل اسم المنتج</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-cube "></i></span>
                            </div>
                            <input value="{{$product->product_name}}" type="text" class="form-control"
                                   name="product_name" data-rule-required="true" placeholder="مثال : أجهزة كهربائية">
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <label>ادخل عدد الصناديق</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="fa fa-box "></i></span></div>
                            <input value="{{$product->num_of_box}}" type="text" class="form-control"
                                   data-rule-required="true" data-rule-number="true" name="num_of_box"
                                   placeholder="مثال : 230">
                        </div>
                    </div>

                </div>


                <div class="form-group row">


                    <div class="col-lg-4">
                        <label>ادخل عدد الرزم داخل كل صندوق</label>
                        <input value="{{$product->num_of_package_in_box}}" type="text" class="form-control"
                               name="num_of_package_in_box" data-rule-required="true" data-rule-number="true"
                               placeholder="مثال : 100">
                    </div>

                    <div class="col-lg-4">
                        <label>ادخل عدد القطع داخل كل رزمة</label>
                        <input value="{{$product->num_of_Piece_in_package}}" type="text" class="form-control"
                               name="num_of_Piece_in_package" data-rule-required="true" data-rule-number="true"
                               placeholder="مثال : 500">
                    </div>


                    <div class="col-lg-4">
                        <label>ادخل السعر بالجملة</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="fa fa-shekel-sign"></i></span></div>
                            <input value="{{$product->price_by_package}}" type="text" class="form-control"
                                   placeholder="العملة شيكل" data-rule-required="true" data-rule-number="true"
                                   name="price_by_package" aria-describedby="basic-addon1">
                        </div>
                    </div>

                </div>


                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>ادخل السعر مفرق</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="fa fa-shekel-sign"></i></span></div>
                            <input value="{{$product->price_by_piece}}" type="text" class="form-control"
                                   name="price_by_piece" data-rule-required="true" data-rule-number="true"
                                   placeholder="العملة شيكل">
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <label>ادخل معلومات المصنوعية</label>
                        <input value="{{$product->manufacturer}}" type="text" class="form-control" name="manufacturer"
                               data-rule-required="true"
                               placeholder="مثال : صنع في الصين">
                    </div>

                    <div class="col-lg-4">
                        <label> ادخل الوحدة</label>
                        <select name="unit_id" class="selecte2" data-rule-required="true">
                            <option value="">اختر الوحدة</option>
                            @foreach($units as $unit)
                                <option {{$unit->id == $product->unit->id ?'selected':''}} value="{{ $unit->id  }}">{{ $unit->unit }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                {{--<div class="form-group row">--}}
                {{--<div class="col-lg-6">--}}
                {{--<label>اختر مكان المنتج بالنسبة للقاطع الرئيسي</label>--}}
                {{--<select name="categories" class="selecte2" >--}}
                {{--<option value="">اختر</option>--}}
                {{--@foreach($locations as $location)--}}
                {{--<option value="{{ $location->id }}">{{$location->section}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}

                {{--<div class="col-lg-6">--}}
                {{--<label>اختر مكان المنتج بالنسبة للقاطع الفرعي</label>--}}
                {{--<select name="categories" class="selecte2" >--}}
                {{--<option value="">اختر</option>--}}
                {{--@foreach($locations as $location)--}}
                {{--<option value="{{ $location->id }}">{{$location->subsection}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}


                {{--</div>--}}

                <div class="form-group row">
                    {{--<div class="col-lg-6">--}}
                    {{--<label>اختر مكان المنتج بالنسبة للرف</label>--}}
                    {{--<select name="categories" class="selecte2" >--}}
                    {{--<option value="">اختر</option>--}}
                    {{--@foreach($locations as $location)--}}
                    {{--<option value="{{ $location->id }}">{{$location->shelf}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}


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

