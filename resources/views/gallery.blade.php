@extends('layouts.app')

@section('content')
<h2 class="section-title">Progress Gallery</h2>
<p class="section-subtitle">Capture your wellness journey with photos</p>

<div class="card p-4 mb-5">
    <h6 class="fw-bold mb-3">Upload Progress Photo</h6>
    <div class="mb-3">
        <input type="text" class="form-control bg-light border-0 py-3" placeholder="Add a note (optional)">
    </div>
    <button class="btn btn-teal w-100 fw-bold py-2">
        <i class="bi bi-camera-fill me-2"></i> Upload Photo
    </button>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card h-100 border-0 bg-transparent">
            <img src="https://via.placeholder.com/300x300/eee/999?text=Meal" class="card-img-top rounded-3 mb-2" alt="Progress">
            <div class="small fw-bold">30 November 2025</div>
            <div class="small text-muted">Grilled chicken breast</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100 border-0 bg-transparent">
            <img src="https://via.placeholder.com/300x300/eee/999?text=Fruit" class="card-img-top rounded-3 mb-2" alt="Progress">
            <div class="small fw-bold">31 November 2025</div>
            <div class="small text-muted">Apple slices for snack</div>
        </div>
    </div>
     <div class="col-md-3">
        <div class="card h-100 border-0 bg-transparent">
            <img src="https://via.placeholder.com/300x300/eee/999?text=Gym" class="card-img-top rounded-3 mb-2" alt="Progress">
            <div class="small fw-bold">1 Desember 2025</div>
            <div class="small text-muted">Gym exercise</div>
        </div>
    </div>
</div>
@endsection
