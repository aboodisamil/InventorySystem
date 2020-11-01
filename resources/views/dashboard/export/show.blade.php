<form id="suspendForm" method="post" action="{{url('dashboard/order/suspendedit' , $export->id)}}">

    @csrf
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">المنتج</th>
            <th scope="col">الكمية المطلوبة</th>
            {{--<th scope="col">الكمية المتوفرة</th>--}}
            <th scope="col">الكمية المصروفة</th>
        </tr>
        </thead>
        <tbody>
        @foreach($export->imports as $index=> $order)
            {{--@foreach($quantity as $order_quantity)--}}
            <tr>
                <td><input type="checkbox" style="width: 14px; height: 14px" value="1" name="order[{{$index}}][status]"
                           class="form-control"></td>
                <td>{{$order->product->product_name}}</td>
                <input type="hidden" name="order[{{$index}}][product_id]" value="{{$order->product->id}}">
                <input type="hidden" name="order[{{$index}}][quantity]" value="{{$order->pivot->quantity}}">
                <input type="hidden" name="order[{{$index}}][export_id]" value="{{$order->pivot->export_id}}">

                {{--<td >{{$order_quantity->quantity}}</td>--}}
                <td>{{$order->pivot->quantity}}</td>
                <td>
                    <input type="text" name="order[{{$index}}][spent_quantity]" style="width: 40px ; height: 20px">
                </td>
            </tr>
        @endforeach
        {{--@endforeach--}}
        </tbody>
    </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
            اغلاق
        </button>
        <button type="submit" class="btn btn-primary save font-weight-bold">حفظ</button>
    </div>

</form>
