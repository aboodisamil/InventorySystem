@extends('dashboard.layout.app')
@section('content')





    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    أماكن المنتجات
                </h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('dashboard.location.index') }}" class="kt-subheader__breadcrumbs-home"><i
                                class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('dashboard.category.index') }}" class="kt-subheader__breadcrumbs-link">
                        أماكن المنتجات </a>
                </div>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                       اضافة أماكن المنتجات </a>
                </div>
            </div>

        </div>
    </div>


    @include('dashboard.layout._errors')

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    اضافة أماكن المنتجات
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form id="dynamic_form" action="{{ route('dashboard.location.store') }}" method="POST">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>ادخل فرع المخزن</label>
                        <select  name="store_id" class="selecte2">
                            <option value="0">Select</option>
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}">{{$store->name}}</option>
                            @endforeach
                        </select> <span class="form-text text-muted">ادخل فرع المخزن</span>
                    </div>

                    <div class="col-lg-4">
                        <label>ادخل نوع التصنيف</label>
                        <select id="select" name="category_id" class="selecte2">
                            <option value="0">Select</option>
                            @foreach($category as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select> <span class="form-text text-muted">ادخل نوع التصنيف</span>
                    </div>

                </div>

                <table class="kt-datatable__table" style="display: block;">
                    <thead class="kt-datatable__head">
                    <tr class="kt-datatable__row" style="left: 0px;">
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز القاطع الرئيسي</span>
                        </th>

                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز القاطع الفرعي</span>
                        </th>

                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">رمز الرف</span>
                        </th>

                    </thead>

                    <tbody id="tbody" class="kt-datatable__body">
                        <tr class="kt-datatable__row" style="left: 0px;">
                           @foreach($stores as $store)
                                <td class="kt-datatable__cell" >
                                    <input data-section="{{ $store->num_of_section }}" type="text" class="form-control" name="section[]" id="section">
                                </td>
                                <td class="kt-datatable__cell" >
                                    <input  data-subsection="{{ $store->num_of_subsection }}" type="text" class="form-control" name="subsection[]" id="subsection">
                                </td>

                                <td class="kt-datatable__cell" >
                                    <input  data-shelf="{{ $store->num_of_shelf }}" type="text" class="form-control" name="shelf[]" id="shelf">
                                </td>

                            @endforeach

                        </tr>

                        <!-- Modal -->

                    </tbody>
                </table>


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

        <!--end::Form-->
    </div>



@endsection



