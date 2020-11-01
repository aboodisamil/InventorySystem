@extends('dashboard.layout.app')
@section('content')



    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الأصناف
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        تعديل الأصناف</a>
                </div>
            </div>

        </div>
    </div>


    <div class="kt-portlet kt-portlet--mobile">

        <form method="post" action="{{route('dashboard.category.update' , $category->id)}}" class="validate">
            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="form-group">
                    <label>اسم الصنف</label>
                    <input type="text" class="form-control" value="{{$category->name  }}" name="name" placeholder="ادخل اسم التصنيف" data-rule-required="true">
                    <span class="ml-4" style="color: red">{{ $errors->first('name') }}</span>

                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>

    </div>
@endsection
