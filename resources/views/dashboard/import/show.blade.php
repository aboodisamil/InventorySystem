<form action="{{route('dashboard.import.update' , $import->id)}}" method="post" class="validate" id="Editform">
    <div class="modal-body">
        @csrf
        @method('put')

        <div class="form-group row">

            <div class="col-lg-4">
                <label>اختر الصنف</label>
                <select name="category_id" class="form-control selecte2 category_id" data-rule-required="true">
                    <option value="">اختر</option>
                    @foreach($categories as $category)
                        <option
                            {{ $category->name ==$import->category->name ?'selected':'' }} value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-lg-4">
                <label>اختر المنتج</label>
                <select name="product_id" class="form-control selecte2 product">
                    <option value="">اختر</option>
                @foreach($products as $product)
                        <option {{ $product->product_name ==$import->product->product_name ?'selected':'' }}  value="">
                            {{ $product->product_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label>الكمية</label>
                <div class="input-group">
                    <input name="quantity" value="{{$import->quantity}}" data-rule-required="true" type="text"
                           class="form-control">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span id="unit">{{$import->product->unit->unit}}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row hidden ">
            <div class="col-lg-4">
                <label>عدد الصناديق</label>
                <div class="input-group">
                    <input name="num_of_box" value="{{$import->num_of_box}}" type="text" readonly
                           data-rule-required="true" class="form-control" id="box">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input class="enable1" type="checkbox">
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <label>عدد الرزم داخل كل صندوق</label>
                <div class="input-group">
                    <input name="num_of_package_in_box" value="{{$import->num_of_package_in_box}}"
                           data-rule-required="true" type="text" readonly class="form-control package" id="package">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input class="enable2" type="checkbox">
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <label>عدد القطع داخل كل رزمة</label>
                <div class="input-group">
                    <input name="num_of_Piece_in_package" value="{{$import->num_of_Piece_in_package}}" type="text"
                           data-rule-required="true" readonly id="piece" class="form-control piece">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input type="checkbox" class="enable3">
                            <span></span>
                        </span>
                    </div>

                </div>
            </div>


        </div>

        <div class="form-group row hidden  ">
            <div class="col-lg-4">
                <label>السعر جملة</label>
                <div class="input-group">
                    <input name="price_by_package" value="{{$import->price_by_package}}" type="text" readonly
                           data-rule-required="true" class="form-control price_package" id="price_by_package">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input class="enable4" type="checkbox">
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <label>السعر مفرق</label>
                <div class="input-group">
                    <input name="price_by_piece" value="{{$import->price_by_piece}}" type="text" required
                           class="form-control price_piece" id="price_by_piece">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input class="enable5" type="checkbox">
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <label>المصنوعية</label>
                <div class="input-group">
                    <input name="manufacturer" value="{{$import->manufacturer}}" type="text" value="صنع في الصين"
                           readonly data-rule-required="true" class="form-control" id="manufacturer">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input type="checkbox">
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>


        </div>


    </div>

    <div class="modal-footer">
        <span class="kt-switch kt-switch--icon mt-3">
            <label>
                <input type="checkbox" class="switch_form ">
                <span></span>
            </label>
        </span>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" id="add" class="btn btn-primary">اضافة</button>
    </div>
</form>
<script>
    $('.input-group input[type="checkbox"]').on('change', function () {
        if ($(this).is(":checked")) {
            $(this).closest('.input-group').find('input[type="text"]').removeAttr('readonly')
        } else {
            $(this).closest('.input-group').find('input[type="text"]').attr('readonly')
        }
    });
</script>
