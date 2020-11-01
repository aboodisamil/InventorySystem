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
                        اضافة موظفين </a>
                </div>
            </div>

        </div>
    </div>


    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   اضافة معلومات الموظف الجديد
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        {{--@if(isset($roles) && $roles->count()>0)--}}
            <form action="{{route('dashboard.user.store')  }}" method="post" class="validate" >
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>اسم الموظف بالكامل</label>
                            <div class="kt-input-icon">
                                <input value="{{old('name')  }}" type="text" class="form-control" name="name" placeholder="ادخل اسم الموظف بالكامل" data-rule-required="true" >
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-user"></i></span></span>
                            </div>
                            <span class="ml-4" style="color: red">{{  $errors->first('name') }}</span>
                        </div>

                        <div class="col-lg-6">
                            <label class="">ادخل رقم الاتصال كاملا</label>
                            <div class="kt-input-icon">
                            <input value="{{old('phone')  }}" type="text" class="form-control" name="phone" placeholder="ادخل ادخل رقم الاتصال كاملا" data-rule-required="true" data-rule-number="true" >
                            <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-phone"></i></span></span>
                            </div>
                            <span class="ml-4" style="color: red">{{  $errors->first('phone') }}</span>

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>ادخل عنوان الموظف كاملا</label>
                            <div class="kt-input-icon">
                                <input value="{{old('address')  }}" type="text" name="address" class="form-control" placeholder="ادخل ادخل عنوان الموظف كاملا" data-rule-required="true" >
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-search-location"></i></span></span>
                            </div>
                            <span class="ml-4" style="color: red">{{  $errors->first('address') }}</span>

                        </div>
                        <div class="col-lg-6">
                            <label class="">ادخل البريد الاكتروني </label>
                            <div class="kt-input-icon">
                                <input value="{{old('email')  }}" type="text" name="email" class="form-control" placeholder="ادخل  البريد الاكتروني " data-rule-required="true" data-rule-email="true">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-inbox"></i></span></span>
                            </div>
                            <span class="ml-4" style="color: red">{{  $errors->first('email') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>ادخل كلمة السر </label>
                            <div class="kt-input-icon">
                                <input id="password" type="password" name="password" class="form-control" placeholder="ادخل كلمة السر " data-rule-required="true">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-lock"></i></span></span>

                            </div>

                            <span class="ml-4" style="color: red">{{  $errors->first('password') }}</span>

                        </div>
                        <div class="col-lg-6">
                            <label class="">تأكيد كلمة السر </label>
                            <div class="kt-input-icon">
                                <input type="password" name="password_confirmation" class="form-control" data-rule-required="true" data-rule-equalTo="#password">
                                <span class="ml-4" style="color: red">{{  $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>صلاحيات و دور الموظف</label>
                            <div class="kt-radio-inline" data-rule-required="true" >
                                @foreach($roles as $role)

                                    <label class="kt-radio kt-radio--solid">
                                        <input type="radio" name="role"  value="{{ $role->id }}"> {{ $role->name }}
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
                                <button type="submit" class="btn btn-primary">اضافة</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        {{--@else--}}
            {{--<div class="alert alert-primary mt-3 mr-4 ml-4 " role="alert">--}}
                {{--<div class="alert-text ">يجب اضافة وظيفة اولا قبل اضافة موظفين</div>--}}
            {{--</div>--}}
            {{--@endif--}}

        <!--end::Form-->
    </div>







@endsection
