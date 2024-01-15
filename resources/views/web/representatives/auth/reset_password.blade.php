<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'dir=rtl' : 'dir=ltr' }}>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.title') }}</title>

    <link rel="icon" href=" {{ asset('assets/admin/images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }} " />
    <link rel="stylesheet" href=" {{ asset('assets/admin/css/style.css') }}" />
    <link rel="stylesheet" href=" {{ asset('assets/admin/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
@if (str_replace('_', '-', app()->getLocale()) === 'en')

    <body class="direction-ltr " dir="ltr">
@endif

<body class="direction-rtl" dir="rtl">
    <div class="container-fluid container-fluid-login">
        <div class="container container-login">
            <div class="login-main-container">
                <div class="login-wrapper">
                    <div class="login-logo common-btn">
                        <img src="{{ asset('assets/admin/images/logo.svg') }}">
                        <div>
                            @if (app()->getLocale() === 'en')
                                <a href="{{ route('setLocale', 'ar') }}"
                                    class="btn-flag btn-primary Banner-btn text-regular btn_respon select-lang-arabic">
                                    <img class="flag-icon-squared"
                                        src="{{ asset('assets/admin/flags/langIcon/sa.svg') }}" alt="">
                                    AR
                                </a>
                            @else
                                <a href="{{ route('setLocale', 'en') }} "
                                    class="btn-flag btn-primary Banner-btn text-regular btn_respon select-lang-eng">
                                    <img class="flag-icon-squared"
                                        src="{{ asset('assets/admin/flags/langIcon/au.svg') }}" alt="">
                                    ENG
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="login-heading">
                        {{ __('messages.Reset_Password') }}
                    </div>
                    <div class="login-text">
                        {{ __('messages.Reset_Password_text') }}
                    </div>

                    <form action="{{route('forntRepresentative.reset')}}" method="POST">
                        @csrf
                        <div class="form-group log-form-fields">
                            <div class="login-form-icon">
                                <img src="{{ asset('assets/admin/images/mail.svg') }}">
                            </div>
                            <input type="email" required class="form-control" name="email" id=""
                                placeholder="{{ __('messages.Place_email') }}">
                        </div>

                        <!-- <button class="btn btn-primary btn-login btn-full">Login</button> -->
                        <button type="submit"
                            class="btn btn-primary btn-login btn-full">{{ __('messages.Reset_Password') }}</button>
                        <div class="forget-link">
                            <a href="{{ url('/representative') }}">{{ __('messages.Back_to_Login') }}</a>
                        </div>
                    </form>

                </div>

            </div>

            <div class="logo_icon">
                <img src="{{ asset('assets/admin/images/find-vector.png') }}" alt="">
            </div>
        </div>

        <div class="login-footer">&copy; {{ date('Y') }} {{ __('messages.title') }}.
            {{ __('messages.All_rights_reserved') }}.</div>
    </div>
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.error("{{ session('error') }}");
        </script>
    @endif
</body>

</html>
