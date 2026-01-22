
@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show p-2 small" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
    </div>
@endif

<h4 class="fw-bold mb-1">{{ __('logs.title') }}</h4>
<p class="text-muted small mb-4">{{ __('logs.subtitle') }}</p>

<div class="row g-2 mb-4">
    <div class="col-4">
        <button class="btn w-100 p-3 rounded-4 border-0 shadow-sm d-flex flex-column align-items-center gap-2 bg-white" data-bs-toggle="modal" data-bs-target="#waterModal">
            <div class="bg-primary bg-opacity-10 p-2 rounded-circle text-primary">
                <i class="bi bi-droplet-fill fs-5"></i>
            </div>
            <span class="small fw-bold text-dark" style="font-size: 11px;">Water</span>
        </button>
    </div>

    <div class="col-4">
        <button class="btn w-100 p-3 rounded-4 border-0 shadow-sm d-flex flex-column align-items-center gap-2 bg-white" data-bs-toggle="modal" data-bs-target="#sleepModal">
            <div class="p-2 rounded-circle text-purple bg-opacity-10" style="background-color: #f3e5f5; color: #7b1fa2;">
                <i class="bi bi-moon-stars-fill fs-5"></i>
            </div>
            <span class="small fw-bold text-dark" style="font-size: 11px;">Sleep</span>
        </button>
    </div>

    <div class="col-4">
        <button class="btn w-100 p-3 rounded-4 border-0 shadow-sm d-flex flex-column align-items-center gap-2 bg-white" data-bs-toggle="modal" data-bs-target="#activityModal">
            <div class="bg-warning bg-opacity-10 p-2 rounded-circle text-warning">
                <i class="bi bi-fire fs-5"></i>
            </div>
            <span class="small fw-bold text-dark" style="font-size: 11px;">Activity</span>
        </button>
    </div>
</div>

<h6 class="fw-bold mb-3 small text-muted text-uppercase ls-1">{{ __('logs.history_title') }}</h6>

@if($waterLogs->isEmpty() && $activityLogs->isEmpty() && $sleepLogs->isEmpty())
    <div class="text-center py-5 text-muted small">
        <i class="bi bi-journal-x fs-1 mb-2 d-block opacity-50"></i>
        Belum ada catatan hari ini.
    </div>
@endif

@foreach($waterLogs as $log)
<div class="card border-0 shadow-sm rounded-4 p-3 mb-2 bg-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-primary bg-opacity-10 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-droplet-fill text-primary"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">Water</h6>
                <small class="text-muted">{{ $log->logged_at->format('H:i') }}</small>
            </div>
        </div>
        
        <div class="text-end">
            <span class="fw-bold text-primary d-block">+{{ $log->amount_ml }} ml</span>
            <form action="{{ route('logs.water.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Delete this log?')">
                @csrf @method('DELETE')
                <button class="btn btn-link p-0 text-danger" style="font-size:10px; text-decoration:none;">Delete</button>
            </form>
        </div>
        </div>
</div>
@endforeach

@foreach($sleepLogs as $log)
<div class="card border-0 shadow-sm rounded-4 p-3 mb-2 bg-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #f3e5f5;">
                <i class="bi bi-moon-stars-fill" style="color: #7b1fa2;"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">Sleep</h6>
                <small class="text-muted">{{ $log->logged_at->format('d M') }}</small>
            </div>
        </div>

        <div class="text-end">
            <span class="fw-bold d-block" style="color: #7b1fa2;">{{ $log->duration_hours }} hrs</span>
            <form action="{{ route('logs.sleep.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Delete this log?')">
                @csrf @method('DELETE')
                <button class="btn btn-link p-0 text-danger" style="font-size:10px; text-decoration:none;">Delete</button>
            </form>
        </div>
        </div>
</div>
@endforeach

@foreach($activityLogs as $log)
<div class="card border-0 shadow-sm rounded-4 p-3 mb-2 bg-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-warning bg-opacity-10 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-fire text-warning"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">{{ $log->activity_name }}</h6>
                <small class="text-muted">{{ $log->logged_at->format('d M') }}</small>
            </div>
        </div>
        <div class="text-end">
            <span class="fw-bold text-dark d-block">{{ $log->duration_minutes }} min</span>
            <form action="{{ route('logs.activity.destroy', $log->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-link p-0 text-danger" style="font-size:10px; text-decoration:none;">Delete</button>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="waterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Add Hydration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logs.water.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="logged_at" value="{{ now() }}">
                    <label class="small text-muted fw-bold mb-2">{{ __('logs.field.water') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="amount_ml" class="form-control py-3" placeholder="Ex: 250" required>
                        <span class="input-group-text bg-light">ml</span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-bold">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sleepModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Add Sleep</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logs.sleep.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="logged_at" value="{{ now() }}">
                    <label class="small text-muted fw-bold mb-2">{{ __('logs.field.sleep') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" step="0.1" name="duration_hours" class="form-control py-3" placeholder="Ex: 7.5" required>
                        <span class="input-group-text bg-light">hours</span>
                    </div>
                    <button type="submit" class="btn text-white w-100 py-3 rounded-3 fw-bold" style="background-color: #7b1fa2;">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activityModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Add Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logs.activity.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="logged_at" value="{{ now() }}">
                    <div class="mb-3">
                        <label class="small text-muted fw-bold mb-2">Activity Name</label>
                        <input type="text" name="activity_name" class="form-control py-3" placeholder="Running, Gym, Yoga..." required>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold mb-2">Duration (mins)</label>
                        <input type="number" name="duration_minutes" class="form-control py-3" placeholder="Ex: 45" required>
                    </div>
                    <button type="submit" class="btn btn-warning text-white w-100 py-3 rounded-3 fw-bold">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
