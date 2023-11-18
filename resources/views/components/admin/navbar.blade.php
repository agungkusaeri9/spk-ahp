<div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        <ul class="navbar-nav navbar-right ml-auto">
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}/"
                        class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Str::ucfirst(auth()->user()->name) }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title"></div>
                    <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="{{ route('admin.change-password.index') }}" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Ubah Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" onclick="document.getElementById('formLogout').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="formLogout">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
