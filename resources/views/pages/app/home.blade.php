@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h6 class="greeting">
        @auth
            <h6 class="greeting">Hi, {{ Auth::user()->name }} 👋</h6>
        @else
            <h6 class="greeting">Welcome 👋</h6>
        @endauth
    </h6>
    <h4 class="home-headline">Report your issue and we will address it promptly</h4>

    <div class="d-flex align-items-center justify-content-between gap-4 py-3 overflow-auto" id="category"
        style="white-space: nowrap;">
        @foreach ($categories as $category)
            <a href="{{ route('report.index', ['category' => $category->name]) }}" class="category d-inline-block">
                <div class="icon">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="icon">
                </div>
                <p>{{ $category->name }}</p>
            </a>
        @endforeach
    </div>

    <div class="py-3" id="reports">
        <div class="d-flex justify-content-between align-items-center">
            <h6>Latest Reports</h6>
            <a href="{{ route('report.index') }}" class="text-primary text-decoration-none show-more">
                View All
            </a>
        </div>

        <div class="d-flex flex-column gap-3 mt-3">
            @foreach ($reports as $report)
                <div class="card card-report border-0 shadow-none">
                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">
                        <div class="card-body p-0">
                            <div class="card-report-image position-relative mb-2">
                                <img src="{{ asset('storage/' . $report->image) }}" alt="">
                                @if ($report->reportStatuses->last()->status === 'delivered')
                                    <div class="badge-status on-process">
                                        Delivered
                                    </div>
                                @endif

                                @if ($report->reportStatuses->last()->status === 'in_process')
                                    <div class="badge-status on-process">
                                        In Process
                                    </div>
                                @endif

                                @if ($report->reportStatuses->last()->status === 'completed')
                                    <div class="badge-status done">
                                        Completed
                                    </div>
                                @endif

                                @if ($report->reportStatuses->last()->status === 'rejected')
                                    <div class="badge-status reject">
                                        Rejected
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <div class="d-flex align-items-center ">
                                    <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                        class="icon me-2">
                                    <p class="text-primary city">
                                        {{ \Str::substr($report->location, 0, 20) }}...
                                    </p>
                                </div>

                                <p class="text-secondary date">
                                    {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y H:i') }}
                                </p>
                            </div>

                            <h1 class="card-title">
                                {{ $report->title }}
                            </h1>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
