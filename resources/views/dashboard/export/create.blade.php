@extends('dashboard.layout.app')
@section('content')


    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">اضافة طلبية جديدة</h3>
            </div>
        </div>


        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        اضافة طلبية جديدة </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a class="kt-subheader__breadcrumbs-link">
                            اضافة طلبية جديدة</a>
                    </div>
                </div>
            </div>
        </div>


        <form class="kt-form validate" method="post" action="{{ route('dashboard.export.store') }}">
            <div class="kt-portlet__body">
                <div class="kt-form__section kt-form__section--first">

                    <div class="form-group row">

                        <div class="col-lg-4">
                            <label>اسم الزبون :</label>
                            <div class="typeahead">
                                <input dir="rtl" type="text" class="form-control customer_name" id="customer_name" name="customer[name]"
                                       required placeholder="مثال : محمد محمود احمد">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label>ادخل رقم الهاتف</label>
                            <input type="text" class="form-control phone" name="customer[phone]" data-rule-required="true"
                                   data-rule-number="true" placeholder="مثال: 059211707">
                        </div>

                        <div class="col-lg-4">
                            <label>العنوان كاملاً</label>
                            <input type="text" class="form-control address" name="customer[address]" data-rule-required="true"
                                   placeholder="شمال قطاع غزة">
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
                                    <option value="{{ $store_name->id}}">{{ $store_name->name }}</option>
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
                            <textarea class="form-control" name="order[notes]" placeholder="ادخل أي ملاحظات"></textarea>
                        </div>
                    </div>


                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                    <div id="kt_repeater_1">

                        <div class="form-group form-group-last row" id="kt_repeater_1--">
                            <label class="col-lg-2 col-form-label">الطلبية</label>
                            <div data-repeater-list="products" class="col-lg-10">
                                <div data-repeater-item="" class="form-group row align-items-center item">
                                    <div class="col-md-3">
                                        <div class="kt-form__group--inline">
                                            <div class="kt-form__label">
                                                <label>المنتج</label>
                                            </div>
                                            <div class="kt-form__control">
                                                <select class="selecte2 form-control import_id" name="import_id"
                                                        data-rule-required="true">
                                                    <option value="">اختر</option>
                                                    quantity
                                                    @foreach($products as $product)
                                                        <option data-price="{{$product->product->price_by_piece}}"
                                                                value="{{ $product->product->id}}">{{ $product->product->product_name }}
                                                            [الكمية = {{$product->quantity}} ]
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
                                                <input disabled="disabled" type="text" class="form-control quantity"
                                                       name="quantity"
                                                       data-rule-required="true" data-rule-number="true"
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
                                                       placeholder="السعر المطلوب" value="0">
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

                <div  class="col-md-2 ml-auto mr-4">

                    <h4 style="display: inline-block">المبلغ الاجمالي :</h4>
                    <div class="input-group">

                        <input readonly type="text"   name="order[total_price]"  class="form-control total">
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
        $('#kt_datetimepicker_3').datetimepicker({
            todayHighlight: true,
            autoclose: true,
            pickerPosition: 'bottom-left',
            todayBtn: true,
            format: 'yyyy-mm-dd hh:ii'
        });
        // Class definition
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
        }();
        $(document).ready(function () {
            KTFormRepeater.init();
            $(document).on('keyup change', '.item .quantity', function () {
                var parent = $(this).closest('.item'), quntity = parseInt($(this).val()),
                    price_by_piece = parent.find('select.import_id option:selected').data('price');
                parent.find('.price').val(quntity * price_by_piece);
                calcTotal()
            });


            var customer = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch:
                    {
                        url: '/cache/customer.json',
                        cache: false
                    }
            });
            $('.customer_name').typeahead(null, {
                name: 'customer_name',
                source: customer
            });
            $(document).on('change', '.item .import_id', function () {
                var parent = $(this).closest('.item');
                if (parent.find('.import_id').prop(':selected', true)) {
                    var value = $(this).val();
                    if (value === '') {
                        parent.find('.quantity').attr('disabled', 'disabled')
                    } else {
                        parent.find('.quantity').removeAttr('disabled', 'disabled')
                    }
                }
            });

            $(document).on('typeahead:selected' , '#customer_name' , function () {

            var name= $(this).val();

            $.ajax({
            type:'Get' ,
            url:"{{ route('dashboard.export.create') }}" ,
            data:{
            name:name
            },
            success:function (data)
            {
            $('.phone').val(data.data.phone)
            $('.address').val(data.data.address)

            }
            })
            });

            $(document).on('click' , '.add' , function (){

                console.log('in the buton')
                var channel = pusher.subscribe('order-noty');
                channel.bind('App\\Events\\OrderReceivedeNoty', function(data) {
                    alert(data)
                });
            })



        });

        function calcTotal() {
            var price = 0;
            $.each($('.item .price'), function () {
                price += parseFloat($(this).val());
            });
            $('.total').val(price);
        }


    </script>
@endsection
