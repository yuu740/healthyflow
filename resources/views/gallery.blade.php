@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h4 class="fw-bold m-0">{{ __('gallery.title') }}</h4>
        <p class="text-muted small m-0">{{ __('gallery.subtitle') }}</p>
    </div>
    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">
        <i class="bi bi-arrow-left-right me-1"></i> {{ __('gallery.btn_compare') }}
    </button>
</div>

<div class="card border-2 border-dashed border-secondary border-opacity-25 rounded-4 p-4 mb-4 text-center bg-transparent" style="cursor: pointer;">
    <div class="text-muted mb-2">
        <i class="bi bi-camera-fill fs-2" style="color: var(--hf-primary);"></i>
    </div>
    <h6 class="fw-bold mb-1">{{ __('gallery.upload.title') }}</h6>
    <p class="small text-muted mb-0">{{ __('gallery.upload.subtitle') }}</p>
</div>

<div class="row g-3">
    <div class="col-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="position-relative">
                <img src="https://via.placeholder.com/300x400/eee/999?text=Day+1" class="card-img-top" alt="Progress" style="height: 180px; object-fit: cover;">
                <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" style="background: rgba(0,0,0,0.5);">
                    <small class="fw-bold">{{ __('gallery.label.day') }} 1</small>
                </div>
            </div>
            <div class="p-2 bg-white">
                <div class="small text-muted">70 kg</div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="position-relative">
                <img src="https://via.placeholder.com/300x400/eee/999?text=Day+30" class="card-img-top" alt="Progress" style="height: 180px; object-fit: cover;">
                 <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" style="background: rgba(0,0,0,0.5);">
                    <small class="fw-bold">{{ __('gallery.label.day') }} 30</small>
                </div>
            </div>
            <div class="p-2 bg-white">
                <div class="small text-muted">68 kg <span class="text-success ms-1">(-2kg)</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
