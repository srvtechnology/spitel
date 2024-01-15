<div class="sidebar">
    <div class="row-logo">
        <div class="logo">
            <a class="logoPrimary" href="{{ url('/admin/dashboard') }}"><img src="{{asset('assets/admin/images/logo.svg')}}">
            </a>
            <a class="logoIcon" href="{{ url('/admin/dashboard') }}"><img src="{{ asset('assets/admin/images/logo-icon.svg') }}"></a>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="main-category-menu">
            <li class="sidebar-list active">
                <a href="{{ url('/representative/dashboard') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/dashboard.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Dashboard') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/representative/merchant/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Merchants') }}</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a href="{{ url('/representative/fee/list') }}">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/providers.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.fee_collection') }}</span>
                </a>
            </li>
           
            <li class="sidebar-list subNav has-submenu">
                <a class="nav-link" href="#!">
                    <span class="icon">
                        <img src="{{ asset('assets/admin/images/earning.svg') }}">
                    </span>
                    <span class="menu-name">{{ __('messages.Reports') }}</span>
                </a>
                <ul class="submenu collapse subNavList">
                    <li><a class="nav-link" href="{{ url('/representative/earning-transactions/history') }}">{{ __('messages.Overview_based') }}</a></li>
                    <li><a class="nav-link" href="{{ url('/representative/order-sales-report/list') }}">{{ __('messages.Merchant_Report') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>