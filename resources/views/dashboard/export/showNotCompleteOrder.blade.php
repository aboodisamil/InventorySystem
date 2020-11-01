<form id="updateNotCompleteOrder" method="post" action="{{url('dashboard/order/update-not-complete-order' , $order->id)}}">

    @csrf
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">المنتج</th>
            <th scope="col">الكمية المطلوبة</th>
            <th scope="col">الكمية المصروفة</th>
            <th scope="col">الكمية المتبقية</th>
            <th scope="col">صرف الكمية المتبقية</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->imports as $index=> $order)
            {{--@foreach($quantity as $order_quantity)--}}
            <tr>
                <td><input type="checkbox" style="width: 14px; height: 14px" value="1" name="order[{{$index}}][status]"
                           class="form-control"></td>
                <td>{{$order->product->product_name}}</td>
                <input type="hidden" name="order[{{$index}}][product_id]" value="{{$order->product->id}}">
                <input type="hidden" name="order[{{$index}}][quantity]" value="{{$order->pivot->quantity}}">
                <input type="hidden" name="order[{{$index}}][export_id]" value="{{$order->pivot->export_id}}">
                <input type="hidden" name="order[{{$index}}][old_spent_quantity]" value="{{$order->pivot->spent_quantity}}">
                <input type="hidden" name="order[{{$index}}][rest_quantity]" value="{{$order->pivot->quantity - $order->pivot->spent_quantity}}">

                {{--<td >{{$order_quantity->quantity}}</td>--}}
                <td>{{$order->pivot->quantity}}</td>
                <td>{{$order->pivot->spent_quantity}}</td>
                <td>{{$order->pivot->quantity - $order->pivot->spent_quantity}}</td>
                <td>
                    <input value="{{$order->pivot->quantity - $order->pivot->spent_quantity}}" type="text" name="order[{{$index}}][spent_quantity]" style="width: 40px ; height: 20px">
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
