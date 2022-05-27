<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">Hr Hub</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded"
                     src="{{ auth()->user()->profileImgPath() }}"
                     alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <span
                    class="user-role">{{ auth()->user()->department ? auth()->user()->department->title : "NO Department " }}</span>
                <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>Menu</span>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('department.index') }}">
                        <i class="fa fa-sitemap"></i>
                        <span>Department</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('role.index') }}">
                        <i class="fa fa-shield"></i>
                        <span>Role</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Maps</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Google maps</a>
                            </li>
                            <li>
                                <a href="#">Open street map</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
</nav>
