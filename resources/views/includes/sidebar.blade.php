<ul class="navbar-saintalk navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/admin/img/Logo.png') }}" class="saintalk" alt=""></img>
        </div>
        <div class="sidebar-brand-text mx-3">SainTalk Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-5">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/resident*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.resident.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>FST Residents Data</span></a>
    </li>

    <li class="nav-item {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categories Data</span></a>
    </li>

    <li class="nav-item {{ request()->is('admin/report*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.report.index') }}">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Reports Data</span></a>
    </li>
</ul>
