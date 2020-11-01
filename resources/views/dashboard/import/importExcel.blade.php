<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h4 style="text-align: center">عرض لجميع المنتجات المتوفرة داخل المخزن</h4>
<table border="1" style="text-align: center; " class="table table-bordered">

    <tr>
        <td>#</td>
        <td>المنتج</td>
        <td>الكمية</td>
        <td>عدد الصناديق</td>
        <td>عدد الرزم</td>
        <td>عدد القطع</td>
        <td>السعر جملة</td>
        <td>السعر مفرق</td>
    </tr>

    @foreach($data as $index=> $import)
    <tr>
        <td>{{ $index+=1 }}</td>
        <td>{{ $import->product->product_name  }}</td>
        <td>{{ $import->quantity  }}</td>
        <td>{{ $import->num_of_box }}</td>
        <td>{{ $import->num_of_package_in_box }}</td>
        <td>{{ $import->num_of_Piece_in_package }}</td>
        <td>{{ $import->price_by_package }}</td>
        <td>{{ $import->price_by_piece }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>