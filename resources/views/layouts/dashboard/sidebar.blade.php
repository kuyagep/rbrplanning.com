<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            {{-- <div class="nav-lavel">Navigation</div> --}}
            <div class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
            </div>

            <div
                class="nav-item has-sub {{ Request::is('regions', 'regions/create', 'divisions', 'divisions/create') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Manage Settings</span></a>
                <div class="submenu-content">
                    <a href="{{ url('/regions') }}"
                        class="menu-item {{ Request::is('regions', 'regions/create') ? 'active' : '' }}">
                        All Regions
                    </a>
                </div>
                <div class="submenu-content">
                    <a href="{{ url('/divisions') }}"
                        class="menu-item {{ Request::is('divisions', 'divisions/create') ? 'active' : '' }}">
                        All Divisions
                    </a>
                </div>
                {{-- <div class="submenu-content">
                    <a href="{{ url('/divisions') }}"
                        class="menu-item {{ Request::is('divisions', 'divisions/create') ? 'active' : '' }}">
                        All Divisions
                    </a>
                </div> --}}
            </div>
            <div class="nav-item has-sub {{ Request::is('users', 'users/create') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users</span>
                    <span class="badge badge-danger">150+</span></a>
                <div class="submenu-content">
                    <a href="{{ url('/users') }}"
                        class="menu-item {{ Request::is('users', 'users/create') ? 'active' : '' }}">All
                        Users</a>
                </div>
            </div>

        </nav>
    </div>
</div>
