<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <!-- Dashboard -->
            <div class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i><span>Dashboard</span></a>
            </div>

            <!-- Location Management -->
            <div class="nav-lavel">Location Management</div>
            <div class="nav-item {{ Request::is('regions*') ? 'active' : '' }}">
                <a href="{{ route('regions.index') }}"><i class="ik ik-map-pin"></i><span>Regions</span></a>
            </div>
            <div class="nav-item {{ Request::is('divisions*') ? 'active' : '' }}">
                <a href="{{ route('divisions.index') }}"><i class="ik ik-map-pin"></i><span>Divisions</span></a>
            </div>
            <div class="nav-item {{ Request::is('districts*') ? 'active' : '' }}">
                <a href="{{ route('districts.index') }}"><i class="ik ik-map-pin"></i><span>Districts</span></a>
            </div>

            <!-- School Management -->
            <div class="nav-lavel">School Management</div>
            <div class="nav-item {{ Request::is('schools*') ? 'active' : '' }}">
                <a href="{{ route('schools.index') }}"><i class="ik ik-book"></i><span>Schools</span></a>
            </div>
            <div class="nav-item {{ Request::is('extension-schools*') ? 'active' : '' }}">
                <a href="{{ route('extension-schools.index') }}"><i class="ik ik-book-open"></i><span>Extension
                        Schools</span></a>
            </div>

            <!-- Grades Management -->
            <div class="nav-lavel">Grades Management</div>
            <div class="nav-item {{ Request::is('grades*') ? 'active' : '' }}">
                <a href="{{ route('grades.index') }}"><i class="ik ik-clipboard"></i><span>Grades</span></a>
            </div>
            <!-- Position and Personnel Management -->
            <div class="nav-lavel">Personnel Management</div>
            <div class="nav-item {{ Request::is('positions*') ? 'active' : '' }}">
                <a href="{{ route('positions.index') }}"><i class="ik ik-briefcase"></i><span>Positions</span></a>
            </div>
            <div class="nav-item {{ Request::is('position-categories*') ? 'active' : '' }}">
                <a href="{{ route('position-categories.index') }}"><i class="ik ik-list"></i><span>Position
                        Categories</span></a>
            </div>
            <div class="nav-item {{ Request::is('employment-statuses*') ? 'active' : '' }}">
                <a href="{{ route('employment-statuses.index') }}"><i class="ik ik-layers"></i><span>Employment
                        Status</span></a>
            </div>

            <!-- School Year and Programs Management -->
            <div class="nav-lavel">Programs Management</div>
            <div class="nav-item {{ Request::is('school-year*') ? 'active' : '' }}">
                <a href="{{ route('school-year.index') }}"><i class="ik ik-calendar"></i><span>School Year</span></a>
            </div>

            <div class="nav-item {{ Request::is('special-programs*') ? 'active' : '' }}">
                <a href="{{ route('special-programs.index') }}"><i class="ik ik-star"></i><span>Special
                        Programs</span></a>
            </div>
            <div class="nav-item {{ Request::is('tracks*') ? 'active' : '' }}">
                <a href="{{ route('tracks.index') }}"><i class="ik ik-trending-up"></i><span>Tracks</span></a>
            </div>
            <div class="nav-item {{ Request::is('strands*') ? 'active' : '' }}">
                <a href="{{ route('strands.index') }}"><i class="ik ik-trending-up"></i><span>Strands</span></a>
            </div>
            <div class="nav-item {{ Request::is('specializations*') ? 'active' : '' }}">
                <a href="{{ route('specializations.index') }}"><i
                        class="ik ik-star"></i><span>Specializations</span></a>
            </div>
            <!-- Funding Management -->
            <div class="nav-lavel">Funding Management</div>
            <div class="nav-item {{ Request::is('funding-sources*') ? 'active' : '' }}">
                <a href="{{ route('funding-sources.index') }}"><i class="ik ik-dollar-sign"></i>
                    <span>Funding Sources</span></a>
            </div>

            <!-- User Management -->
            <div class="nav-lavel">System User Management</div>
            <div class="nav-item has-sub {{ Request::is('users*') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Manage Users</span></a>
                <div class="submenu-content">
                    <a href="{{ route('users.index') }}"
                        class="menu-item {{ Request::is('users*', 'users.index') ? 'active' : '' }}">
                        All Users
                    </a>
                    <a href="{{ route('users.create') }}"
                        class="menu-item {{ Request::is('users.create') ? 'active' : '' }}">
                        Create User
                    </a>
                </div>
            </div>
            <!-- Reports and Settings -->
            <div class="nav-lavel">Reports and Settings</div>
            <div class="nav-item {{ Request::is('reports*') ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}"><i class="ik ik-file-text"></i><span>Reports</span></a>
            </div>
            <div class="nav-item {{ Request::is('backup*') ? 'active' : '' }}">
                <a href="{{ route('backup.index') }}"><i class="ik ik-hard-drive"></i><span>Backup</span></a>
            </div>
            <div class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
                <a href="{{ route('settings.index') }}"><i class="ik ik-sliders"></i><span>Settings</span></a>
            </div>
            <div class="nav-item {{ Request::is('profile-settings*') ? 'active' : '' }}">
                <a href="{{ route('profile-settings.index') }}"><i class="ik ik-user"></i><span>Profile
                        Settings</span></a>
            </div>
        </nav>
    </div>
</div>
