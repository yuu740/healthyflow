@extends('layouts.app')

@section('content')
<h2 class="section-title">Your Daily Progress</h2>
<p class="section-subtitle">Track your wellness metrics at a glance</p>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card p-4 h-100">
            <h6 class="fw-bold mb-3">Daily Hydration</h6>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-teal" style="color: var(--hf-primary);">1500 ml</h1>
                    <small class="text-muted">Target : 2000 ml</small>
                </div>
                <i class="bi bi-droplet-fill text-primary fs-1"></i>
            </div>
            <div class="progress mt-3" style="height: 10px; border-radius: 10px;">
                <div class="progress-bar" role="progressbar" style="width: 75%; background-color: var(--hf-primary);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="mt-2 d-block text-muted">75% of daily goal</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4 h-100">
            <h6 class="fw-bold mb-3">Daily Activity</h6>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-success">60 mins</h1>
                    <small class="text-muted">Target : 40 mins</small>
                </div>
                <i class="bi bi-person-running text-warning fs-1"></i>
            </div>
            <div class="progress mt-3" style="height: 10px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="mt-2 d-block text-muted">100% of daily goal</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card p-4">
            <h6 class="fw-bold mb-4">Weekly Hydration</h6>
            <div class="d-flex justify-content-around align-items-end" style="height: 150px;">
                @foreach([40, 30, 30, 50, 30, 45, 60] as $h)
                    <div class="text-center">
                        <div style="width: 20px; height: {{ $h*2 }}px; background-color: var(--hf-primary); border-radius: 4px 4px 0 0;"></div>
                        <small style="font-size: 10px;">Day</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4">
            <h6 class="fw-bold mb-4">Weekly Activity</h6>
            <div class="d-flex justify-content-around align-items-end" style="height: 150px;">
                @foreach([40, 35, 35, 50, 30, 40, 55] as $a)
                    <div class="text-center">
                        <div style="width: 20px; height: {{ $a*2 }}px; background-color: #6da252; border-radius: 4px 4px 0 0;"></div>
                        <small style="font-size: 10px;">Day</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
