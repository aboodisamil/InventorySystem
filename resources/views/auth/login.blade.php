
<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>شركة بشير غراب | صفحة الدخول</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('assets/css/pages/login/login-4.rtl.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }} " rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('assets/css/skins/header/base/light.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('assets/css/skins/header/menu/light.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/skins/brand/dark.rtl.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/skins/aside/dark.rtl.css') }} " rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href=" {{ asset('assets/media/logos/favicon.ico') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url('{{url('assets/media/bg/bg-2.jpg')}}');">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src=" {{ asset('assets/media/logos/logo-5.png') }}">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">شركة بشير غراب للأدوات الكهربائية | صفحة الدخول</h3>
                        </div>
                        <form method="POST" class="kt-form" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group">
                                <input class="form-control" type="text" id="phone" style="text-align: right"  placeholder="ادخل رقم الهاتف" name="phone">
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group">
                                <input class="form-control" type="password" style="text-align: right" placeholder="ادخل كلمة السر" name="password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="kt-login__actions">
                                <button  class="btn btn-brand btn-pill kt-login__btn-primary" style="font-size: 17px">الدخول</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }} " type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }} " type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/js/pages/custom/login/login-general.js') }} " type="text/javascript"></script>

<!--end::Page Scripts -->
</body>
<script>
    $('#phone').inputmask({"mask": "(999) 999-9999" , autoUnmask: true,
        removeMaskOnSubmit: true,
        rightAlign: false} );
</script>
</html>

