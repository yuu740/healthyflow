@extends('layouts.app')

@section('content')
<h2 class="section-title">Daily Logs</h2>
<p class="section-subtitle">Create, edit, and manage your daily health entries</p>

<div class="card p-4 mb-4">
    <h6 class="fw-bold mb-3">Add Today's Log</h6>
    <form>
        <div class="row g-3">
            <div class="col-md-5">
                <input type="number" class="form-control bg-light border-0" placeholder="Water (ml)">
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control bg-light border-0" placeholder="Activity (minutes)">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-teal w-100 fw-bold">Add Log</button>
            </div>
        </div>
    </form>
</div>

<div class="card p-3 mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <div class="fw-bold small mb-1">2025-11-28</div>
            <div class="d-flex align-items-center text-muted">
                <span class="me-3"><i class="bi bi-droplet-fill text-primary"></i> 1000 ml</span>
                <span><i class="bi bi-person-running text-warning"></i> 50 min</span>
            </div>
        </div>
        <div>
            <button class="btn btn-sm btn-secondary text-white fw-bold px-3">Edit</button>
            <button class="btn btn-sm btn-outline-danger fw-bold px-3 ms-2">Delete</button>
        </div>
    </div>
</div>

<div class="card p-3 bg-light border-0">
    <div class="row g-2 align-items-center">
        <div class="col-md-4">
            <input type="text" class="form-control form-control-sm" value="1000 ml">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control form-control-sm" value="50 min">
        </div>
        <div class="col-md-2">
            <button class="btn btn-sm btn-teal w-100">Save</button>
        </div>
        <div class="col-md-2">
            <button class="btn btn-sm btn-white border w-100">Cancel</button>
        </div>
    </div>
</div>
@endsection
