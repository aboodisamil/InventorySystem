<!DOCTYPE html>
<!-- saved from url=(0108)https://admin.124.im/print/fill/3124514?fbclid=IwAR3VuZfrc5ZF7aDQsR7PKiv2JqbHccUqpKHD_7-O1lVwD2316rx2rHXsfl4 -->
<html lang="en" direction="rtl" style="direction: rtl;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

{{--    <title>شركة الحلو للبترول | لوحة التحكم</title>--}}
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./شركة الحلو للبترول _ لوحة التحكم_files/bootstrap.min.css">
    <style>
        body * {
            font-family: Arial !important;
            color: #000000 !important;
            font-size: 4mm !important;
            font-weight: bold;
        }


        html, body {
            padding: 0mm;
            margin: 0mm;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__head .m-invoice__container .m-invoice__logo {
            padding-top: 22px;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__head .m-invoice__container .m-invoice__desc {
            padding: 1rem 0 22px 0;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__head .m-invoice__container .m-invoice__items {
            padding: 5px 0 0 0;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__body.m-invoice__body--centered {
            width: 100%;
            padding: 0;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__footer {
            background-color: #ffffff;
        }

        #main {
            width: 72mm;
            /*height: 5mm;*/
            /*border: solid 0.1mm #000000;*/
        }

        table tr td:first-child, table tr td:nth-child(2) {
            width: 50%;
        }

        .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > td, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > thead > tr > th {
            white-space: unset;
        }

        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 5px;
        }
        .table:not(.table-bordered) > tbody > tr > td, .table:not(.table-bordered) > tbody > tr > th, .table:not(.table-bordered) > tfoot > tr > td, .table:not(.table-bordered) > tfoot > tr > th, .table:not(.table-bordered) > thead > tr > td, .table:not(.table-bordered) > thead > tr > th {
            border: none;
        }

        .m-invoice-2 .m-invoice__wrapper .m-invoice__head .m-invoice__container .m-invoice__logo,
        .m-invoice-2 .m-invoice__wrapper .m-invoice__head .m-invoice__container .m-invoice__desc {
            margin: 0;
            padding: 0;
        }

        hr {
            margin-top: 5px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px solid #000;
        }

        table {
            margin-bottom: 0 !important;
        }

    </style>
    <style type="text/css" data-asas-style="">body, div, a, p, span{ user-select: text !important; }p, h1, h2, h3, h4, h5, h6{ cursor: auto; user-select: text !important; }::selection{ background-color: #338FFF !important; color: #fff !important; }</style></head>
<body>

<div class="m-invoice-2">
    <div class="m-invoice__wrapper" id="main">
        <table class="table text-center">
            <tbody>
            <tr>
                <td><img src="https://admin.124.im/uploads/images/2018/09/fFr6d.png" width="150"></td>
                <td style="vertical-align: middle">
                    <div>شركة أضواء البشير</div>
                    <div>0599696395</div>
                </td>
            </tr>
            </tbody>
        </table>
        <hr>
        <table class="table text-center">
            <tbody>
            <tr >
                <td>فاتورة طلبية:  000000{{ $export->id }}</td>
            </tr>
            <tr>
                <td> الزبون : {{ $export->customer->name }}</td>
            </tr>
            <tr>
                <td>التاريخ: {{$export->dateTime}}</td>

            </tr>
            </tbody>
        </table>
        <hr>
        <table class="table text-center">
            <tbody>
            <tr>

            </tr>
            </tbody>
        </table>
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th class="text-center" style="width: 10%;">م</th>
                <th class="text-center">المنتج</th>
                <th class="text-center">كمية</th>
                <th class="text-center">السعر</th>
                <th class="text-center">المجموع</th>
            </tr>
            </thead>
            <tbody>
            @foreach($export->imports as $index=>$order)
                <tr>
                    <td style="width: 11%;">{{$index+=1}}</td>
                    <td class="text-right">{{$order->product->product_name}}</td>
                    <td>{{$order->pivot->quantity}}</td>
                    <td>{{$order->product->price_by_piece}}</td>
                    <td>{{$order->pivot->price}}</td>
                </tr>
            @endforeach


            </tbody>
            <tfoot style="border-top-width: 2px;">
            <tr>
                <th colspan="2"></th>
                <th class="text-center">المجموع</th>
                <th colspan="2" class="text-center">{{$export->total_price}}</th>
            </tr>
            </tfoot>
        </table>
        <div class="m-invoice__footer" style="margin-top: 20px;">
            <div class="m-invoice__item text-center">
                <span class="m-invoice__subtitle">العنوان: </span>
                <span class="m-invoice__text">النصر - بالقرب من مدرسة النصر </span>
                <br>
                <span class="m-invoice__subtitle">المحاسب: </span>
                <span class="m-invoice__text">{{auth()->user()->name  }}</span>
            </div>
        </div>
    </div>
</div>

</body></html>
