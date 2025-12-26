@extends('layouts.app')

@section('content')
<h4 class="fw-bold mb-1">{{ __('logs.title') }}</h4>
<p class="text-muted small mb-4">{{ __('logs.subtitle') }}</p>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
        <i class="bi bi-plus-circle-fill text-teal"></i> {{ __('logs.add_title') }}
    </h6>
    <form>
        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">{{ __('logs.field.water') }}</label>
            <div class="input-group">
                <span class="input-group-text border-0 bg-light rounded-start-3"><i class="bi bi-droplet text-primary"></i></span>
                <input type="number" class="form-control border-0 bg-light py-2 rounded-end-3" placeholder="{{ __('logs.field.placeholder_water') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">{{ __('logs.field.sleep') }}</label>
            <div class="input-group">
                <span class="input-group-text border-0 bg-light rounded-start-3"><i class="bi bi-moon-stars text-purple" style="color:#7b1fa2;"></i></span>
                <input type="number" step="0.1" class="form-control border-0 bg-light py-2 rounded-end-3" placeholder="{{ __('logs.field.placeholder_sleep') }}">
            </div>
        </div>

        <div class="mb-4">
            <label class="small text-muted fw-bold mb-1">{{ __('logs.field.activity') }}</label>
            <div class="input-group">
                <span class="input-group-text border-0 bg-light rounded-start-3"><i class="bi bi-fire text-warning"></i></span>
                <input type="number" class="form-control border-0 bg-light py-2 rounded-end-3" placeholder="{{ __('logs.field.placeholder_activity') }}">
            </div>
        </div>

        <button type="button" class="btn w-100 fw-bold py-2 text-white" style="background-color: var(--hf-primary); border-radius: 12px;">
            {{ __('logs.btn_save') }}
        </button>
    </form>
</div>

<h6 class="fw-bold mb-3 small text-muted text-uppercase ls-1">{{ __('logs.history_title') }}</h6>

<div class="card border-0 shadow-sm rounded-4 p-3 mb-2 bg-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-droplet-fill text-primary"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">{{ __('logs.type.water') }}</h6>
                <small class="text-muted">08:30 AM</small>
            </div>
        </div>
        <span class="fw-bold text-primary">+250 ml</span>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-3 mb-2 bg-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-moon-fill" style="color: #7b1fa2;"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">{{ __('logs.type.sleep') }}</h6>
                <small class="text-muted">{{ __('logs.time.last_night') }}</small>
            </div>
        </div>
        <span class="fw-bold" style="color: #7b1fa2;">7 {{ __('dashboard.units.hours') }}</span>
    </div>
</div>
@endsection
