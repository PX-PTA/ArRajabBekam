<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-start">
                    <li class="{{ request()->is('dashboard/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Dashboard
                                </label>
                                <a href="#">
                                    <i class="nav-icon me-2 i-Bar-Chart"></i>
                                    Dashboard
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='dashboard/*' ? 'open' : '' }}"
                                            href="{{route('dashboard')}}">
                                            <i class="nav-icon me-2 i-Clock-3"></i>
                                            <span class="item-name">Version</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="menu float-start">   
                    <li class="{{ request()->is('patient/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Pasien
                                </label>
                                <a href="#">
                                    <i class="nav-icon me-2 i-Bar-Chart"></i>
                                    Pasien
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='patient/*' ? 'open' : '' }}"
                                            href="{{route('patient.index')}}">
                                            <i class="nav-icon me-2 i-Clock-3"></i>
                                            <span class="item-name">Data Pasien</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                
                <ul class="menu float-start">   
                    <li class="{{ request()->is('patient/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Rekam Medis
                                </label>
                                <a href="#">
                                    <i class="nav-icon me-2 i-Bar-Chart"></i>
                                    Rekam Medis
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='patient/*' ? 'open' : '' }}"
                                            href="{{route('medical-record.index')}}">
                                            <i class="nav-icon me-2 i-Clock-3"></i>
                                            <span class="item-name">Data Rekam Medis</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="menu float-start">   
                    <li class="{{ request()->is('patient/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Keuangan
                                </label>
                                <a href="#">
                                    <i class="nav-icon me-2 i-Bar-Chart"></i>
                                    Data Keuangan
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='finance/*' ? 'open' : '' }}"
                                            href="{{route('finance.index')}}">
                                            <i class="nav-icon me-2 i-Clock-3"></i>
                                            <span class="item-name">Keuangan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--=============== Horizontal bar End ================-->