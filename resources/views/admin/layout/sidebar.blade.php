<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link customer-link" href="{{ route('customer.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-user me-2"></i> <span class="hide-menu">Member Registration</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link post-link" href="{{ route('post.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-image me-2"></i> <span class="hide-menu">Post</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link calendar-link" href="{{ route('calendar.list') }}" aria-expanded="false">
                        <i class="fa-solid fa-calendar me-2"></i> <span class="hide-menu">Calendar Events</span>
                    </a>
                </li>
                @if(Auth::user()->is_view)
                <li class="sidebar-item manage"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle manage-link" href="#pageSubmenu" aria-expanded="false">
                        <i class="fa-solid fa-bars-progress me-2"></i> <span class="hide-menu">Manage</span>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark country-link" href="{{route('manage.country.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Country</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark state-link" href="{{route('manage.state.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">State</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark city-link" href="{{route('manage.city.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">City</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark surname-list" href="{{route('manage.surname.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Surname</span>
                            </a>
                        </li>
                        {{--
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark native-place-link" href="{{route('manage.native_place.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Native place</span>
                            </a>
                        </li>
                        --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark panth-link" href="{{route('manage.panth.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Panth</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark slide-link" href="{{route('manage.slide.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Slide</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark relationship-link" href="{{route('manage.relationship.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Relationship</span>
                            </a>
                        </li>
                        {{--
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark group-link" href="{{route('manage.group.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Group</span>
                            </a>
                        </li>
                        --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark blood-group-link" href="{{route('manage.blood_group.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Blood Group</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark patti-link" href="{{route('manage.patti.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Patti</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark business-category-link" href="{{route('manage.business_category.index')}}">
                                <i class="fa-solid fa-bars-progress me-2"></i><span class="hide-menu">Business Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link news-cat-link" href="{{ route('news-category.view') }}" aria-expanded="false">
                                <i class="fa-solid fa-bars-progress me-2"></i> <span class="hide-menu">News Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link news-sub-cat-link" href="{{ route('news-sub-category.view') }}" aria-expanded="false">
                                <i class="fa-solid fa-bars-progress me-2"></i> <span class="hide-menu">News Sub Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link utilities-cat-link" href="{{ route('manage.utilitesCategory.index') }}" aria-expanded="false">
                                <i class="fa-solid fa-bars-progress me-2"></i> <span class="hide-menu">Utilities category</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link utilities-sub-cat-link" href="{{ route('manage.utilitesSubCategory.index') }}" aria-expanded="false">
                                <i class="fa-solid fa-bars-progress me-2"></i> <span class="hide-menu">Utilities Sub category</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link add-link" href="{{ route('advertisement.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-bullhorn me-2"></i> <span class="hide-menu">Advertisement</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link engagement-link" href="{{ route('engagements.add') }}" aria-expanded="false">
                        <i class="fa-solid fa-hand-holding-heart me-2"></i> <span class="hide-menu">Engagement</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link birthday-link" href="{{ route('birthday.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-cake-candles me-2"></i> <span class="hide-menu">Birthday</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link anni-link" href="{{ route('anniversary.view') }}" aria-expanded="false">
                        <i class="fa-regular fa-calendar-days me-2"></i> <span class="hide-menu">Anniversary</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link news-link" href="{{ route('news.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-newspaper me-2"></i> <span class="hide-menu">News</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link utilites-link" href="{{ route('utilites.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-user me-2"></i> <span class="hide-menu">Utilites</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link matrimony-link" href="{{ route('matrimony.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-hand-holding-heart me-2"></i> <span class="hide-menu">Matrimony</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link video-link" href="{{ route('video.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-video me-2"></i> <span class="hide-menu">Videos</span>
                    </a>
                </li>
                {{--
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link profile-link" href="{{ route('profile.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-user me-2"></i> <span class="hide-menu">Profile</span>
                    </a>
                </li>
                --}}
                @if(Auth::user()->role == 1)
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link staff-link" href="{{ route('staff.view') }}" aria-expanded="false">
                        <i class="fa-solid fa-person-cane me-2"></i> <span class="hide-menu">Staff</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- <div class="sidebar-footer">
        <div class="row">
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ti-settings"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="mdi mdi-gmail"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
        </div>
    </div> -->
</aside>