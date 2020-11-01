@extends('dashboard.layout.app')
@section('content')



    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>

            <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">

                <!--begin:: Widgets/Applications/User/Profile1-->
                <div class="kt-portlet ">
                    <div class="kt-portlet__head  kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                <i class="flaticon-more-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-y">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-1">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img
                                        src="https://www.xovi.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                                        alt="image">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <p style="font-size: 16px;font-weight: bold" class="kt-widget__username">
                                            {{ $customer->name }}
                                            <i class="flaticon2-correct kt-font-success"></i>
                                        <p>
                                        <span style="font-size: 13px;font-weight: bold; color: white"
                                              class="kt-widget__subtitle badge badge-info">
																قسم الزبائن
															</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__items">
                                    <br>
                                    <br>
                                    <a
                                        class="kt-widget__item kt-widget__item customer_info">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                                         class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<polygon
                                                                                points="0 0 24 0 24 24 0 24"></polygon>
																			<path
                                                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3"></path>
																			<path
                                                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                                fill="#000000"
                                                                                fill-rule="nonzero"></path>
																		</g>
																	</svg> </span>
																<span style="font-weight: bold;font-size: 16px"
                                                                      class="kt-widget__desc">
																	المعلومات الشخصية
																</span>
															</span>
                                    </a>
                                    <a data-id="{{$customer->id}}"
                                       href="{{url('dashboard/customer/order' , $customer->id)}}"
                                       class="kt-widget__item customer_order">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                                         class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<path
                                                                                d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                                                fill="#000000" opacity="0.3"></path>
																			<path
                                                                                d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                                                fill="#000000"></path>
																		</g>
																	</svg> </span>
																<span style="font-weight: bold;font-size: 16px"
                                                                      class="kt-widget__desc">
																	الطلبيات
																</span>

														</span></a>
                                </div>
                            </div>
                        </div>
                        <!--end::Widget -->

                    </div>
                </div>

                <!--end:: Widgets/Applications/User/Profile1-->
            </div>
            <!--End:: App Aside-->


            <!--Begin:: App Content-->
            <div class="personal-div kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">المعلومات الشخصية</h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-wrapper">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button"
                                                    class="btn btn-label-brand btn-sm btn-icon btn-icon-md"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon2-gear"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right">
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label style="font-weight: bold;font-size: 16px"
                                                       class="col-xl-3 col-lg-3 col-form-label">الاسم </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="{{ $customer->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label style="font-weight: bold;font-size: 16px"
                                                       class="col-xl-3 col-lg-3 col-form-label">رقم التواصل</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="la la-phone"></i></span></div>
                                                        <input type="text" class="form-control"
                                                               value="{{$customer->phone}}"
                                                               placeholder="Phone" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label style="font-weight: bold;font-size: 16px"
                                                       class="col-xl-3 col-lg-3 col-form-label">البريد
                                                    الالكتروني</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-location-arrow"></i>
                                                            </span></div>
                                                        <input type="text" class="form-control"
                                                               value="{{$customer->address}}" placeholder="Email"
                                                               aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End:: App Content-->


            <!--Begin:: App Content-->
            <div class="order-div kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">الطلبيات</h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-wrapper">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button"
                                                    class="btn btn-label-brand btn-sm btn-icon btn-icon-md"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon2-gear"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 ">
                                <label style="font-size: 15px ; font-weight: bold" class="col-form-label ml-3 col-lg-2">ادخل
                                    رقم الطلبية</label>
                                <div class="col-2">
                                    <input type="text" class="form-control search">
                                </div>
                            </div>

                            <div class="m-invoice-2">
                                <div class="m-invoice__wrapper" id="main">
                                    <table class="table text-center">
                                        <tbody>
                                        <tr>
                                            <td><img src="https://admin.124.im/uploads/images/2018/09/fFr6d.png"
                                                     width="150"></td>
                                            <td style="vertical-align: middle">
                                                <div>شركة أضواء البشير</div>
                                                <div>0599696395</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table class="table text-center">
                                        <tbody>
                                        <tr>
                                            <td>الرقم</td>
                                            <td>الموظف</td>
                                            <td>التاريخ</td>
                                        </tr>
                                        <tr>
                                            <td class="id"></td>
                                            <td class="user"></td>
                                            <td class="datetime"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered text-center products-table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">الصنف</th>
                                            <th class="text-center">كمية</th>
                                            <th class="text-center">السعر</th>
                                            <th class="text-center">المجموع</th>
                                        </tr>
                                        </thead>
                                        <tbody>

{{--                                        <tr>--}}
{{--                                            <td class="text-center product"></td>--}}
{{--                                            <td class="quantity">6.0</td>--}}
{{--                                            <td class="price">3.5</td>--}}
{{--                                            <td class="total_price">21</td>--}}
{{--                                        </tr>--}}
                                        </tbody>
                                        <tfoot style="border-top-width: 2px;">
                                        <tr>
                                            <th colspan="2"></th>
                                            <th class="text-center">المجموع</th>
                                            <th colspan="2" class="total">63</th>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End:: App Content-->


        </div>
        <!--End::App-->
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('assets/js/pages/dashboard.js') }} " type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('.order-div').hide()
            $('.m-invoice-2').hide()

            $('.customer_order').on('click', function (e) {
                e.preventDefault()
                $('.order-div').slideDown(1000)
                $('.personal-div').hide()
            })

            $('.customer_info').on('click', function (e) {
                e.preventDefault()
                $('.personal-div').slideDown(1000)
                $('.order-div').hide()
                $('.m-invoice-2').hide()

            })

            var id = $('.customer_order').data('id')

            $('.search').on('keyup', function () {

                var $export_id=$(this).val()
                if ($export_id === '')
                {
                    $('.m-invoice-2').hide()
                }
                $.ajax({

                    url: '{{ url('dashboard/customer/order')}}/' + id + '',
                    type: 'GET',
                    data: {
                        id :id ,
                        export_id:$export_id
                    },
                    success: function (data) {
                       let $obj=null
                        $.each(data , function ($k , $v){
                        $obj=$v
                        })
                       $.each($obj , function ($k , $v){
                           $('.products-table tbody').html('')
                           for (var i=0 ; i<$v.imports.length; i++){
                               $('.products-table tbody').append('<tr><td>' +
                                   $v.imports[i].product.product_name+ '</td>' +
                                   '<td> ' + $v.imports[i].pivot.quantity + '</td>'+
                                   '<td> ' + $v.imports[i].price_by_piece + '</td>'+
                                   '<td> ' + $v.imports[i].pivot.price + '</td>'+
                                   '</tr>')
                           }

                           $('.id').html('0000000'+$v.id)
                           $('.user').html($v.user.name)
                           $('.datetime').html($v.dateTime)
                           $('.total').html($v.total_price)
                           $('.m-invoice-2').slideDown(1000)

                       })
                    }
                })

            })
        })

    </script>
@endsection
