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
                        اضافة مورد </a>
                </div>
            </div>

        </div>
    </div>


    <div class="kt-portlet kt-portlet--mobile">
        @if(isset($category) && $category->count()>0)
            <form method="post" action="{{route('dashboard.supplier.store')}}" class="validate">
                <div class="kt-portlet__body">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label> شركة التوريد</label>
                            <input type="text" class="form-control"  data-rule-required="true"  name="supplier" placeholder="ادخل شركة التوريد">
                            <span class="ml-4" style="color: red">{{ $errors->first('supplier') }}</span>

                        </div>


                        <div class="col-lg-6">
                            <label> الأصناف الموردة</label>
                            <select name="categories[]" class="selecte2" multiple  data-rule-required="true" >
                                @foreach($category as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="ml-4" style="color: red">{{ $errors->first('categories') }}</span>

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>اسم المورد</label>
                            <input type="text" class="form-control" name="contact_person"  data-rule-required="true"
                                   placeholder="ادخل اسم المورد">
                            <span class="ml-4" style="color: red">{{ $errors->first('contact_person') }}</span>

                        </div>

                        <div class="col-lg-6">
                            <label>ادخل رقم التواصل</label>
                            <input type="text" class="form-control" name="phone" placeholder="ادخل رقم للتوصل مع المورد"  data-rule-required="true" >
                            <span class="ml-4" style="color: red">{{ $errors->first('phone') }}</span>

                        </div>


                    </div>

                </div>


                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </div>
            </form>

        @else

            <div class="alert alert-primary mt-3 mr-4 ml-4 " role="alert">
                <div class="alert-text ">يجب اولاً اضافة اقسام لتتمكن من اضافة موردين</div>
            </div>
        @endif

    </div>








@endsection
