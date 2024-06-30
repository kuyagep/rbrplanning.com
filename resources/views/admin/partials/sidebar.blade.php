<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('theme/assets/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-1"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block text-white">
                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent nav-collapse-hide-child"
            data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">HOME</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <span class="right badge badge-success">New</span>
                    </p>
                </a>
            </li>


            <li class="nav-item {{ Request::is('regions*', 'divisions*', 'districts*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)"
                    class="nav-link {{ Request::is('regions*', 'divisions*', 'districts*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-map"></i>
                    <p>
                        Geographic Units
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('regions.index') }}"
                            class="nav-link {{ Request::is('regions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marked-alt"></i>
                            <p>Regions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('divisions.index') }}"
                            class="nav-link {{ Request::is('divisions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map"></i>
                            <p>Divisions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('districts.index') }}"
                            class="nav-link {{ Request::is('districts*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-signs"></i>
                            <p>Districts</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('schools*', 'extension-schools*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)"
                    class="nav-link {{ Request::is('schools*', 'extension-schools*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Schools
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('schools.index') }}"
                            class="nav-link {{ Request::is('schools*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Schools</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('extension-schools.index') }}"
                            class="nav-link {{ Request::is('extension-schools*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-university"></i>
                            <p>Extension Schools</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item {{ Request::is('grades*', 'tracks*', 'strands*', 'specializations*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)"
                    class="nav-link {{ Request::is('grades*', 'tracks*', 'strands*', 'specializations*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Academics
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('grades.index') }}"
                            class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>Grades</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tracks.index') }}"
                            class="nav-link {{ Request::is('tracks*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-road"></i>
                            <p>Tracks</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('strands.index') }}"
                            class="nav-link {{ Request::is('strands*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-stream"></i>
                            <p>Strands</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('specializations.index') }}"
                            class="nav-link {{ Request::is('specializations*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>Specializations</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item {{ Request::is('positions*', 'position-categories*', 'employment-statuses*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)"
                    class="nav-link {{ Request::is('positions*', 'position-categories*', 'employment-statuses*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Employment
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('positions.index') }}"
                            class="nav-link {{ Request::is('positions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Positions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('position-categories.index') }}"
                            class="nav-link {{ Request::is('position-categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>Position Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employment-statuses.index') }}"
                            class="nav-link {{ Request::is('employment-statuses*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Employment Status</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('school-year*', 'special-programs*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)"
                    class="nav-link {{ Request::is('school-year*', 'special-programs*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                        Academic Year
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('school-year.index') }}"
                            class="nav-link {{ Request::is('school-year*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>School Year</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('special-programs.index') }}"
                            class="nav-link {{ Request::is('special-programs*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-star"></i>
                            <p>Special Programs</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('funding-sources*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)" class="nav-link {{ Request::is('funding-sources*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>
                        Funding
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('funding-sources.index') }}"
                            class="nav-link {{ Request::is('funding-sources*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Funding Sources</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">USER MANAGEMENT</li>
            <li class="nav-item {{ Request::is('users*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ Request::is('users*', 'users.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">REPORTS</li>
            <li class="nav-item {{ Request::is('reports*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)" class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Reports
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}"
                            class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>All Reports</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('backup*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)" class="nav-link {{ Request::is('backup*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Backup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backup.index') }}"
                            class="nav-link {{ Request::is('backup*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Manage Backup</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('settings*') ? 'menu-open' : '' }}">
                <a href="javascript:void(0)" class="nav-link {{ Request::is('settings*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}"
                            class="nav-link {{ Request::is('settings*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>General Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile-settings.index') }}"
                            class="nav-link {{ Request::is('profile-settings*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Profile Settings</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
