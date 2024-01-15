<header id="page-topbar">
    <div class="triggerHeading">
        <div class="menu-trigger">
            <img class="cross" src="{{ asset('assets/admin/images/menu.svg') }}">
            <img class="icon-trigger" src="{{ asset('assets/admin/images/cross.svg') }}">
        </div>
        <div class="pageTitle">{{ __('messages.menu') }}</div>
    </div>
    <div class="navbar-header">
        <div class="top-bar-sets">
            {{-- <div class="top-bar-setting"><img src="{{asset('assets/admin/images/settings.svg')}}">
        </div> --}}
        <div class="btn-group">
            <!-- <div class="avaible_status">
                    <div>Availability</div>
                    <input type="checkbox"checked data-toggle="toggle">
                </div> -->
            @if(app()->getLocale() === 'en')
            <a href="{{ route('setLocale', 'ar') }}" class="btn-flag btn-primary Banner-btn text-regular btn_respon select-lang-arabic">
                <img class="flag-icon-squared" src="{{ asset('assets/admin/flags/langIcon/sa.svg') }}" alt="">
                AR</a>
            @else
            <a href="{{ route('setLocale', 'en') }} " class="btn-flag btn-primary Banner-btn text-regular btn_respon select-lang-eng">
                <img class="flag-icon-squared" src="{{ asset('assets/admin/flags/langIcon/au.svg') }}" alt="">
                ENG </a>
            @endif
            <div class="top-bar-notification dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/admin/images/notification.svg') }}">
                <div class="notify-number">5</div>
            </div>

            <ul class="dropdown-menu dropdown-menu-notification">
                <li>
                    <a class="dropdown-item dropdown-item-notify" href="#!">
                        <span class="notifyTitle"> {{ __('messages.notifyTitle') }}</span>
                        <span class="notifyDesc"> {{ __('messages.notifyDesc') }}</span>
                    </a>
                </li>
                <hr class="dropdown-divider">
                <li>
                    <a class="dropdown-item dropdown-item-notify" href="#!">
                        <span class="notifyTitle">{{ __('messages.notifyTitle') }}</span>
                        <span class="notifyDesc">{{ __('messages.notifyDesc') }}</span>
                    </a>
                </li>
                <hr class="dropdown-divider">
                <li>
                    <a class="dropdown-item dropdown-item-notify" href="#!">
                        <span class="notifyTitle">{{ __('messages.notifyTitle') }}</span>
                        <span class="notifyDesc">{{ __('messages.notifyDesc') }}</span>
                    </a>
                </li>
                <hr class="dropdown-divider">
                <li>
                    <a class="dropdown-item dropdown-item-notify" href="#!">
                        <span class="notifyTitle">{{ __('messages.notifyTitle') }}</span>
                        <span class="notifyDesc">{{ __('messages.notifyDesc') }}.</span>
                    </a>
                </li>
                <div class="seeAllNotify">
                    <a href="{{ url('/merchant/notifications') }}">{{ __('messages.See_All') }}</a>
                </div>
            </ul>
        </div>
        {{-- <div class="top-bar-avatar"><img src="{{asset('assets/admin/images/avatar.png')}}">
    </div> --}}
    <div class="btn-group">
        <div class="top-bar-avatar dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('assets/admin/images/avatar.png') }}"></div>
        <!-- <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                    </button> -->
        <ul class="dropdown-menu dropdown-menu-avatar">
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="{{ url('/merchant/profile') }}">{{ __('messages.Admin') }}</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('merchant.logOut')}}">{{ __('messages.logout') }}</a>
        </ul>
    </div>
    </div>
    </div>
</header>