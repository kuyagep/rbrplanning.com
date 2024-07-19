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

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent nav-collapse-hide-child"
            data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">HOME</li>
            <li class="nav-item">
                <a href="{{ route('user.dashboard.index') }}"
                    class="nav-link {{ Request::routeIs('user.dashboard.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <span class="right badge badge-success">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.school-form.index') }}"
                    class="nav-link {{ Request::routeIs('user.school-form.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        School Form 4
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sections.index') }}"
                    class="nav-link {{ Request::routeIs('sections.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Manage Sections
                    </p>
                </a>
            </li>
            <li class="nav-header">PERSONNEL MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('user.personnels.index') }}"
                    class="nav-link {{ Request::routeIs('user.personnels.*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Personnel
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.existing-buildings.index') }}"
                    class="nav-link {{ Request::routeIs('user.existing-buildings*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        IBldg, CL and Furniture
                    </p>
                </a>
            </li>
            <li class="nav-header">LEARNER MANAGEMENT</li>
            <li class="nav-item">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Registered Learners
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Registered Learners
                    </p>
                </a>
            </li>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
