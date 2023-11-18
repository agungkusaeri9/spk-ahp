<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Laravel Blog</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">LB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Artikel</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-list-alt"></i>
                    <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Tambah Data</a></li>
                    <li><a href="">Lihat Data</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-tags"></i>
                    <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Tambah Data</a></li>
                    <li><a href="">Lihat Data</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                    <span>Artikel</span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Tambah Data</a></li>
                    <li><a href="">Lihat Data</a></li>
                </ul>
            </li>
            <li class="menu-header">SEO</li>
            <li><a class="nav-link" href=""><i class="fas fa-cog"></i>
                    <span>Halaman Statis</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-cog"></i>
                    <span>Halaman Dinamis</span></a></li>
            <li class="menu-header">MASTER</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a href="">Tambah Data</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Lihat Data</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href=""><i class="fas fa-folder"></i>
                    <span>File Manager</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-folder"></i>
                    <span>Role</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-folder"></i>
                    <span>Hak Akses</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-cog"></i>
                    <span>Pengaturan Web</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-sitemap"></i>
                    <span>Perbaharui Sitemap</span></a></li>
        </ul>

    </aside>
</div>
