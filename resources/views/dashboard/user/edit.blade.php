@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الموظفين
                </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('dashboard.category.index') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('dashboard.category.index') }}" class="kt-subheader__breadcrumbs-link">
                        الموظفين </a>
                </div>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        تعديل موظفين </a>
                </div>
            </div>

        </div>
    </div>



    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    تعديل معلومات الموظف
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{route('dashboard.user.update',$user->id)  }}" class="validate" method="post" >
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>اسم الموظف بالكامل</label>
                        <input value="{{$user->name  }}" type="text" class="form-control" name="name" placeholder="ادخل اسم الموظف بالكامل" data-rule-required="true" >
                        <span class="ml-4" style="color: red">{{  $errors->first('name') }}</span>
                    </div>

                    <div class="col-lg-6">
                        <label class="">ادخل رقم الاتصال كاملا</label>
                        <input value="{{$user->phone  }}" type="text" class="form-control" name="phone" placeholder="ادخل رقم الاتصال كاملا" data-rule-required="true"  data-rule-number="true" >
                        <span class="ml-4" style="color: red">{{  $errors->first('phone') }}</span>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>ادخل عنوان الموظف كاملا</label>
                        <div class="kt-input-icon">
                            <input value="{{$user->address  }}" type="text" name="address" class="form-control" placeholder="ادخل عنوان الموظف كاملا" data-rule-required="true" >
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                        </div>
                        <span class="ml-4" style="color: red">{{  $errors->first('address') }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label class="">ادخل البريد الاكتروني </label>
                        <div class="kt-input-icon">
                            <input value="{{$user->email  }}" type="text" name="email" class="form-control" placeholder="ادخل البريد الاكتروني" data-rule-required="true" data-rule-email="true" >
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span class="input-group-text">@</span></span>
                        </div>
                        <span class="ml-4" style="color: red">{{  $errors->first('email') }}</span>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>الدور و الصلاحيات</label>
                        <div class="kt-radio-inline">
                            @foreach($roles as $role)

                                <label class="kt-radio kt-radio--solid" >
                                    <input data-rule-required="true"  type="radio" {{ $user->hasRole($role->name) ? 'checked' : '' }} name="role"  value="{{ $role->name }}"> {{ $role->name }}
                                    <span></span>
                                </label>
                            @endforeach
                                <span class="ml-4" style="color: red">{{  $errors->first('role') }}</span>


                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>







@endsection