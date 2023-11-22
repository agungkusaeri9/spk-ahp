<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">SKP AHP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">AHP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-folder"></i>
                    <span>Matrik Perbandingan</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.perbandingan-kriteria.index') }}">Kriteria</a></li>
                    <li><a href="{{ route('admin.perbandingan-sub-kriteria.index') }}">Sub Kriteria</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                    <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.users.index') }}">User</a></li>
                    <li><a href="{{ route('admin.kriteria.index') }}">Kriteria</a></li>
                    <li><a href="{{ route('admin.sub-kriteria.index') }}">Sub Kriteria</a></li>
                    <li><a href="{{ route('admin.alternatif.index') }}">Alternatif</a></li>
                    <li><a href="{{ route('admin.nilai.index') }}">Nilai</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
