<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="hidden-lg hidden-md">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Mike John responded to your email</a>
                        </li>
                        <li>
                            <a href="#">You have 5 new tasks</a>
                        </li>
                        <li>
                            <a href="#">You're now friend with Andrew</a>
                        </li>
                        <li>
                            <a href="#">Another Notification</a>
                        </li>
                        <li>
                            <a href="#">Another One</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('teacher.logout-teacher') }}" class="dropdown-toggle">
                        <i class="material-icons">logout</i>
                        Đăng Xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
