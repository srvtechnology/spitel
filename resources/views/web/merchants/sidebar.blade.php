<div class="sidebar">
    <div class="row-logo">
        <div class="logo">
            <a class="logoPrimary" href="{{ url('/merchant/dashboard') }}"><img src="{{asset('assets/admin/images/logo.svg')}}">
            </a>
            <a class="logoIcon" href="{{ url('/merchant/dashboard') }}"><img src="{{ asset('assets/admin/images/logo-icon.svg') }}"></a>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="main-category-menu">
            <li class="sidebar-list active">
                <a href="{{ url('/merchant/dashboard') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/dashboard.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Dashboard') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="nav-link" href="{{ url('/merchant/staff') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/staff.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Staff') }}</span>
                </a>
            </li>

            <li class="sidebar-list">
                <a href="{{ url('/merchant/menucategories/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Menu_Categories') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/merchant/menu-item/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Menu_Items') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/merchant/promo-code/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/promoCode.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Promo_Code') }}</span>
                </a>
            </li>

            
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/orders.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Orders') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/merchant/new-orders/list') }}">{{ __('messages.New') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/merchant/active-orders/list') }}">{{ __('messages.Active') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/merchant/past-orders/list') }}">{{ __('messages.Past') }} {{ __('messages.Orders') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/merchant/sehdule-orders/list',) }}">{{ __('messages.Scheduled') }} {{ __('messages.Orders') }}</a></li>
                </ul>
            </li>
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/earning.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Reports') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/merchant/earning-transactions/history') }}">{{ __('messages.Earning_History') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/merchant/order-sales-report/list') }}">{{ __('messages.Sales_Report') }}</a></li>
                </ul>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/merchant/notifications') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/notify.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Notifications') }}</span>
                </a>
            </li>
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/earning.svg') }}">
                    </span>
                    <span class="menu-name"> {{ __('messages.Business_Setting') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/merchant/shift-list') }}"> {{ __('messages.Working_Shift') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/merchant/hours-list') }}"> {{ __('messages.Working_Hours') }}</a></li>
                </ul>
            </li>
            <!-- <li class="sidebar-list">
                <a href="{{ url('/merchant/order-sales-report/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/orders.svg') }}">
                    </span>
                    <span class="menu-name">Reports</span>
                </a>
            </li> -->

            <!-- <li class="sidebar-list">
                <a href="{{ url('/merchant/setting/list') }}">
                    <span class=" icon">
                    <img src="{{ asset('assets/admin/images/platformsetting.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Setting') }}</span>
                </a>
            </li> -->

        </ul>
    </div>
</div>