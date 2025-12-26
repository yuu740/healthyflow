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
                    {{ __('dashboard.units.goal') }}: 2{{ __('dashboard.units.liter') }}
                </span>
            </div>
            <h3 class="fw-bold mb-0 text-dark">1.5 <span class="fs-6 text-muted">{{ __('dashboard.units.liter') }}</span></h3>
            <small class="text-muted display-block mb-2">{{ __('dashboard.metrics.water') }}</small>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary" style="width: 75%"></div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background: linear-gradient(to bottom right, #ffffff, #f3e5f5);">
            <div class="d-flex justify-content-between mb-2">
                <i class="bi bi-moon-stars-fill text-purple fs-5" style="color: #7b1fa2;"></i>
                <span class="badge bg-white text-dark shadow-sm rounded-pill py-1 px-2" style="font-size: 10px;">
                    {{ __('dashboard.units.goal') }}: 8{{ __('dashboard.units.hours') }}
                </span>
            </div>
            <h3 class="fw-bold mb-0 text-dark">6.5 <span class="fs-6 text-muted">{{ __('dashboard.units.hours') }}</span></h3>
            <small class="text-muted display-block mb-2">{{ __('dashboard.metrics.sleep') }}</small>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar" style="width: 80%; background-color: #7b1fa2;"></div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning bg-opacity-10 p-2 rounded-3 text-warning">
                        <i class="bi bi-person-walking fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ __('dashboard.metrics.activity') }}</h6>
                        <small class="text-muted">{{ __('dashboard.metrics.activity_desc') }}</small>
                    </div>
                </div>
                <div class="text-end">
                    <h5 class="fw-bold mb-0 text-success">45 <span class="fs-6 text-muted">{{ __('dashboard.units.mins') }}</span></h5>
                </div>
            </div>
            <div class="progress" style="height: 8px; border-radius: 10px;">
                <div class="progress-bar bg-warning" style="width: 60%"></div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <h6 class="fw-bold mb-4">{{ __('dashboard.weekly') }}</h6>
    <div class="d-flex justify-content-between align-items-end" style="height: 100px;">
        @foreach(['M','T','W','T','F','S','S'] as $index => $day)
            <div class="text-center d-flex flex-column align-items-center gap-2">
                <div style="width: 8px; height: {{ rand(30, 80) }}%; background-color: {{ $index == 6 ? '#00695c' : '#e2e8f0' }}; border-radius: 10px;"></div>
                <small class="text-muted" style="font-size: 10px;">{{ $day }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
