<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">

<head>
    <base href="../../">
    <meta charset="utf-8"/>
    <title>شركة بشير غراب-للأدوات الكهربائية</title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
{{--<link href=" {{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css') }} " rel="stylesheet" type="text/css" />--}}

<!--end::Page Vendors Styles -->
@yield('style')

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/invoices/invoice-2.rtl.css') }} " rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('assets/css/skins/header/base/light.rtl.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/skins/header/menu/light.rtl.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/skins/brand/dark.rtl.css')  }} " rel="stylesheet" type="text/css"/>
    <link href="{{  asset('assets/css/skins/aside/dark.rtl.css') }} " rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }} "/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->

        <!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
             id="kt_aside">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="{{ route('home') }}">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }} "/>
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                           viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                                  fill="#000000" fill-rule="nonzero"
                                                  transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                  transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
										</g>
									</svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                   version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                  fill="#000000" fill-rule="nonzero"/>
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                  transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
										</g>
									</svg></span>
                    </button>

                    <!--
    <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
    -->
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
        @include('dashboard.layout._aside')
        <!-- end:: Aside Menu -->
        </div>

        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                <!-- begin:: Header Menu -->

                <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu"
                         class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                    </div>
                </div>

                <!-- end:: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">

                    <!--begin: Search -->

                    <!--begin: Search -->


                    <!--end: Search -->

                    <!--end: Search -->

                    <!--begin: Notifications -->
                    <div class="kt-header__topbar-item dropdown">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px"
                             aria-expanded="true">
									<span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
										<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                      fill="#000000" opacity="0.3"/>
												<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                      fill="#000000"/>
											</g>
										</svg> <span class="kt-pulse__ring"></span>
									</span>

                            <!--
        Use dot badge instead of animated pulse effect:
        <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span>
    -->
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
                            <form>

                                <!--begin: Head -->
                                <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b"
                                     style="background-image: url('{{asset('assets/media/misc/bg-1.jpg')}}')">
                                    <h3 class="kt-head__title">
                                        User Notifications
                                        &nbsp;
                                        <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
                                    </h3>
                                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab"
                                               href="#topbar_notifications_notifications" role="tab"
                                               aria-selected="true">Alerts</a>
                                        </li>

                                    </ul>
                                </div>

                                <!--end: Head -->
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="topbar_notifications_notifications"
                                         role="tabpanel">
                                        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll"
                                             data-scroll="true" data-height="300" data-mobile-height="200">

                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-drop kt-font-info"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        New user feedback received
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        8 hrs ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon-download-1 kt-font-danger"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        Finance report has been generated
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        25 hrs ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon-security kt-font-warning"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        New customer comment recieved
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        2 days ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-pie-chart kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        New customer is registered
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        3 days ago
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--end: Notifications -->

                    <!--begin: Quick Actions -->


                    <!--end: Quick Actions -->


                    <!--end: My Cart -->


                    <!--end: Quick panel toggler -->

                    <!--begin: Language bar -->

                    <!--end: Language bar -->

                    <!--begin: User Bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="kt-header__topbar-user">
                                <span class="kt-header__topbar-welcome kt-hidden-mobile">مرحباً,</span>
                                <span class="kt-header__topbar-username kt-hidden-mobile">{{ auth()->user()->name  }}</span>
                                <img class="kt-hidden" alt="Pic" src="{{ asset('assets/media/users/300_25.jpg') }} "/>

                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ substr(auth()->user()->name,0,4) }}</span>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                            <!--begin: Head -->
                            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                                 style="background-image: url({{ url('assets/media/misc/bg-1.jpg') }})">
                                <div class="kt-user-card__avatar">
                                    <img class="kt-hidden" alt="Pic"
                                         src="{{ asset('assets/media/users/300_25.jpg') }} "/>

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ substr(auth()->user()->name , 0,4) }}</span>
                                </div>
                                <div class="kt-user-card__name">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="kt-user-card__badge">
                                    <span class="btn btn-success btn-sm btn-bold btn-font-md"> {{ implode('-' , auth()->user()->roles()->pluck('name')->toArray())   }}</span>
                                </div>
                            </div>

                            <!--end: Head -->

                            <!--begin: Navigation -->
                            <div class="kt-notification">
                                <a href="custom/apps/user/profile-1/personal-information.html"
                                   class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            الملف الشخصي
                                        </div>
                                        <div class="kt-notification__item-time">
                                            Account settings and more
                                        </div>
                                    </div>
                                </a>
                                <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-mail kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            الرسائل الخاصة
                                        </div>
                                        <div class="kt-notification__item-time">
                                            المهام
                                        </div>
                                    </div>
                                </a>
                                <a href="custom/apps/user/profile-2.html" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-rocket-1 kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            النشاطات
                                        </div>
                                        <div class="kt-notification__item-time">
                                            الاشعارات
                                        </div>
                                    </div>
                                </a>
                                <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-hourglass kt-font-brand"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            My Tasks
                                        </div>
                                        <div class="kt-notification__item-time">
                                            latest tasks and projects
                                        </div>
                                    </div>
                                </a>
                                <div class="kt-notification__custom kt-space-between">
                                    <a href="{{ route('logout') }}"
                                       class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">تسجيل خروج
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            <!--end: Navigation -->
                        </div>
                    </div>

                    <!--end: User Bar -->
                </div>

                <!-- end:: Header Topbar -->
            </div>

            <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->

                <!-- end:: Subheader -->

                <!-- begin:: Content -->

                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                    @yield('content')

                </div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-footer__copyright">
                        2020&nbsp;&copy;&nbsp;<a href="https://atyaf.co/ar/" target="_blank" class="kt-link">ATYAF</a>
                    </div>
                    <div class="kt-footer__menu">
                        <a href="https://atyaf.co/ar/" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                        <a href="https://atyaf.co/ar/" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                        <a href="https://atyaf.co/ar/" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                    </div>
                </div>
            </div>

            <input type="hidden" value="{{auth()->id()}}" class="user_id">
            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Quick Panel -->
