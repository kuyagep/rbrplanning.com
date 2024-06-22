<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <!-- Dashboard -->
            <div class="nav-item {{ Request::routeIs('user.dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard.index') }}">
                    <i class="ik ik-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Personnel Management -->
            <div class="nav-lavel">Personnel Management</div>
            <div class="nav-item has-sub {{ Request::routeIs('user.personnels.*') ? 'active open' : '' }}">
                <a href="javascript:void(0)">
                    <i class="ik ik-users"></i>
                    <span>Personnel</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('user.personnels.index') }}"
                        class="menu-item {{ Request::routeIs('user.personnels.index') ? 'active' : '' }}">
                        Personnel
                    </a>
                    <a href="{{ route('user.personnels.create') }}"
                        class="menu-item {{ Request::routeIs('user.personnels.create') ? 'active' : '' }}">
                        Create Personnel
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
