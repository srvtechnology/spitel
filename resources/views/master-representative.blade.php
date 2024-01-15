<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'dir=rtl' : 'dir=ltr' }}>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.title') }}</title>
    <link rel="icon" href=" {{ asset('assets/admin/images/logo-icon.svg') }}" type="image/png">
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/simple-chart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/smartphoto.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/css-date/classic.date.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/css-date/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css') }}">
    <script src="{{ asset('assets/admin/js/jquery-3.6.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- delete model  -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- toggle button  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/css/bootstrap5-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/js/bootstrap5-toggle.ecmas.min.js"></script>

</head>
<!-- <html> -->
@if (str_replace('_', '-', app()->getLocale()) === 'en')

    <body class="direction-ltr " dir="ltr">
@endif

<body class="direction-rtl " dir="rtl">

    <div class="main-container">

        @include('web/representatives/header')
        @include('web/representatives/sidebar')


        <div class="main-content-container">
            @yield('content')
        </div>
    </div>
    <div class="dashboard-footer">&copy; {{ date('Y') }} {{ __('messages.title') }}.
        {{ __('messages.All_rights_reserved') }}</div>

    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- Load the plugin bundle. -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/filter_multi_select.css') }}" />
    <script src="{{ asset('assets/admin/js/filter-multi-select-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/charts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/js-date/picker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/js-date/picker.date.js') }}"></script>
    <script src="{{ asset('assets/admin/js/my.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery-smartphoto.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script>
        // Use the plugin once the DOM has been loaded.
        $(function() {
            // Apply the plugin
            var categories = $('#categories').filterMultiSelect();
        });
    </script>
    <script>
        $(".main-category-menu").mCustomScrollbar({
            /*setHeight:300,*/
            autoHideScrollbar: true,
            theme: "minimal-dark"
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        document.querySelector(".integer_exclude").addEventListener("keypress", function(evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
            }
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHKgO_ANzKuSjQCQxwEx2bYlbmxBu_F5U&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>
    <script src="{{ asset('assets/js/mapInput.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.sidebar-nav .nav-link').forEach(function(element) {

                element.addEventListener('click', function(e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains('show')) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector(
                                '.submenu.show');
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }

                        }
                    }

                });
            })

        });
        // DOMContentLoaded  end
    </script>
    {{-- @stack('my_scripts')     --}}
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('message') }}");
        </script>
    @endif

</body>

</html>
