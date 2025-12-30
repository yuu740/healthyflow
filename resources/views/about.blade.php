@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex align-items-center gap-3">
    <a href="{{ route('settings') }}" class="btn btn-white btn-sm shadow-sm rounded-pill px-3">
        <i class="bi bi-chevron-left"></i>
    </a>
    <div>
        <h4 class="fw-bold m-0">{{ __('about.title') }}</h4>
        <p class="text-muted small m-0">HealthyFlow Ecosystem</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <h6 class="fw-bold text-teal mb-3 text-uppercase ls-1 small">{{ __('about.definition_title') }}</h6>
    <p class="text-secondary lh-base m-0">{{ __('about.definition_text') }}</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <h6 class="fw-bold text-teal mb-3 text-uppercase ls-1 small">{{ __('about.philosophy_title') }}</h6>
            <p class="text-secondary small lh-base m-0">{{ __('about.philosophy_text') }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <h6 class="fw-bold text-teal mb-3 text-uppercase ls-1 small">{{ __('about.purpose_title') }}</h6>
            <p class="text-secondary small lh-base m-0">{{ __('about.purpose_text') }}</p>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <div class="row">
        <div class="col-md-7 border-end-md">
            <h6 class="fw-bold text-teal mb-3 text-uppercase ls-1 small">{{ __('about.features_title') }}</h6>
            <ul class="list-unstyled mb-0">
                @foreach(__('about.features_list') as $feature)
                    <li class="small text-secondary mb-2 d-flex align-items-start gap-2">
                        <i class="bi bi-check2-circle text-teal"></i> {{ $feature }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-5 ps-md-4 mt-4 mt-md-0">
            <h6 class="fw-bold text-teal mb-3 text-uppercase ls-1 small">{{ __('about.benefits_title') }}</h6>
            <ul class="list-unstyled mb-0">
                @foreach(__('about.benefits_list') as $benefit)
                    <li class="small text-secondary mb-2 d-flex align-items-start gap-2">
                        <i class="bi bi-heart-fill text-danger" style="font-size: 10px; margin-top: 4px;"></i> {{ $benefit }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-teal text-white mb-5">
    <h6 class="fw-bold mb-2 text-uppercase ls-1 small" style="opacity: 0.8">{{ __('about.expectations_title') }}</h6>
    <p class="m-0 fw-medium">{{ __('about.expectations_text') }}</p>
</div>

<style>
    .ls-1 { letter-spacing: 1px; }
    .bg-teal { background-color: var(--hf-primary) !important; }
    .text-teal { color: var(--hf-primary) !important; }
    @media (min-width: 768px) {
        .border-end-md { border-right: 1px solid #f1f5f9 !important; }
    }
</style>
@endsection
