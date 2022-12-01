<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
        <div class="d-sm-none d-lg-inline-block">{{auth_admin()->name}}</div></a>
    <div class="dropdown-menu dropdown-menu-right">

        <a href="{{route('admin::user.change_password_page')}}" class="dropdown-item has-icon">
            <i class="fas fa-key"></i></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('admin::auth.logout')}}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</li>
