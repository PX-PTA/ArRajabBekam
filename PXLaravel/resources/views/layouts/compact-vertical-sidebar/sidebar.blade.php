<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item 
                {{ request()->is('dashboard*') 
                    || request()->is('patient*')
                    || request()->is('medical-records*') ? 'active' : '' }} {{ request()->is('dashboard*') ? 'active' : '' }}"
                data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('profile/*') ? 'active' : '' }}" data-item="profile">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Gears"></i>
                    <span class="nav-text">Profile</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo">
                <img src="{{ asset('assets/images/logo-text.png') }}" alt="">
            </div>
        </header>
        <!-- Submenu Dashboards -->
        <div class="submenu-area" data-parent="dashboard">
            <header>
                <h6>Dashboards</h6>
                <p>Dashboard</p>
            </header>
            <ul class="childNav" data-parent="dashboard">
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName() == 'dashboard' ? 'open' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="nav-icon i-Dashboard"></i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName() == 'patient.index' ? 'open' : '' }}"
                        href="{{ route('patient.index') }}">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Patient</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName() == 'medical-record.index' ? 'open' : '' }}"
                        href="{{ route('medical-record.index') }}">
                        <i class="nav-icon i-Files"></i>
                        <span class="item-name">Medical Records</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="profile">
            <header>
                <h6>Profile</h6>
                <p>Profile</p>
            </header>
            <ul class="childNav" data-parent="profile">
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName() == 'alerts' ? 'open' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="nav-icon i-Lock-2"></i>
                        <span class="item-name">Change Password</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName() == 'alerts' ? 'open' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="nav-icon i-Edit"></i>
                        <span class="item-name">Change Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName() == 'alerts' ? 'open' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="nav-icon i-Left"></i>
                        <span class="item-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
