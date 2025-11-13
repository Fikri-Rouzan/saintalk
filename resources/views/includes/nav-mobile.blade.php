<div class="floating-button-container d-flex" onclick="window.location.href = 'create-report'">
    <button class="floating-button">
        <i class="fa-solid fa-camera"></i>
    </button>
</div>

<nav class="nav-mobile d-flex">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="fas fa-house"></i>
        Home
    </a>
    <a href="{{ route('report.index') }}" class="{{ request()->routeIs('report.index') ? 'active' : '' }}">
        <i class="fas fa-solid fa-clipboard-list"></i>
        All Reports
    </a>

    <div></div>
    <div></div>
    <div></div>
    <div></div>

    <a href="{{ route('report.myreport', ['status' => 'delivered']) }}"
        class="{{ request()->routeIs('report.myreport') ? 'active' : '' }}">
        <i class="fas fa-solid fa-clipboard-user"></i>
        My Reports
    </a>

    @auth
        <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            Profile
        </a>
    @else
        <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">
            <i class="fas fa-solid fa-right-to-bracket"></i>
            Register
        </a>
    @endauth
</nav>
