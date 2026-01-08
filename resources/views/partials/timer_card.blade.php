<div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-light p-3 rounded-circle text-teal">
                <i class="bi bi-{{ $icon }} fs-4"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0">{{ __('timer.types.'.$type) }}</h6>
                <small class="text-muted">{{ __('timer.types.'.$type.'_desc') }}</small>
            </div>
        </div>
        <button onclick="startTimer('{{ $type }}', {{ $duration }})" class="btn btn-teal-light rounded-circle shadow-sm" style="width: 45px; height: 45px;">
            <i class="bi bi-play-fill fs-5"></i>
        </button>
    </div>
</div>
