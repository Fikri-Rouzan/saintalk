@extends('layouts.no-nav')

@section('title', 'Log in')

@section('content')
    <h5 class="fw-bold text-center mt-5">Welcome to SainTalk 👋</h5>

    <div class="center-saintalk mt-4">
        <img class="saintalk" src="{{ asset('assets/app/images/icons/SainTalk.png') }}" alt="">
    </div>

    <div class="d-flex align-items-center mt-4">
        <hr class="flex-grow-1">
        <span class="mx-2">Please log in to continue</span>
        <hr class="flex-grow-1">
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert"
            style="background-color: #e6f9e6; border-color: #b2e2b2;">
            <i class="fas fa-check-circle me-2" style="color: #28a745"></i>
            <div>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Type your email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="Type your password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit" color="primary" id="btn-login">
            Log in
        </button>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Don't have an account?</a>
        </div>
    </form>
@endsection
