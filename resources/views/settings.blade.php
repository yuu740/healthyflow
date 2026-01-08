@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show p-2 small border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show p-2 small border-0 shadow-sm" role="alert">
        <i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="mb-4">
    <h4 class="fw-bold m-0">{{ __('settings.title') }}</h4>
    <p class="text-muted small">{{ __('settings.subtitle') }}</p>
</div>

<form action="{{ route('update.goals') }}" method="POST" id="settingsForm">
    @csrf

    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
            <i class="bi bi-translate text-teal"></i> {{ __('settings.localization') }}
        </h6>

        <div class="row g-4">
            <div class="col-12">
                <label class="d-block mb-2 text-muted small fw-bold text-uppercase ls-1">{{ __('settings.unit_label') }}</label>
                <div class="btn-group w-100 p-1 bg-light rounded-3" role="group">
                    <input type="radio" class="btn-check unit-selector" name="unit" value="ml" id="ml"
                        {{ Auth::user()->preferred_unit == 'ml' ? 'checked' : '' }}
                        onchange="convertWaterInput('ml')">
                    <label class="btn btn-outline-hf border-0 rounded-3 py-2 fw-semibold" for="ml">Metric (ml)</label>

                    <input type="radio" class="btn-check unit-selector" name="unit" value="oz" id="oz"
                        {{ Auth::user()->preferred_unit == 'oz' ? 'checked' : '' }}
                        onchange="convertWaterInput('oz')">
                    <label class="btn btn-outline-hf border-0 rounded-3 py-2 fw-semibold" for="oz">Imperial (oz)</label>
                </div>
            </div>

            <div class="col-12">
                <label class="d-block mb-2 text-muted small fw-bold text-uppercase ls-1">{{ __('settings.lang_label') }}</label>
                <div class="d-flex gap-2">
                    <a href="{{ route('switch.language', 'en') }}" class="btn w-50 py-2 fw-bold {{ app()->getLocale() == 'en' ? 'btn-teal' : 'btn-light text-dark border' }} rounded-3 shadow-sm">English</a>
                    <a href="{{ route('switch.language', 'id') }}" class="btn w-50 py-2 fw-bold {{ app()->getLocale() == 'id' ? 'btn-teal' : 'btn-light text-dark border' }} rounded-3 shadow-sm">Indonesia</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
            <i class="bi bi-bullseye text-teal"></i> {{ __('settings.target_title') }}
        </h6>

        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">{{ __('settings.hydration_goal') }}</label>
            <div class="input-group">
                @php
                    $rawGoal = Auth::user()->water_goal;
                    $isOz = Auth::user()->preferred_unit == 'oz';
                    $displayVal = $isOz ? round($rawGoal / 29.5735) : $rawGoal;
                @endphp
                <input type="number" name="water_goal" id="waterGoalInput" class="form-control border-0 bg-light py-2"
                       value="{{ $displayVal }}">
                <span class="input-group-text border-0 bg-light text-muted fw-bold" id="waterUnitLabel">
                    {{ Auth::user()->preferred_unit }}
                </span>
            </div>
            <input type="hidden" id="baseWaterML" value="{{ Auth::user()->water_goal }}">
        </div>

        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">{{ __('settings.sleep_goal') }}</label>
            <div class="input-group">
                <input type="number" step="0.1" name="sleep_goal" class="form-control border-0 bg-light py-2"
                       value="{{ Auth::user()->sleep_goal ?? 8 }}">
                <span class="input-group-text border-0 bg-light text-muted fw-bold">{{ __('settings.unit_hours') }}</span>
            </div>
        </div>

        <div class="mb-4">
            <label class="small text-muted fw-bold mb-1">{{ __('settings.activity_goal') }}</label>
            <div class="input-group">
                <input type="number" name="activity_goal" class="form-control border-0 bg-light py-2"
                       value="{{ Auth::user()->activity_goal }}">
                <span class="input-group-text border-0 bg-light text-muted fw-bold">{{ __('settings.unit_mins') }}</span>
            </div>
        </div>

        <button type="submit" class="btn btn-teal w-100 py-2 rounded-3 shadow-sm fw-bold text-white">
            {{ __('settings.btn_update') }}
        </button>
    </div>
