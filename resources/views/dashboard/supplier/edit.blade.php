@extends('dashboard.layout.app')
@section('content')

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الموردين
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        تعديل مورد </a>
                </div>
            </div>

        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">

        <form method="post" class="validate" action="{{route('dashboard.supplier.update' ,$supplier->id)}}">
            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $supplier->id }}">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label> شركة التوريد</label>
                        <input type="text" class="form-control" value="{{$supplier->supplier  }}" name="supplier"
                               placeholder="ادخل  شركة التوريد" data-rule-required="true">
                        <span class="ml-4" style="color: red">{{ $errors->first('supplier') }}</span>

                    </div>


                    <div class="col-lg-6">
                        <label>الأصناف الموردة</label>
                        <select name="categories[]" class="selecte2" multiple data-rule-required="true">
                            @foreach($category as $category)
                                <option
                                        @foreach( $supplier->categories as $categorySupplier )
                                        {{ $category->name == $categorySupplier->name ?'selected':''  }}
                                        @endforeach
                                        value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <span class="ml-4" style="color: red">{{ $errors->first('categories') }}</span>

                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>اسم المورد</label>
                        <input type="text" class="form-control" value="{{ $supplier->contact_person }}"
                               name="contact_person" placeholder="ادخل اسم المورد" data-rule-required="true">
                        <span class="ml-4" style="color: red">{{ $errors->first('contact_person') }}</span>

                    </div>

                    <div class="col-lg-6">
                        <label>ادخل رقم التواصل</label>
                        <input type="text" class="form-control" value="{{$supplier->phone}}" name="phone"
                               placeholder="ادخل رقم التواصل" data-rule-number="true" data-rule-required="true">
                        <span class="ml-4" style="color: red">{{ $errors->first('phone') }}</span>

                    </div>


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
