@extends('layouts.app')

@section('content')
<h2 class="section-title">Settings</h2>
<p class="section-subtitle">Customize your HealthyFlow experience</p>

<div class="card p-4 mb-4">
    <h6 class="fw-bold mb-4">Localization</h6>

    <div class="mb-4">
        <label class="d-block mb-2 text-muted small">Water Volume Unit</label>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="unit" id="ml" autocomplete="off">
            <label class="btn btn-outline-secondary border-0 bg-light text-dark" for="ml">Milliliters (ml)</label>

            <input type="radio" class="btn-check" name="unit" id="oz" autocomplete="off" checked>
            <label class="btn btn-teal" for="oz">Fluid Ounces (oz)</label>
        </div>
    </div>

    <div>
        <label class="d-block mb-2 text-muted small">Interface Language</label>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="lang" id="en" autocomplete="off">
            <label class="btn btn-outline-secondary border-0 bg-light text-dark" for="en">English</label>

            <input type="radio" class="btn-check" name="lang" id="id" autocomplete="off" checked>
            <label class="btn btn-success" style="background-color: #6da252; border-color: #6da252;" for="id">Indonesia</label>
        </div>
    </div>
</div>

<div class="card p-4 mb-4">
    <h6 class="fw-bold mb-4">Account Settings</h6>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <div class="small text-muted">Email</div>
            <div>ppp@gmail.com</div>
        </div>
        <button class="btn btn-light btn-sm px-3">Change Email</button>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="small text-muted">Password</div>
            <div>*********</div>
        </div>
        <button class="btn btn-light btn-sm px-3">Change Password</button>
    </div>

    <button class="btn btn-danger px-4">Logout</button>
</div>

<div class="card p-4">
    <h6 class="fw-bold mb-3">About Healthy Flow</h6>
    <p class="small text-muted mb-4">
        HealthyFlow is your personal wellness companion, helping you track daily hydration and activity metrics to maintain a healthier lifestyle.
    </p>
    <small class="text-muted">Version 1.0 • © 2025 HealthyFlow</small>
</div>
@endsection
