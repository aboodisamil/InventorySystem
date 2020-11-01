@extends('dashboard.layout.app')
@section('content')

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الأدوار
                </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('dashboard.category.index') }}" class="kt-subheader__breadcrumbs-home"><i
                                class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('dashboard.role.index') }}" class="kt-subheader__breadcrumbs-link">
                        الأدوار </a>
                </div>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        تعديل الأدوار </a>
                </div>
            </div>

        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">

        <form method="post" action="{{route('dashboard.role.update' , $role->id)}}">
            <div class="kt-portlet__body">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $role->id }}">
                <div class="form-group">
                    <label>اسم الوظيفة</label>
                    <input type="text" class="form-control" value="{{ $role->name }}" name="name"
                           placeholder="Enter Role Name">
                    <span class="ml-4" style="color: red">{{  $errors->first('name') }}</span>

                </div>
            </div>

            @php

                $models=
                [
                'categories'=>'الفئات' , 'users'=> 'المستخدمين','roles'=>'الأدوار' , 'supplier'=>'الموردين'
                ];
                $permission=['create'=>'اضافة' ,'update'=>'تحديث' , 'delete'=>'حذف' ,'read'=>'عرض']
            @endphp
            <div class="form-group ml-5">

                <div class="kt-portlet__head-label">

                    <h5 class="kt-portlet__head-title">
                        الصلاحيات
                    </h5>
                </div>

                <div class="row">
                    @foreach($models as  $indexModel=>$model)

                        <div class="col-md-4 mt-4 mb-2">
                            <label>{{ $model }}</label>
                            <div class="kt-checkbox-list">
                                @foreach($permission as $index=>$permissions)
                                    <label class="kt-checkbox">
                                        <input {{ $role->hasPermission($index.'_'.$indexModel) ?'checked':'' }} name="permissions[]" value="{{ $index.'_'.$indexModel }}" type="checkbox"> {{  $permissions.' '.$model }}
                                        <span></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                    @endforeach

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