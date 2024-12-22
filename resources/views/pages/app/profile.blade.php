@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

    <h4 class="profile-headline">My Profile</h4>

    <div class="d-flex flex-column justify-content-center align-items-center gap-2 mt-4">
        <img src="{{ asset('storage/' . Auth::user()->resident->avatar) }}" alt="avatar" class="avatar">
        <h5 class="myname mt-3">{{ Auth::user()->name }}</h5>
    </div>

    <div class="mt-5">
        <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="fw-bold">Detailed Information</h5>
                </div>
            </div>
        </div>

        <div class="list-group list-group-flush">
            <a class="list-group-item d-flex justify-content-between align-items-center mt-2">
                <div class="d-flex align-items-center">
                    <div style="width: 2em; text-align: center; margin-right: 17px;">
                        <i class="fa-solid fa-user" style="font-size: 1.5em;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Full Name</h6>
                        <p class="fw-light mb-0 mt-1">{{ Auth::user()->name }}</p>
                    </div>
                </div>
            </a>
            <a class="list-group-item d-flex justify-content-between align-items-center mt-2">
                <div class="d-flex align-items-center">
                    <div style="width: 2em; text-align: center; margin-right: 17px;">
                        <i class="fa-solid fa-id-card" style="font-size: 1.5em;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Identity Number</h6>
                        <p class="fw-light mb-0 mt-1">{{ Auth::user()->resident->id_number }}</p>
                    </div>
                </div>
            </a>
            <a class="list-group-item d-flex justify-content-between align-items-center mt-2">
                <div class="d-flex align-items-center">
                    <div style="width: 2em; text-align: center; margin-right: 17px;">
                        <i class="fa-solid fa-book" style="font-size: 1.5em;"></i>
                    </div>
                    <div style="">
                        <h6 class="fw-bold mb-0">Study Program</h6>
                        <p class="fw-light mb-0 mt-1">{{ Auth::user()->resident->major }}</p>
                    </div>
                </div>
            </a>
            <a class="list-group-item d-flex justify-content-between align-items-center mt-2">
                <div class="d-flex align-items-center">
                    <div style="width: 2em; text-align: center; margin-right: 17px;">
                        <i class="fa-solid fa-envelope" style="font-size: 1.5em;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Email</h6>
                        <p class="fw-light mb-0 mt-1">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="mt-4 mb-5">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <button class="btn btn-outline-danger w-100 rounded-pill"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log Out
            </button>
        </div>
    </div>
@endsection
