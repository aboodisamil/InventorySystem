@extends('dashboard.layout.app')
@section('content')




    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Staff </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        Show Staff </a>
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
                    Staff Table
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('dashboard.user.create') }}" style="color: white" type="button"
                           class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> Add New
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
                    <input type="text" placeholder="Search To Staff" name="search" class="form-control" value="{{ old('name') }}">

                </div>

                    <div class="col-md-2">
                        <button type="submit" class="form-control btn btn-primary"><i class="la la-search"></i></button>
                    </div>

                </div>
            </form>
        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data"
             style="">

            @if(isset($users) && $users->count()>0)
                <table class="kt-datatable__table" style="display: block;">
                    <thead class="kt-datatable__head">
                    <tr class="kt-datatable__row" style="left: 0px;">
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">Staff ID</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">Staff Name</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">Staff Address</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">Staff Phone</span></th>
                        <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 133px;">Staff Role</span></th>

                        <th data-field="Actions" data-autohide-disabled="false"
                            class="kt-datatable__cell kt-datatable__cell--sort"><span
                                    style="width: 110px;">Actions</span></th>
                    </tr>
                    </thead>

                    <tbody class="kt-datatable__body">
                    @foreach($users as $index=> $user)

                        @if( $user->id != auth()->user()->id)

                            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                <td data-field="CompanyName" class="kt-datatable__cell"><span
                                            style="width: 133px;">  #{{ $index+1 }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$user->name  }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$user->address  }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            style="width: 130px;">{{$user->phone  }}</span></td>
                                <td data-field="Order ID" class="kt-datatable__cell"><span
                                            class="badge badge-info"   style="width: 140px; color: white; font-size: 14px">{{implode('-' , $user->roles->pluck('name')->toArray() )  }}</span></td>


                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                            <span style="overflow: visible; position: relative; width: 110px;">

                                <a title="Edit details" href="{{ route('dashboard.user.edit' , $user->id) }}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i   style="font-size: 30px"  class="la la-edit"></i>
                                </a>

                                <form  name="myForm"   style="display: inline-block"
                                       action="{{ route('dashboard.user.destroy' , $user->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete" type="submit"><i
                                                style="font-size: 30px"  class="la la-trash"></i></button>
                                </form>



                            </span>
                                </td>
                            </tr>


                        @endif

                    @endforeach
                    </tbody>
                </table>

            @endif


        </div>

        <!--end: Datatable -->
    </div>
    </div>
@endsection