</form>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold mb-4 d-flex align-items-center gap-2">
        <i class="bi bi-person-fill-gear text-teal"></i> {{ __('settings.account_settings') }}
    </h6>

    <div class="d-flex justify-content-between align-items-center mb-4 p-2 rounded-3 bg-light bg-opacity-50">
        <div>
            <div class="small text-muted fw-bold text-uppercase ls-1" style="font-size: 10px;">{{ __('settings.email_label') }}</div>
            <div class="text-truncate fw-semibold" style="max-width: 150px;">{{ Auth::user()->email }}</div>
        </div>
        <button class="btn btn-white btn-sm px-3 shadow-sm border rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#emailModal">
            {{ __('settings.change_email') }}
        </button>
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
    <p class="small text-muted mb-4 lh-base">{{ __('settings.about_desc') }}</p>

    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
        <small class="text-muted fw-bold">{{ __('settings.version') }} 1.0</small>
        <small class="text-muted">© 2026 HealthyFlow</small>
    </div>
</div>

<div class="modal fade" id="emailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">{{ __('settings.modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <p class="text-muted small mb-4">
                    {{ __('settings.modal.desc') }}
                </p>

                <form action="{{ route('update.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="small text-muted fw-bold mb-2">{{ __('settings.modal.new_email') }}</label>
                        <input type="email" name="new_email"
                               class="form-control py-3 @error('new_email') is-invalid @enderror"
                               placeholder="name@example.com" required>
                        @error('new_email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="small text-muted fw-bold mb-2">{{ __('settings.modal.current_password') }}</label>
                        <input type="password" name="password_confirmation"
                               class="form-control py-3 @if(session('error') || $errors->has('password_confirmation')) is-invalid @endif"
                               placeholder="{{ __('settings.modal.placeholder_pass') }}" required>
                        @error('password_confirmation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-3 rounded-3 fw-bold">{{ __('settings.modal.btn_confirm') }}</button>
                        <button type="button" class="btn btn-light py-3 rounded-3 fw-bold text-muted" data-bs-dismiss="modal">{{ __('settings.modal.btn_cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function convertWaterInput(targetUnit) {
        const inputField = document.getElementById('waterGoalInput');
        const unitLabel = document.getElementById('waterUnitLabel');
        let currentValue = parseFloat(inputField.value);

        if (isNaN(currentValue)) return;

        if (targetUnit === 'oz') {
            // ML ke OZ
            inputField.value = Math.round(currentValue / 29.5735);
            unitLabel.innerText = 'oz';
        } else {
            // OZ ke ML
            inputField.value = Math.round(currentValue * 29.5735);
            unitLabel.innerText = 'ml';
        }
    }
</script>

<style>
    .text-teal { color: #00695c !important; }
    .btn-teal { background-color: #00695c; color: white; border: none; }
    .btn-teal:hover { background-color: #004d40; color: white; }
    .ls-1 { letter-spacing: 0.5px; }
    .btn-outline-hf { color: #64748b; background: transparent; border: 1px solid #e2e8f0; }
    .btn-check:checked + .btn-outline-hf { background: #fff !important; color: #00695c !important; border-color: #00695c !important; box-shadow: 0 4px 10px rgba(0,0,0,0.05) !important; }
    .modal-backdrop.show { opacity: 0.2; }
    .form-control:focus { box-shadow: 0 0 0 3px rgba(0, 105, 92, 0.1); border-color: var(--hf-primary); }
</style>

@if($errors->has('new_email') || $errors->has('password_confirmation') || session('error'))
<script>
    document.addEventListener("DOMContentLoaded", function(){
        var myModal = new bootstrap.Modal(document.getElementById('emailModal'));
        myModal.show();
    });
</script>
@endif

@endsection
