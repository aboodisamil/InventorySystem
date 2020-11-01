<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item " aria-haspopup="true"><a href="{{  route('home')  }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-home"></i><span class="kt-menu__link-text">الرئيسية</span></a></li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">المستخدمين</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="kt-menu__item   {{ request()->is('dashboard/role*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-anchor"></i><span class="kt-menu__link-text">الادوار</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.role.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة الادوار</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.role.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض الادوار</span><i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="kt-menu__item  {{ request()->is('dashboard/user*') ?'kt-menu__item--open':'' }}   kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-user"></i><span class="kt-menu__link-text">الموظفين</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.user.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة الموظفين</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.user.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض الموظفين</span><i class=""></i></a>
                        </li>

                    </ul>
                </div>
            </li>







            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">المخزن</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>


            <li class="kt-menu__item  {{ request()->is('dashboard/category*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-list-alt "></i><span class="kt-menu__link-text">الأصناف</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.category.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة الأصناف</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.category.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض الأصناف</span><i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item {{ request()->is('dashboard/store*') ?'kt-menu__item--open':'' }}  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-store-alt "></i><span class="kt-menu__link-text">ادارة المخزن</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.store.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة مخازن</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.store.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض المخازن</span><i class=""></i></a>
{{--                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.location.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة قواطع المخزن</span><i class=""></i></a>--}}
{{--                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.location.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض قواطع المخزن</span><i class=""></i></a>--}}
                        </li>
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item   {{ request()->is('dashboard/supplier*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-industry "></i><span class="kt-menu__link-text">الموردين</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.supplier.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة الموردين</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.supplier.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض الموردين</span><i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="kt-menu__item   {{ request()->is('dashboard/unit') ?'kt-menu__item--open':'' }}  {{ request()->is('dashboard/product*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-cubes "></i><span class="kt-menu__link-text">المنتجات</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.unit.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض واضافة وحدات</span><i class=""></i></a>

                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.product.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة المنتجات</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.product.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض المنتجات</span><i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">المخزن</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="kt-menu__item  {{ request()->is('dashboard/import*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  fa fa-upload "></i><span class="kt-menu__link-text">الواردات</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.import.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة منتجات للمخزن</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.import.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">عرض المنتجات المتوفرة</span><i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item  {{ request()->is('dashboard/export*') ?'kt-menu__item--open':'' }} kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-shopping-cart"></i><span class="kt-menu__link-text">الطلبيات</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.export.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة طلبية</span><i class=""></i></a>
                        </li>
                    </ul>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.export.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">جميع الطلبيات</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.order.suspend')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">الطلبيات المعلقة</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.order.not-complete-order')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">الطلبيات الغير مكتملة</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.order.complete-order')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">الطلبيات المكتملة</span><i class=""></i></a>
                        </li>
                    </ul>


                </div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu {{ request()->is('dashboard/customer*') ?'kt-menu__item--open':'' }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-shopping-cart"></i><span class="kt-menu__link-text">الزبائن</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.customer.index')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">قائمة الزبائن</span><i class=""></i></a>
                        <li class="kt-menu__item  kt-menu__item--submenu" ><a href="{{ route('dashboard.customer.create')  }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">اضافة زبائن</span><i class=""></i></a>

                    </ul>


                </div>
            </li>





        </ul>
    </div>
</div>
