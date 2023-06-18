<div class="main-header">
    <div class="logo">
        <img src="{{ asset('gull/images/logo.png') }}" alt="" />
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="d-flex align-items-center">
        <!-- / Mega menu -->
        <div class="search-bar">
            <input type="text" placeholder="Search" />
            <i class="search-icon text-muted i-Magnifi-Glass1"></i>
        </div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img onclick="alert('')" src="{{ asset('gull/images/faces/1.jpg') }} " id="userDropdown" alt="" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" />
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User me-1"></i> Timothy Carlson
                    </div>
                    <a class="dropdown-item">Account settings</a>
                    <a class="dropdown-item">Billing history</a>
                    <a class="dropdown-item" href="signin.html">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</div>