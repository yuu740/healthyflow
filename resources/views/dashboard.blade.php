@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold m-0">{{ __('dashboard.title') }}</h4>
    <p class="text-muted small">{{ __('dashboard.subtitle') }}</p>
</div>

<div class="alert bg-white border-0 shadow-sm rounded-4 mb-4 d-flex align-items-start p-3">
    <div class="bg-info bg-opacity-10 text-info p-2 rounded-3 me-3">
        <i class="bi bi-lightbulb-fill fs-4"></i>
    </div>
    <div>
        <h6 class="fw-bold text-dark mb-1" style="font-size: 0.9rem;">{{ __('dashboard.insight.title') }}</h6>
        <p class="mb-0 text-muted small" style="line-height: 1.4;">
            {{ __('dashboard.insight.content') }}
        </p>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background: linear-gradient(to bottom right, #ffffff, #e0f2f1);">
            <div class="d-flex justify-content-between mb-2">
                <i class="bi bi-droplet-fill text-primary fs-5"></i>
                <span class="badge bg-white text-dark shadow-sm rounded-pill py-1 px-2" style="font-size: 10px;">
                    Goal: {{ $goals['water'] }} {{ $goals['unit'] }}
                </span>
            </div>
            <h3 class="fw-bold mb-0 text-dark">{{ $todayWater }} <span class="fs-6 text-muted">{{ $goals['unit'] }}</span></h3>
            <small class="text-muted display-block mb-2">{{ __('dashboard.metrics.water') }}</small>

            @php
                $waterPercent = $goals['water'] > 0 ? ($todayWater / $goals['water']) * 100 : 0;
            @endphp
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary" style="width: {{ $waterPercent }}%"></div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background: linear-gradient(to bottom right, #ffffff, #f3e5f5);">
            <div class="d-flex justify-content-between mb-2">
                <i class="bi bi-moon-stars-fill text-purple fs-5" style="color: #7b1fa2;"></i>
                <span class="badge bg-white text-dark shadow-sm rounded-pill py-1 px-2" style="font-size: 10px;">
                    Goal: {{ $goals['sleep'] }}h
                </span>
            </div>
            <h3 class="fw-bold mb-0 text-dark">{{ $todaySleep }} <span class="fs-6 text-muted">{{ __('dashboard.units.hours') }}</span></h3>
            <small class="text-muted display-block mb-2">{{ __('dashboard.metrics.sleep') }}</small>

            @php $sleepPercent = ($todaySleep / $goals['sleep']) * 100; @endphp
            <div class="progress" style="height: 6px;">
                <div class="progress-bar" style="width: {{ $sleepPercent }}%; background-color: #7b1fa2;"></div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="text-end">
                    <h5 class="fw-bold mb-0 text-success">{{ $todayActivity }} <span class="fs-6 text-muted">{{ __('dashboard.units.mins') }}</span></h5>
                    <small class="text-muted" style="font-size: 10px">Target: {{ $goals['activity'] }}</small>
                </div>
            </div>
            @php $actPercent = $goals['activity'] > 0 ? ($todayActivity / $goals['activity']) * 100 : 0; @endphp
            <div class="progress" style="height: 8px; border-radius: 10px;">
                <div class="progress-bar bg-warning" style="width: {{ $actPercent }}%"></div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold m-0">{{ __('dashboard.recent_activity') ?? 'Recent Activity' }}</h6>
        <a href="{{ route('daily_logs') }}" class="text-decoration-none small fw-bold" style="font-size: 0.8rem;">
            {{ __('dashboard.see_all') }} <i class="bi bi-chevron-right"></i>
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
    @forelse($recentActivity as $log)
        <div class="d-flex align-items-center mb-3 last:mb-0">
            <div class="bg-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-person-walking text-primary"></i>
            </div>
            <div class="flex-grow-1">
                <p class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">{{ $log->activity_name }}</p>
                <small class="text-muted">{{ $log->duration_minutes }} {{ __('dashboard.units.mins') }}</small>
            </div>
            <small class="text-muted" style="font-size: 0.75rem;">
                {{ $log->logged_at->format('H:i') }}
            </small>
        </div>
        
        @if(!$loop->last) <hr class="my-2 text-muted opacity-25"> @endif
    @empty
        <div class="text-center py-2">
            <small class="text-muted">No activities yet today.</small>
        </div>
    @endforelse
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <h6 class="fw-bold mb-4">{{ __('dashboard.weekly') }}</h6>
    <div class="d-flex justify-content-between align-items-end" style="height: 100px;">
        @foreach($weekly as $data)
            <div class="text-center d-flex flex-column align-items-center gap-2" style="width: 100%;">
                @php
                    $height = $data['value'] > 100 ? 100 : $data['value'];
                    $color = $data['is_today'] ? '#00695c' : '#e2e8f0';
                @endphp

                <div style="width: 8px; height: {{ $height }}%; background-color: {{ $color }}; border-radius: 10px; min-height: 4px;"></div>
                <small class="text-muted" style="font-size: 10px;">{{ $data['day'] }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