<div id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
            role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">الاشعارات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">الاعدادات</a>
            </li>
        </ul>
    </div>
</div>

<!-- end::Quick Panel -->

{{--<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }} "></script>--}}
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }} " type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }} " type="text/javascript"></script>
<script src=" {{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js') }} " type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }} " type="text/javascript"></script>
<script src="{{ asset("assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js") }} " type="text/javascript"></script>
<script src="{{ asset('js/supplier-modal.js') }}"></script>
{{--<script src="{{ asset('js/store-modal.js') }}"></script>--}}
<script src="{{ asset('js/product-modal.js') }}"></script>
<script src="{{ asset('js/jquery.validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate/messages_ar.js') }} "></script>
<script src="{{ asset('js/jquery.validate/additional-methods.min.js') }} "></script>
{{--<script src="{{ asset('js/unit-modal.js')}}"></script>--}}
<script src="{{ asset('/js/custome.js') }}"></script>
{{--<script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }} " type="text/javascript"></script>--}}
{{--<script src="{{ asset("assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js") }} " type="text/javascript"></script>--}}


@include('dashboard.layout.alert')
@yield('scripts')
height
<script>
    $(document).ready(function () {
        $('.selecte2').select2({
            width: '100%',
            height: '100%'

        });
    });
</script>


<script>

    $(document).on('click' , '.delete' ,function (e) {
        e.preventDefault();
        var id = $(this).data('value');
        var form = document.forms["myForm"]; // storing the form

        Swal.fire({
            title: 'هل انت متأكد من الحذف',
            text: "هل بالفعل تريد الحذف؟",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',cancelButtonText: 'الغاء',
            confirmButtonText: 'تأكيد'
        }).then((result) => {
            if (result.value) {
                $('.delete').closest('form').submit()
            }
        })

    });
</script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('5164222926532ac1ada9', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('order-noty');
    channel.bind('App\\Events\\OrderReceivedeNoty', function(data)
    {
        alert(JSON.stringify(data));
    });
</script>

<script>

    $(document).ready(function (){

         // window.Pusher = require('pusher-js');
        var user_id=  $('.user_id').val()


    })
    // window.Echo = new Echo({
    //     broadcaster: 'pusher',
    //     key: '5164222926532ac1ada9',
    //     cluster: 'mt1',
    //     forceTLS: true
    // });
    //
    // Window.Echo.private('order-noty.'+user_id).listen('App\\Events\\OrderReceivedeNoty', e=> {
    //     console.log(e.name)
    // })
    $('ul li a').on('click', function (){
       $(this).parent('ul').find().addClass('kt-menu__item--open')
    })
</script>
</body>
</html>
