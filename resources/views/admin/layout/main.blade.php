<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('styles')
    <style>
.bell-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background-color: #435EBE;
  color: #000;
  text-decoration: none;
}

.bell-icon:hover {
  background-color: #fff;
}

.dropdown-menu {
  width: 250px;
  border: none;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
}

.dropdown-item {
  padding: 8px 16px;
}



        .breadcrumb-item+.breadcrumb-item:before {
    float: left;
    padding-right: 0.5rem;
    color: #6c757d;
    /* content: "/"; */
    content: var(--bs-breadcrumb-divider, "/");
}
        .manage ul li {
            background: hsl(0deg 0% 100%);
    border-radius: 20px;
        }

        .collapse li {
            margin-bottom: 0 !important;
        }
        form .form-control
        {
            margin-bottom: 23px;
        }
        .list-unstyled .sidebar-item .active {
            background: hsl(188deg 88% 54% / 55%) !important;
        }

        .form-control {
            padding: 0.65rem 0.75rem;
        }

        .btn-info {
            padding: 0.65rem 0.75rem;
            font-size: 17px;
            letter-spacing: 0.9px;
            text-transform: uppercase;
        }
        .select2-container--default .select2-selection--single {
    background-color: hsl(0deg 0% 100%);
    border: none;
    border-radius: 20px;
    height: calc(2em + 0.75rem + 2px);
    border: 1px solid hsl(188deg 1% 71%);
    border-radius: 6px;
}
.search-box .select2-container--default .select2-selection--single
{
    min-width: 250px;
    border-radius: 20px;
    height: 36px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: hsl(0deg 0% 27%);
    line-height: 35px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 4px;
    right: 9px;
    width: 20px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 18px;
    padding-right: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid hsl(188deg 63% 73% / 68%);
}
#reportrange
{
    cursor: pointer;
    padding: 8px 7px;
    border: 1px solid #cfcfcf;
    display: inline-block;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border-radius: 20px;
    color:#8591bc;
}
#daterange {
    border: 0;
    cursor: pointer;
    color: #2d3034;
}
.fa-magnifying-glass
{
    font-size: 13px;
}
.search-btn
{
    padding: 9.5px;
}

    </style>
</head>
<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="page-wrapper">
            @yield('breadcrumb')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!-- Select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--Custom JavaScript -->
    <!-- <script src="asset('/public/js/custom.js')"></script> -->
    <!-- importing tinymce app.js-->
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        $(document).ready(function(){

            let city = '';
            @if(isset($_GET['city']) && $_GET['city'] != '')
                city = "{{ $_GET['city'] }}";
            @endif

            let cityUrl = "{{ route('getCity') }}";
            let options = '<option value="">City</option>';
            $.get(cityUrl, function(data, status){
                $.each(data, function(key, value){
                    options += "<option value='"+value.id+"'>"+value.city+"</option>";
                });
                $(".city-global").html(options);
                $(".city-global").val(city);
            });

            $(".city-global").select2();

            $(".select").select2();

            $(".city-global").on("change", function(){
                city = $(this).val();
                @if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                    @php($link = "https")
                @else
                    @php($link = "http")
                @endif
                let url = "{{$link}}://{{$_SERVER['HTTP_HOST']}}"+"{{$_SERVER['REQUEST_URI']}}";
                var param = url.split("?");
                if (param <= 1) {
                    url = url + "?city="+city;
                } else {
                    url = url.replace(/\?.*/,'');
                    url = url + "?city="+city;
                }
                location.href = url;
            });

            $(".sidebar-link").click(function(){
                let href = $(this).attr('href');
                href = href + "?city="+city;
                $(this).attr('src', href);
                location.href = href;
                return false;
            });

            $(".link-btn").click(function(){
                let href = $(this).attr('href');
                href = href + "?city="+city;
                $(this).attr('src', href);
                location.href = href;
                return false;
            });
        });

        $(document).on("select2:open", () => {
            document.querySelector(".select2-container--open .select2-search__field").focus()
        });
    </script>
    
    @yield('scripts')
</body>
</html>
