<div class="floating-button-container d-flex" onclick="window.location.href = 'take-report'">
    <button class="floating-button">
        <i class="fa-solid fa-camera"></i>
    </button>
</div>

<nav class="nav-mobile d-flex">
    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">
        <i class="fas fa-house"></i>
        Home
    </a>

    <a href="{{ route('report.index') }}" class="">
        <i class="fas fa-solid fa-clipboard-list"></i>
        All Reports
    </a>

    <div></div>
    <div></div>
    <div></div>
    <div></div>

    <a href="{{ route('report.myreport', ['status' => 'delivered']) }}" class="">
        <i class="fas fa-solid fa-clipboard-user"></i>
        My Reports
    </a>

    @auth
        <a href="{{ route('profile') }}" class="">
            <i class="fas fa-user"></i>
            Profile
        </a>
    @else
        <a href="{{ route('register') }}" class="">
            <i class="fas fa-solid fa-right-to-bracket"></i>
            Register
        </a>
    @endauth
</nav>
