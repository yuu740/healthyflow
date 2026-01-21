@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold m-0">{{ __('timer.title') }}</h4>
        <p class="text-muted small m-0">{{ __('timer.subtitle') }}</p>
    </div>
    <button class="btn btn-teal btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addTimerModal">
        <i class="bi bi-plus-lg me-1"></i> Add
    </button>
</div>

<div id="saveStatus" class="alert alert-success border-0 shadow-sm p-2 mb-3 small d-none">
    <i class="bi bi-check-circle me-1"></i> Ringtone updated!
</div>

<div class="d-flex justify-content-end mb-3">
    <div class="input-group w-auto shadow-sm rounded-pill overflow-hidden bg-white">
        <span class="input-group-text bg-white border-0 ps-3"><i class="bi bi-music-note-beamed text-teal"></i></span>
        <select id="ringtoneSelect" class="form-select border-0 py-2 text-muted fw-bold small" style="width: 150px; cursor:pointer;" onchange="changeRingtone(this)">
            @foreach($ringtones as $tone)
                <option value="{{ asset('storage/' . $tone->file_path) }}" data-id="{{ $tone->id }}" {{ Auth::user()->preferred_ringtone_id == $tone->id ? 'selected' : '' }}>
                    {{ $tone->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div id="activeTimerCard" class="card border-0 shadow rounded-4 p-4 bg-teal text-white mb-4 d-none">
    <div class="text-center">
        <h6 class="opacity-75 mb-1" id="timerLabel">Timer</h6>
        <h1 class="fw-bold display-1 mb-3" id="timerDisplay">00:00</h1>
        <div class="d-flex gap-3 justify-content-center">
            <button onclick="togglePause()" id="btnPause" class="btn btn-light rounded-pill px-4 fw-bold text-teal shadow-sm">Pause</button>
            <button onclick="stopTimer()" class="btn btn-outline-light rounded-pill px-4 fw-bold">Stop</button>
        </div>
    </div>
</div>

<div class="row g-3">
    @foreach($timers as $timer)
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-light p-3 rounded-circle text-teal d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                        <i class="bi bi-{{ $timer->icon }} fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">{{ $timer->name }}</h6>
                        <small class="text-muted">{{ $timer->duration_minutes > 0 ? $timer->duration_minutes . ' mins' : 'Manual set' }}</small>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <form action="{{ route('timer.destroy', $timer->id) }}" method="POST" onsubmit="return confirm('Delete this timer?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0 mt-2"><i class="bi bi-trash"></i></button>
                    </form>
                    <button onclick="startTimer('{{ $timer->name }}', {{ $timer->duration_minutes }})" class="btn btn-teal-light rounded-circle shadow-sm" style="width: 45px; height: 45px;">
                        <i class="bi bi-play-fill fs-4"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="modal fade" id="addTimerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold">New Timer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('timer.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="small fw-bold text-muted mb-1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Yoga, Plank" required>
                    </div>
                    <div class="mb-3">
                        <label class="small fw-bold text-muted mb-1">Duration (minutes)</label>
                        <input type="number" name="duration_minutes" class="form-control" placeholder="0 for manual input" value="0" required>
                        <small class="text-muted fst-italic">Set 0 to ask duration every time.</small>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold text-muted mb-2">Select Icon</label>
                        <div class="d-flex gap-2 overflow-auto pb-2" style="scrollbar-width: thin;">
                            @foreach(['hourglass-split', 'wind', 'moon-stars', 'cup-hot', 'bicycle', 'book', 'code', 'droplet', 'fire'] as $icon)
                                <input type="radio" class="btn-check" name="icon" id="icon_{{ $icon }}" value="{{ $icon }}" {{ $loop->first ? 'checked' : '' }} autocomplete="off">

                                <label class="btn btn-icon-select d-flex align-items-center justify-content-center"
                                       for="icon_{{ $icon }}"
                                       style="width: 45px; height: 45px; border-radius: 12px; flex-shrink: 0;">
                                    <i class="bi bi-{{ $icon }} fs-5"></i>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-teal w-100 rounded-pill fw-bold shadow-sm">Save Timer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="timerDoneModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 text-center p-5">
            <div class="mb-3 text-success animate__animated animate__bounceIn">
                <i class="bi bi-check-circle-fill display-1"></i>
            </div>
            <h3 class="fw-bold mb-2">Time's Up!</h3>
            <p class="text-muted mb-4">You successfully completed your session.</p>
            <button type="button" class="btn btn-teal px-5 rounded-pill fw-bold shadow-sm" data-bs-dismiss="modal">Great!</button>
        </div>
    </div>
</div>

<audio id="timerAudio" preload="auto"></audio>

<script>
    let timerInterval;
    let secondsLeft = 0;
    let isPaused = false;
    let missedTimeout;
    const audioPlayer = document.getElementById('timerAudio');

    document.addEventListener('click', function() {
        if(audioPlayer.src) {
        }
    }, {once:true});

    function changeRingtone(select) {
        const url = select.value;
        const id = select.options[select.selectedIndex].getAttribute('data-id');

        audioPlayer.src = url;
        audioPlayer.play().catch(e => console.log('Preview blocked', e));

        fetch("{{ route('update.ringtone') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ringtone_id: id })
        }).then(res => {
            if(res.ok) {
                const badge = document.getElementById('saveStatus');
                badge.classList.remove('d-none');
                setTimeout(() => badge.classList.add('d-none'), 2000);
            }
        });
    }

    function startTimer(name, minutes) {
        clearTimeout(missedTimeout);
        if(minutes === 0) {
            let input = prompt("Enter duration in minutes:", "15");
            if(!input) return;
            minutes = parseInt(input);
        }

        clearInterval(timerInterval);
        // secondsLeft = minutes * 60;
        secondsLeft = 5;

        document.getElementById('timerLabel').innerText = name;
        document.getElementById('activeTimerCard').classList.remove('d-none');
        document.getElementById('btnPause').innerText = "Pause";
        document.getElementById('btnPause').classList.remove('btn-warning');
        document.getElementById('btnPause').classList.add('btn-light');

        isPaused = false;
        updateDisplay();
        window.scrollTo({ top: 0, behavior: 'smooth' });

        audioPlayer.src = document.getElementById('ringtoneSelect').value;

        timerInterval = setInterval(() => {
            if(!isPaused) {
                secondsLeft--;
                updateDisplay();
                if(secondsLeft <= 0) finishTimer();
            }
        }, 1000);
    }

    function togglePause() {
        isPaused = !isPaused;
        const btn = document.getElementById('btnPause');
        btn.innerText = isPaused ? "Resume" : "Pause";
        if(isPaused) {
            btn.classList.remove('btn-light', 'text-teal');
            btn.classList.add('btn-warning', 'text-white');
        } else {
            btn.classList.add('btn-light', 'text-teal');
            btn.classList.remove('btn-warning', 'text-white');
        }
    }

    function stopTimer() {
        clearInterval(timerInterval);
        clearTimeout(missedTimeout);
        document.getElementById('activeTimerCard').classList.add('d-none');
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
    }

    function finishTimer() {
        clearInterval(timerInterval);
        document.getElementById('activeTimerCard').classList.add('d-none');

        audioPlayer.play().catch(error => {
            console.error("Autoplay failed:", error);
            alert("Time's up! (Audio autoplay blocked by browser)");
        });

        missedTimeout = setTimeout(function() {
            alert("{{ __('dashboard.notifications.timer_missed') }}"); 
            window.location.href = "{{ route('dashboard') }}";
        }, 60000);

        new bootstrap.Modal(document.getElementById('timerDoneModal')).show();
    }

    function updateDisplay() {
        let m = Math.floor(secondsLeft / 60);
        let s = secondsLeft % 60;
        document.getElementById('timerDisplay').innerText =
            `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
    }

    document.getElementById('timerDoneModal').addEventListener('hidden.bs.modal', function () {
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
        clearTimeout(missedTimeout);
    });
</script>

<style>
    .bg-teal { background-color: #00695c; }
    .text-teal { color: #00695c !important; }
    .btn-teal { background-color: #00695c; color: white; border: none; }
    .btn-teal:hover { background-color: #004d40; color: white; }

    .btn-teal-light { background: #e0f2f1; color: #00695c; border: none; }
    .btn-teal-light:hover { background: #b2dfdb; }

    .btn-icon-select {
        border: 1px solid #dee2e6;
        color: #6c757d;
        background-color: #fff;
        transition: all 0.2s ease-in-out;
    }

    .btn-icon-select:hover {
        background-color: #f8f9fa;
        border-color: #00695c;
    }


    .btn-check:checked + .btn-icon-select {
        background-color: #00695c !important;
        color: white !important;
        border-color: #00695c !important;
        box-shadow: 0 4px 10px rgba(0, 105, 92, 0.3);
        transform: scale(1.05);
    }
</style>
@endsection
