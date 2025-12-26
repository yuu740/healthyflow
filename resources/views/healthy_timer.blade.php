@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold m-0">{{ __('timer.title') }}</h4>
    <p class="text-muted small">{{ __('timer.subtitle') }}</p>
</div>

<div class="row g-3">
    @foreach(['fasting', 'pomodoro', 'meditation', 'sleep'] as $type)
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-light p-3 rounded-circle text-teal">
                        <i class="bi bi-{{ $type == 'fasting' ? 'hourglass-split' : ($type == 'pomodoro' ? 'brain' : ($type == 'meditation' ? 'wind' : 'moon-stars')) }} fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ __('timer.types.'.$type) }}</h6>
                        <small class="text-muted">{{ __('timer.types.'.$type.'_desc') }}</small>
                    </div>
                </div>
                <button class="btn btn-teal-light rounded-circle shadow-sm" style="width: 45px; height: 45px;">
                    <i class="bi bi-play-fill fs-5"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
    .btn-teal-light { background: #e0f2f1; color: #00695c; border: none; }
</style>
@endsection
