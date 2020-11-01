@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الموردين </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        عرض الموردين </a>
                </div>
            </div>

        </div>
    </div>



    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-list"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                  عرض جدول الموردين
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.supplier.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> اضافة جديد
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <form action="" method="get">
                <div class="row">

                    <div class="col-md-4">
                        <input type="text" placeholder="بحث باسم المورد" name="search" class="form-control"
                               value="{{ old('name') }}">

                    </div>

                    <div class="col-md-1">
                        <button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>
                    </div>

                </div>
            </form>
            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-portlet__body">

            <div class="kt-section">

                <div class="kt-section__content">


                @if(isset($suppliers) && $suppliers->count()>0)

                    <table class="table table-bordered" >
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center" style="font-size: 16px; font-weight: bold ; width: 340px">شركة التوريد</th>
                            <th class="text-center" style="font-size: 16px; font-weight: bold">اسم المورد</th>
                            <th class="text-center" style="font-size: 16px; font-weight: bold">العمليات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($suppliers as $index=> $supplier)
                            <tr>
                                <td style="font-size: 14px" class="text-center">#{{ $index+1 }}</td>
                                <td style="font-size: 16px" class="text-center">{{$supplier->supplier}}</td>
                                <td style="font-size: 16px" class="text-center">{{$supplier->contact_person }}</td>


                                <td class="text-center">

                                <!-- Button trigger modal -->
                                <a type="button"
                                   href="{{route('dashboard.supplier.show' , $supplier->id)}}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md btn-getdate supplier" data-toggle="modal" data-target="#exampleModal">
                                   <i style="font-size: 25px" class="la la-eye"></i>
                                </a>



                                <a title="Edit details" href="{{ route('dashboard.supplier.edit' , $supplier->id) }}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i style="font-size: 25px" class="la la-edit"></i>
                                </a>

                                <form name="myForm" style="display: inline-block"
                                      action="{{ route('dashboard.supplier.destroy' , $supplier->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button data-value="{{$supplier->id}}" id="delete"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i
                                                style="font-size: 25px" class="la la-trash"></i></button>
                                </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">معلومات المورد</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                        </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4" style="margin-right: 40px">
                        {{ $suppliers->appends(request()->query())->links() }}
                    </div>


                @endif
                </div></div>
            </div>

            <!--end: Datatable -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('.supplier').on('click' , function (e)
            {
                e.preventDefault();

                var that =$(this)
                var url=that.attr('href');
                $.ajax({
                    type:'GET' ,
                    url:url ,
                    success:function (data)
                    {
                        $('.modal-body').html(data);
                        $('#exampleModal').modal().show()
                    }
                })

            })


        })
    </script>

@endsection













