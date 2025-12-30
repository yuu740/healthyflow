@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold m-0">{{ __('settings.title') }}</h4>
    <p class="text-muted small">{{ __('settings.subtitle') }}</p>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
        <i class="bi bi-translate text-teal"></i> {{ __('settings.localization') }}
    </h6>

    <div class="row g-4">
        <div class="col-12">
            <label class="d-block mb-2 text-muted small fw-bold text-uppercase ls-1">{{ __('settings.unit_label') }}</label>
            <div class="btn-group w-100 p-1 bg-light rounded-3" role="group">
                <input type="radio" class="btn-check" name="unit" id="ml" autocomplete="off" checked>
                <label class="btn btn-outline-hf border-0 rounded-3 py-2 fw-semibold" for="ml">Metric (ml/kg)</label>

                <input type="radio" class="btn-check" name="unit" id="oz" autocomplete="off">
                <label class="btn btn-outline-hf border-0 rounded-3 py-2 fw-semibold" for="oz">Imperial (oz/lbs)</label>
            </div>
        </div>

        <div class="col-12">
            <label class="d-block mb-2 text-muted small fw-bold text-uppercase ls-1">{{ __('settings.lang_label') }}</label>
            <div class="d-flex gap-2">
                <a href="{{ route('switch.language', 'en') }}"
                   class="btn w-50 py-2 fw-bold {{ app()->getLocale() == 'en' ? 'btn-teal' : 'btn-light text-dark border' }} rounded-3 shadow-sm">
                   English
                </a>
                <a href="{{ route('switch.language', 'id') }}"
                   class="btn w-50 py-2 fw-bold {{ app()->getLocale() == 'id' ? 'btn-teal' : 'btn-light text-dark border' }} rounded-3 shadow-sm">
                   Indonesia
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
        <i class="bi bi-bullseye text-teal"></i> {{ __('settings.target_title') }}
    </h6>

    <form action="{{ route('update.goals') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">{{ __('settings.hydration_goal') }}</label>
            <div class="input-group">
                <input type="number" name="water_goal" class="form-control border-0 bg-light py-2" value="{{ Session::get('user_goals.water', 2000) }}">
                <select name="unit" class="input-group-text border-0 bg-light">
                    <option value="ml" {{ Session::get('user_goals.unit') == 'ml' ? 'selected' : '' }}>ml</option>
                    <option value="oz" {{ Session::get('user_goals.unit') == 'oz' ? 'selected' : '' }}>oz</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="small text-muted fw-bold mb-1">{{ __('settings.activity_goal') }} (mins)</label>
            <input type="number" name="activity_goal" class="form-control border-0 bg-light py-2" value="{{ Session::get('user_goals.activity', 45) }}">
        </div>

        <button type="submit" class="btn btn-teal w-100 py-2 rounded-3 shadow-sm fw-bold">
            {{ __('settings.btn_update') }}
        </button>
    </form>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
        <i class="bi bi-person-fill-gear text-teal"></i> {{ __('settings.account_settings') }}
    </h6>

    <div class="d-flex justify-content-between align-items-center mb-4 p-2 rounded-3 bg-light bg-opacity-50">
        <div>
            <div class="small text-muted fw-bold text-uppercase ls-1" style="font-size: 10px;">Email Address</div>
            <div class="text-truncate fw-semibold" style="max-width: 150px;">{{ Session::get('user_email', 'ppp@gmail.com') }}</div>
        </div>
        <button class="btn btn-white btn-sm px-3 shadow-sm border rounded-pill">{{ __('settings.change_email') }}</button>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 p-2 rounded-3 bg-light bg-opacity-50">
        <div>
            <div class="small text-muted fw-bold text-uppercase ls-1" style="font-size: 10px;">Password</div>
            <div class="fw-semibold">••••••••</div>
        </div>
        <button class="btn btn-white btn-sm px-3 shadow-sm border rounded-pill">{{ __('settings.change_password') }}</button>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger w-100 py-3 rounded-4 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
            <i class="bi bi-box-arrow-right"></i> {{ __('settings.logout') }}
        </button>
    </form>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <h6 class="fw-bold mb-2">{{ __('settings.about_title') }}</h6>
    <p class="small text-muted mb-4 lh-base">
        {{ __('settings.about_desc') }}
    </p>

    <a href="{{ route('about') }}" class="btn btn-outline-teal w-100 py-2 rounded-3 fw-bold mb-4">
        <i class="bi bi-info-circle me-2"></i> {{ __('about.title') }}
    </a>

    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
        <small class="text-muted fw-bold">{{ __('settings.version') }} 1.0</small>
        <small class="text-muted">© 2025 HealthyFlow</small>
    </div>
</div>

<style>
    .ls-1 { letter-spacing: 0.5px; }
    .btn-outline-hf { color: #64748b; background: transparent; }
    .btn-check:checked + .btn-outline-hf { background: #fff !important; color: var(--hf-primary) !important; box-shadow: 0 4px 10px rgba(0,0,0,0.05) !important; }
</style>
@endsection
