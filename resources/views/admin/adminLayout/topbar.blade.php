<nav class="navbar navbar-header navbar-expand-lg">
	<div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="notif-center">
                            <a href="{{ route('admin.userAccount.index') }}">
                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                <div class="notif-content">
                                    <span class="block">
                                        User Account
                                    </span>
                                </div>
                            </a>
                            <a href="{{ route('admin.academicYear.index') }}">
                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                <div class="notif-content">
                                    <span class="block">
                                        Academic Year
                                    </span> 
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <p class="text-white">{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>