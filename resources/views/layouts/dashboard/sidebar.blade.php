<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            {{-- <div class="nav-lavel">Navigation</div> --}}
            <div class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}"><i class="ik ik-home"></i><span>Dashboard</span></a>
            </div>

            <div class="nav-item has-sub {{ Request::is('personnel', 'personnel/create') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-users"></i>
                    <span>Personnel</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ url('/personnel') }}"
                        class="menu-item {{ Request::is('personnel', 'personnel/create') ? 'active' : '' }}">
                        Personnel
                    </a>
                </div>
            </div>

            <div class="nav-item has-sub {{ Request::is('positions', 'positions/create') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-user-check"></i>
                    <span>Positions</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ url('/positions') }}"
                        class="menu-item {{ Request::is('positions', 'positions/create') ? 'active' : '' }}">
                        Positions
                    </a>
                </div>
            </div>

            <div
                class="nav-item has-sub {{ Request::is('employment-statuses', 'employment-statuses/create') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-check-circle"></i>
                    <span>Employment Status</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ url('/employment-statuses') }}"
                        class="menu-item {{ Request::is('employment-statuses', 'employment-statuses/create') ? 'active' : '' }}">
                        Employment Status
                    </a>
                </div>
            </div>

            <div class="nav-item {{ Request::is('funding-sources') ? 'active' : '' }}">
                <a href="{{ url('/funding-sources') }}"><i class="ik ik-dollar-sign"></i><span>Funding
                        Sources</span></a>
            </div>

            <div class="nav-item {{ Request::is('registered-learners') ? 'active' : '' }}">
                <a href="{{ url('/registered-learners') }}"><i class="ik ik-users"></i><span>Registered
                        Learners</span></a>
            </div>

            <div
                class="nav-item has-sub {{ Request::is('users', 'users/create', 'all.user', 'create.user') ? 'active open' : '' }}">
                <a href="javascript:void(0)"><i class="ik ik-user"></i>
                    <span>Manage Users</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('all.user') }}"
                        class="menu-item {{ Request::is('users', 'all.user') ? 'active' : '' }}">All Users</a>
                    <a href="{{ route('create.user') }}"
                        class="menu-item {{ Request::is('users/create', 'create.user') ? 'active' : '' }}">Create
                        User</a>
                </div>
            </div>

            <div class="nav-item {{ Request::is('regions') ? 'active' : '' }}">
                <a href="{{ url('/regions') }}"><i class="ik ik-map"></i><span>Regions</span></a>
            </div>

            <div class="nav-item {{ Request::is('divisions') ? 'active' : '' }}">
                <a href="{{ url('/divisions') }}"><i class="ik ik-map-pin"></i><span>Divisions</span></a>
            </div>

            <div class="nav-item {{ Request::is('schools') ? 'active' : '' }}">
                <a href="{{ url('/schools') }}"><i class="ik ik-home"></i><span>Schools</span></a>
            </div>

            <div class="nav-item {{ Request::is('sections') ? 'active' : '' }}">
                <a href="{{ url('/sections') }}"><i class="ik ik-folder"></i><span>Sections</span></a>
            </div>

            <div class="nav-item {{ Request::is('grade-level-categories') ? 'active' : '' }}">
                <a href="{{ url('/grade-level-categories') }}"><i class="ik ik-book-open"></i><span>Grade Level
                        Categories</span></a>
            </div>

            <div class="nav-item {{ Request::is('grade-levels') ? 'active' : '' }}">
                <a href="{{ url('/grade-levels') }}"><i class="ik ik-book"></i><span>Grade Levels</span></a>
            </div>

            <div class="nav-item {{ Request::is('extension-schools') ? 'active' : '' }}">
                <a href="{{ url('/extension-schools') }}"><i class="ik ik-box"></i><span>Extension Schools</span></a>
            </div>

            <div class="nav-item {{ Request::is('inventory-of-classrooms') ? 'active' : '' }}">
                <a href="{{ url('/inventory-of-classrooms') }}"><i class="ik ik-layers"></i><span>Inventory of
                        Classrooms</span></a>
            </div>

            <div class="nav-item {{ Request::is('inventory-of-school-buildings') ? 'active' : '' }}">
                <a href="{{ url('/inventory-of-school-buildings') }}"><i class="ik ik-layers"></i><span>Inventory of
                        School Buildings</span></a>
            </div>

            <div class="nav-item {{ Request::is('attendances') ? 'active' : '' }}">
                <a href="{{ url('/attendances') }}"><i class="ik ik-check"></i><span>Attendances</span></a>
            </div>

            <div class="nav-item {{ Request::is('make-shifts') ? 'active' : '' }}">
                <a href="{{ url('/make-shifts') }}"><i class="ik ik-clock"></i><span>Make Shifts</span></a>
            </div>

            <div class="nav-item {{ Request::is('dropped-outs') ? 'active' : '' }}">
                <a href="{{ url('/dropped-outs') }}"><i class="ik ik-trash-2"></i><span>Dropped Outs</span></a>
            </div>

            <div class="nav-item {{ Request::is('school-year') ? 'active' : '' }}">
                <a href="{{ url('/school-year') }}"><i class="ik ik-calendar"></i><span>School Year</span></a>
            </div>

            <div class="nav-item {{ Request::is('specializations') ? 'active' : '' }}">
                <a href="{{ url('/specializations') }}"><i class="ik ik-bookmark"></i><span>Specializations</span></a>
            </div>

            <div class="nav-item {{ Request::is('special-programs') ? 'active' : '' }}">
                <a href="{{ url('/special-programs') }}"><i class="ik ik-star"></i><span>Special Programs</span></a>
            </div>

            <div class="nav-item {{ Request::is('strands') ? 'active' : '' }}">
                <a href="{{ url('/strands') }}"><i class="ik ik-map-pin"></i><span>Strands</span></a>
            </div>

            <div class="nav-item {{ Request::is('tls') ? 'active' : '' }}">
                <a href="{{ url('/tls') }}"><i class="ik ik-aperture"></i><span>TLS</span></a>
            </div>

            <div class="nav-item {{ Request::is('tracks') ? 'active' : '' }}">
                <a href="{{ url('/tracks') }}"><i class="ik ik-award"></i><span>Tracks</span></a>
            </div>

            <div class="nav-item {{ Request::is('transferred-in') ? 'active' : '' }}">
                <a href="{{ url('/transferred-in') }}"><i class="ik ik-upload"></i><span>Transferred In</span></a>
            </div>

            <div class="nav-item {{ Request::is('transferred-out') ? 'active' : '' }}">
                <a href="{{ url('/transferred-out') }}"><i class="ik ik-download"></i><span>Transferred Out</span></a>
            </div>

            <div class="nav-item {{ Request::is('year-levels') ? 'active' : '' }}">
                <a href="{{ url('/year-levels') }}"><i class="ik ik-hash"></i><span>Year Levels</span></a>
            </div>

        </nav>
    </div>
</div>
