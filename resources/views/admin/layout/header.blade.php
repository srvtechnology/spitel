<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6" style="background: #435ebe;">

            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand ms-4" href="">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" /> -->
                    <h1 style="color: hsl(0deg 0% 93%); font-family: math; font-size: 34px;">JYM APP</h1>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <!-- <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" /> -->
                    <!-- <h3>JA</h3> -->
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white "
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0 ">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <select class="form-select select-city city-global"></select>
                </li>
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->


            @php
            $cus_count = DB::table('customers')->where('system_status',0)->where('first_name','!=',NULL)->count();
            $cus = DB::table('customers')->where('system_status',0)->where('first_name','!=',NULL)->get();
            // dd($post);
        @endphp
        <ul>

            <div class="dropdown">
                <a class="bell-icon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle"></i>
                  <span class="badge bg-danger">{{$cus_count}}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach ($cus as $p)
                        {{-- @php
                            $cus = DB::table('customers')->where('id',$p->customer_id)->first();
                        @endphp --}}
                        <li><a href="{{route('customer.single_view',$p->id)}}"><p class="dropdown-item"> {{ $p->first_name}} <br> is Pending</p></a>
                            {{-- <a class="dropdown-item" href="{{url('approve_post',$p->id)}}">Approve</a> <a class="dropdown-item" href="{{route('post.add',$p->id)}}">View</a>  --}}
                        </li>
                    @endforeach

                  {{-- <li><a class="dropdown-item" href="#">Notification 1</a></li>
                  <li><a class="dropdown-item" href="#">Notification 2</a></li>
                  <li><a class="dropdown-item" href="#">Notification 3</a></li> --}}
                </ul>
              </div>

        </ul>





            @php
                $post_count = DB::table('post')->where('is_approved',0)->count();
                $post = DB::table('post')->where('is_approved',0)->get();
                // dd($post);
            @endphp
            <ul>

                <div class="dropdown">
                    <a class="bell-icon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-file-post"></i>
                      <span class="badge bg-danger">{{$post_count}}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($post as $p)
                            @php
                                $cus = DB::table('customers')->where('id',$p->customer_id)->first();
                            @endphp
                            <li><a href="{{route('post.single_view',$p->id)}}"><p class="dropdown-item"> {{ (isset($cus->first_name))?$cus->first_name:"Deleted Customer"}} <br> Made a Post</p></a>
                                 {{-- <a class="dropdown-item" href="{{url('approve_post',$p->id)}}">Approve</a> <a class="dropdown-item" href="{{route('post.add',$p->id)}}">View</a> --}}
                                </li>
                        @endforeach

                      {{-- <li><a class="dropdown-item" href="#">Notification 1</a></li>
                      <li><a class="dropdown-item" href="#">Notification 2</a></li>
                      <li><a class="dropdown-item" href="#">Notification 3</a></li> --}}
                    </ul>
                  </div>

            </ul>

            <ul class="navbar-nav">

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2"> -->
                        <span style="color:#fff;font-size:15px;" >
                        <i class="fa fa-user-circle" style="color:#fff;padding-right:4px; font-size:17px;"> </i>
                            Admin
                        </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
