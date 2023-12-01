<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">SKP AHP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">AHP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kriteria.index') }}"><i class="fas fa-database"></i>
                    <span>Kriteria</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.sub-kriteria.index') }}"><i class="fas fa-database"></i>
                    <span>Sub Kriteria</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-balance-scale"></i>
                    <span>Matrik Perbandingan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('admin.perbandingan-kriteria.index') }}">Kriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.perbandingan-sub-kriteria.index') }}">Sub Kriteria</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.alternatif-kriteria.index') }}">
                    <i class="fas fa-pen"></i>
                    <span>Penilaian Alternatif</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.hasil.index') }}">
                    <i class="fas fa-flag-checkered"></i>
                    <span>Hasil</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-database"></i>
                    <span>Master Data</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('admin.users.index') }}">User</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.nilai.index') }}">Nilai</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pengaturan.index') }}">Pengaturan Web</a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
