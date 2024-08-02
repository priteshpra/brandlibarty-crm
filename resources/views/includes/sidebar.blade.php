<!-- LOGO -->
<div class="navbar-brand-box">
    <a href="{{ url('/dashboard') }}" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <!-- <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="20"> -->
            LOGO HERE
        </span>
    </a>

    <a href="{{ url('/dashboard') }}" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="20">
        </span>
    </a>
</div>

<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
    <i class="fa fa-fw fa-bars"></i>
</button>

<div data-simplebar class="sidebar-menu-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{ url('/dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">

                    <li>
                        <a href="{{ URL('/project') }}">Project List</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ URL('/calendar') }}" class="waves-effect">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendar</span>
                </a>
            </li>

            <li>
                <a href="#" class="has-arrow waves-effect">
                    <i class="uil uil-search"></i>
                    <span>Manage Keyword </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/moz') }}">Keyword Search</a></li>
                    <li><a href="{{ url('/chat') }}">Open AI Chat</a></li>
                    <!-- <li><a href="{{ url('/scheduling') }}">Scheduling</a></li> -->
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-pen"></i>
                    <span>Blog Writing</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ URL('/blog') }}">Blog Writing Page</a></li>
                    <!-- <li><a href="{{ URL('/blog/create') }}">Create Blog</a></li> -->
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-photo-video"></i>
                    <span>Media</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-envelope"></i>
                    <span>Email</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ URL('/email') }}">Inbox</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-cog"></i>
                    <span>SMS Configaration</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/affiliate') }}" class="waves-effect">
                    <i class="fas fa-handshake"></i>
                    <span>Affiliate</span>
                </a>
            </li>

            <li class="menu-title">Pages</li>
            <li>
                <a href="{{ URL('/category') }}"><i class="fas fa-keyboard"></i>Category List</a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-keyboard"></i>
                    <span>Prompt</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/prompt') }}">Prompt List</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('/addblock') }}" class="waves-effect">
                    <i class="fas fa-ad"></i>
                    <span>Ads Block Section</span>
                </a>

            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-user"></i>
                    <span>User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ URL('/users') }}">User List</a></li>

                </ul>
            </li>

            <li class="menu-title">Components</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-cog"></i>
                    <span>Custom Setting</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ URL('/settings') }}">API Setting</a></li>

                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>