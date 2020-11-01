@extends('dashboard.layout.app')
@section('content')


    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">تعديل طلبية </h3>
            </div>
        </div>


        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        تعديل طلبية</h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a class="kt-subheader__breadcrumbs-link">
                            تعديل طلبية</a>
                    </div>
                </div>
            </div>
        </div>


        <form class="kt-form validate" method="post" action="{{ route('dashboard.export.update' , $order->id) }}">
           @method('put')
            <div class="kt-portlet__body">
                <div class="kt-form__section kt-form__section--first">

                    <div class="form-group row">

                        <div class="col-lg-4">
                            <label>اسم الزبون :</label>
                            <div class="typeahead">
                                <input dir="rtl" value="{{ $order->customer->name }}" type="text"
                                       class="form-control customer_name" id="customer_name" name="customer[name]"
                                       required placeholder="مثال : محمد محمود احمد">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label>ادخل رقم الهاتف</label>
                            <input type="hidden" name="customer[id]" value="{{$order->customer->id}}">
                            <input value="{{$order->customer->phone}}" type="text" class="form-control phone"
                                   name="customer[phone]" data-rule-required="true"
                                   data-rule-number="true" placeholder="مثال: 059211707">
                        </div>

                        <div class="col-lg-4">
                            <label>العنوان كاملاً</label>
                            <input type="text" class="form-control address" name="customer[address]"
                                   data-rule-required="true"
                                   value="{{$order->customer->address}}" placeholder="شمال قطاع غزة">
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-4">
                            <label>الوقت و التاريخ</label>
                            <div class="input-group date">
                                <input readonly type="text" class="form-control" name="order[dateTime]"
                                       value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}"
                                       id="kt_datetimepicker_3">
                                <div class="input-group-append">
                                    <span class="input-group-text">
															<i class="la la-calendar glyphicon-th"></i>
														</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label>الفرع</label>
                            <select class="form-control" name="order[store_id]" data-rule-required="true">
                                <option value="">اختر</option>
                                @foreach($store as $store_name)

                                    <option
                                        {{ $order->store->id == $store_name->id ? 'selected':'' }} value="{{ $store_name->id}}">{{ $store_name->name }}</option>
                                @endforeach
                            </select></div>

                        <div class="col-lg-4">
                            <label>الموظف</label>
                            <input type="text" readonly class="form-control" name="order[username]"
                                   value="{{ auth()->user()->name }}"
                                   data-rule-required="true">
                            <input type="hidden" class="form-control" name="order[user_id]"
                                   value="{{ auth()->user()->id }}"
                                   data-rule-required="true" data-rule-number="true">
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="col-lg-12">
                            <label>ملاحظات</label>
                            <textarea class="form-control" name="order[notes]"
                                      placeholder="ادخل أي ملاحظات">{{ $order->notes }}</textarea>
                        </div>
                    </div>

                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                    <div id="kt_repeater_1">

                        <div class="form-group form-group-last row" id="kt_repeater_1--">
                            <label class="col-lg-2 col-form-label">الطلبية</label>
                            <div data-repeater-list="products" class="col-lg-10">
                                @foreach($order->imports as $value)
                                    <div data-repeater-item="" class="form-group row align-items-center item">
                                        <div class="col-md-3">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label>المنتج</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <select class="form-control selecte2 import_id" name="import_id"
                                                            data-rule-required="true">
                                                        <option value="">اختر</option>
                                                        @foreach($products as $product)

                                                            <option data-price="{{$product->product->price_by_piece  }}"
                                                                    {{  $product->product->product_name == $value->product->product_name ? 'selected':''  }}
                                                                    value="{{ $product->product->id}}">
                                                                {{ $product->product->product_name  }}

                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label class="kt-label m-label--single">الكمية</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <input  type="text" class="form-control quantity"
                                                           name="quantity"
                                                           data-rule-required="true"
                                                           value="{{ $value->pivot->quantity }}" data-rule-number="true"
                                                           placeholder="ادخل الكمية المطلوبة">
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label class="kt-label m-label--single">السعر</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <input type="text" data-rule-required="true" name="price"
                                                           data-rule-number="true" class="form-control price" readonly

                                                           placeholder="السعر المطلوب" value="{{$value->pivot->price}}">
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:" data-repeater-delete=""
                                               class="btn-sm btn btn-label-danger btn-bold trash mt-4">
                                                <i class="la la-trash-o"></i>
                                                حذف
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group form-group-last row">
                            <label class="col-lg-2 col-form-label"></label>
                            <div class="col-lg-4">
                                <a href="javascript:" data-repeater-create=""
                                   class="btn btn-bold btn-sm btn-label-brand add">
                                    <i class="la la-plus"></i> اضافة
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @csrf


            <div class="form-group row">

                <div class="col-md-2 ml-auto mr-4">

                    <h4 style="display: inline-block">المبلغ الاجمالي :</h4>
                    <div class="input-group">

                        <input readonly type="text" value=" {{$order->total_price}}" name="order[total_price]"
                               class="form-control total">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-shekel-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-success add">طلب</button>
                            <button type="reset" class="btn btn-secondary">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
@endsection
@section('scripts')

    <script>

        $(document).ready(function (){

            var KTFormRepeater = function () {
                // Private functions
                var demo1 = function () {
                    $('#kt_repeater_1').repeater({
                        initEmpty: false,
                        show: function () {
                            $(this).slideDown();
                            $('.selecte2').select2({
                                language: 'ar'
                            })
                        },
                        hide: function (deleteElement) {
                            $(this).remove();
                            calcTotal();
                        }
                    });
                };
                return {
                    init: function () {
                        demo1();
                    }
                };
            }()
            KTFormRepeater.init();

            $(document).on('change', '.item .import_id', function () {
                var parent = $(this).closest('.item');
                if (parent.find('.import_id').prop(':selected', true)) {
                    var value = $(this).val();
                    if (value === '') {
                        parent.find('.quantity').attr('readonly', 'readonly')
                    } else {
                        parent.find('.quantity').removeAttr('readonly', 'readonly')
                    }
                }
            });

            function calcTotal() {
                var price = 0;
                $.each($('.item .price'), function () {
                    price += parseFloat($(this).val());
                });
                $('.total').val(price);
            }
            $(document).on('keyup change', '.item .quantity', function () {
                var parent = $(this).closest('.item'), quntity = parseInt($(this).val()),
                    price_by_piece = parent.find('select.import_id option:selected').data('price');
                parent.find('.price').val(quntity * price_by_piece);
                calcTotal()
            });

        })

    </script>
@endsection
