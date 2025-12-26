@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold m-0">{{ __('gallery.title') }}</h4>
    <button class="btn btn-teal btn-sm rounded-pill px-3 fw-bold" onclick="toggleCompareMode()">
        <i class="bi bi-arrow-left-right me-1"></i> {{ __('gallery.btn_compare') }}
    </button>
</div>

<label class="card border-2 border-dashed border-secondary border-opacity-25 rounded-4 p-4 mb-4 text-center bg-white w-100" style="cursor: pointer;">
    <input type="file" class="d-none" onchange="previewImage(this)">
    <div class="text-muted mb-2"><i class="bi bi-camera-fill fs-2"></i></div>
    <h6 class="fw-bold mb-1">{{ __('gallery.upload.title') }}</h6>
    <p class="small text-muted mb-0">{{ __('gallery.upload.subtitle') }}</p>
</label>

<div class="row g-2" id="galleryGrid">
    @foreach(Session::get('gallery_photos', []) as $photo)
    <div class="col-6 gallery-item">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
            <img src="{{ $photo['image'] }}" class="img-fluid" style="height: 200px; object-fit: cover;">
            <div class="position-absolute top-0 end-0 m-2">
                <button class="btn btn-white btn-sm rounded-circle shadow-sm p-1" style="width: 24px; height: 24px; line-height: 1;"><i class="bi bi-pencil-square text-teal" style="font-size: 12px;"></i></button>
            </div>
            <div class="p-2 bg-white text-center">
                <span class="fw-bold small">{{ $photo['day'] }}</span><br>
                <small class="text-muted">{{ $photo['weight'] }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    function toggleCompareMode() {
        const grid = document.getElementById('galleryGrid');
        grid.classList.toggle('compare-mode');
        alert("Compare Mode: Select Day 1 and Current Day to see transformation.");
    }
</script>
@endsection
