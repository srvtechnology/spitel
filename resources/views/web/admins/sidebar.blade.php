<div class="sidebar">
    <div class="row-logo">
        <div class="logo">
            <a class="logoPrimary" href="{{ url('/admin/dashboard') }}"><img src="{{asset('assets/admin/images/logo.svg')}}"></a>
            <a class="logoIcon" href="{{ url('/admin/dashboard') }}"><img src="{{ asset('assets/admin/images/logo-icon.svg') }}"></a>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="main-category-menu">
            <li class="sidebar-list active">
                <a href="{{ url('/admin/dashboard') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/dashboard.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Dashboard') }}</span>
                </a>
            </li>
              <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/signupRequests.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Signup_Requests') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ route('admin.merchant-signup-requests') }}">{{ __('messages.Merchant') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.representative-signup-requests') }}">{{ __('messages.Representative') }}</a></li>
                </ul>
            </li>
            {{-- <li class="sidebar-list">
                <a href="{{ url('/admin/restaurants-signup-requests/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/signupRequests.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Signup_Requests') }}</span>
                </a>
            </li> --}}
            <li class="sidebar-list">
                <a href="{{ url('/admin/Merchants/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Merchants') }}</span>
                </a>
            </li>
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/merchant-categories.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Merchant_Categories') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/admin/store-categories/list') }}">{{ __('messages.Food_Categories') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/admin/other-categories/list') }}">{{ __('messages.Grocery_Categories') }}</a></li>
                </ul>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/admin/featured-slider/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/featured-slider.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Featured_Slider') }}</span>
                </a>
            </li>
            <!--  <li class="sidebar-list">
                <a href="{{ url('/admin/providers-partner/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">Provider's Partner</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/admin/featured-slider/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/featured-slider.svg') }}">
                    </span>
                    <span class="menu-name">Featured Slider</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/admin/providers/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">Providers</span>
                </a>
            </li> -->
            <li class="sidebar-list">
                <a href="{{ url('/admin/customers/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/customers.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Customers') }}</span>
                </a>
            </li>
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/orders.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Orders') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/admin/new-orders/list') }}">{{ __('messages.New') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/admin/active-orders/list') }}">{{ __('messages.Active') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/admin/past-orders/list') }}">{{ __('messages.Past') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/admin/sehdule-orders/list',) }}">{{ __('messages.Scheduled') }} {{ __('messages.Orders') }}</a></li>
                </ul>
            </li>
            <li class="sidebar-list">
                <a class="nav-link" href="{{ url('/admin/representative/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/representative.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Representatives') }}</span>
                </a>
            </li>

            <li class="sidebar-list">
                <a href="{{ url('/admin/promo-code/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/promoCode.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Promo_Code') }}</span>
                </a>
            </li>

            <!-- <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/earning.svg') }}">
            </span>
            <span class="menu-name">Merchant Categories</span>
            </a>
            <ul class="submenu collapse subNavList">
                <li><a class="nav-link" href="{{ url('/admin/store-categories/list') }}">Food Categories</a></li>
                <li><a class="nav-link" href="{{ url('/admin/other-categories/list') }}">Grocery Categories</a></li>
            </ul>
            </li> -->

            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/orders.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Reports') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/admin/earning-transactions/history') }}">{{ __('messages.Earning_History') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/admin/order-sales-report/list') }}">{{ __('messages.Sales_Report') }}</a></li>
                </ul>
            </li>
            <!-- <li class="sidebar-list">
                <a href="{{ url('/admin/order-sales-report/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/orders.svg') }}">
                    </span>
                    <span class="menu-name">Reports</span>
                </a>
            </li> -->
            <!-- <li class="sidebar-list">
                <a href="{{ url('/admin/subscription-plans/list') }}">
            <span class="icon">
                <img src="{{ asset('assets/admin/images/promoCode.svg') }}">
            </span>
            <span class="menu-name">Subscription Plans</span>
            </a>
            </li> -->
            <li class="sidebar-list">
                <a href="{{ url('/admin/notifications') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/notify.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Notifications') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/admin/plate-form/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/platformsetting.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Platform_Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>