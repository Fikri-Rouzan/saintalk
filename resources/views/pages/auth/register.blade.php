@extends('layouts.no-nav')

@section('title', 'Register')

@section('content')
    <h5 class="fw-bold text-center mt-5">Register as a New User</h5>

    <div class="center-saintalk mt-4">
        <img class="saintalk" src="{{ asset('assets/app/images/icons/logo.png') }}" alt="">
    </div>
    <div class="d-flex align-items-center mt-4">
        <hr class="flex-grow-1">
        <span class="mx-2">Please fill out the form below to register</span>
        <hr class="flex-grow-1">
    </div>

    <form action="{{ route('register.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" placeholder="Type your email" autocomplete="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" placeholder="Type your full name" autocomplete="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_number" class="form-label">Identity Number</label>
            <input type="number" class="form-control @error('id_number') is-invalid @enderror" id="id_number"
                name="id_number" value="{{ old('id_number') }}" placeholder="Type your identity number">
            @error('id_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Study Program</label>
            <input type="text" class="form-control @error('major') is-invalid @enderror" id="major" name="major"
                value="{{ old('major') }}" placeholder="Type your study program">
            @error('major')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Profile Picture</label>
            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
            @error('avatar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="password-wrapper">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Type your password">
                <span id="toggle-password-icon">
                    <i class="fas fa-eye fa-fw"></i>
                </span>
            </div>
            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit" color="primary" id="btn-login">
            Register
        </button>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none text-primary">Already have an account?</a>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const passwordInput = document.getElementById('password');
        const toggleIconContainer = document.getElementById('toggle-password-icon');
        const icon = toggleIconContainer.querySelector('i');

        toggleIconContainer.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';

            passwordInput.setAttribute('type', type);

            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
