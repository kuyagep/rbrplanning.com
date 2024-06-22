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

            <div class="nav-item {{ Request::is('inventory-of-classrooms*') ? 'active' : '' }}">
                <a href="{{ route('inventory-of-classrooms.index') }}"><i class="ik ik-layers"></i><span>Inventory of
                        Classrooms</span></a>
            </div>
            <div class="nav-item {{ Request::is('inventory-of-school-buildings*') ? 'active' : '' }}">
                <a href="{{ route('inventory-of-school-buildings.index') }}"><i
                        class="ik ik-layers"></i><span>Inventory of School Buildings</span></a>
            </div>


            <!-- Learner and Attendance Management -->
            <div class="nav-lavel">Learner and Attendance Management</div>
            <div class="nav-item {{ Request::is('registered-learners*') ? 'active' : '' }}">
                <a href="{{ route('registered-learners.index') }}"><i class="ik ik-layers"></i><span>Registered
                        Learners</span></a>
            </div>
            <div class="nav-item {{ Request::is('attendances*') ? 'active' : '' }}">
                <a href="{{ route('attendances.index') }}"><i class="ik ik-layers"></i><span>Attendances</span></a>
            </div>
            <div class="nav-item {{ Request::is('make-shifts*') ? 'active' : '' }}">
                <a href="{{ route('make-shifts.index') }}"><i class="ik ik-layers"></i><span>Make Shifts</span></a>
            </div>
            <div class="nav-item {{ Request::is('dropped-outs*') ? 'active' : '' }}">
                <a href="{{ route('dropped-outs.index') }}"><i class="ik ik-layers"></i><span>Dropped Outs</span></a>
            </div>
            <div class="nav-item {{ Request::is('transferred-in*') ? 'active' : '' }}">
                <a href="{{ route('transferred-in.index') }}"><i class="ik ik-layers"></i><span>Transferred
                        In</span></a>
            </div>
            <div class="nav-item {{ Request::is('transferred-out*') ? 'active' : '' }}">
                <a href="{{ route('transferred-out.index') }}"><i class="ik ik-layers"></i><span>Transferred
                        Out</span></a>
            </div>

        </nav>
    </div>
</div>
