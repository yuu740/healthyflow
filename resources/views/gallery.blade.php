@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show p-2 small border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="mb-4">
    <h4 class="fw-bold m-0">{{ __('gallery.title') }}</h4>
    <p class="text-muted small">{{ __('gallery.subtitle') }}</p>
</div>

<form action="{{ route('gallery') }}" method="GET" class="mb-4">
    <div class="row g-2">
        <div class="col-5">
            <div class="input-group input-group-sm shadow-sm rounded-3 overflow-hidden">
                <span class="input-group-text bg-white border-0 ps-3"><i class="bi bi-calendar-event text-teal"></i></span>
                <input type="date" name="date" class="form-control border-0 py-2"
                       value="{{ request('date', date('Y-m-d')) }}"
                       onchange="this.form.submit()">
            </div>
        </div>

        <div class="col-7">
            <div class="input-group input-group-sm shadow-sm rounded-3 overflow-hidden">
                <span class="input-group-text bg-white border-0 ps-3"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-0 py-2"
                       placeholder="{{ __('gallery.filter.search_placeholder') }}" value="{{ request('search') }}">
            </div>
        </div>
    </div>

    @if(request('search') || request('date') != date('Y-m-d'))
        <div class="mt-2 text-end">
            <a href="{{ route('gallery') }}" class="text-decoration-none small text-muted">
                <i class="bi bi-x-circle me-1"></i> {{ __('gallery.filter.clear') }}
            </a>
        </div>
    @endif
</form>


<div class="text-end mb-3">
    <button class="btn btn-teal shadow-sm rounded-pill px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#foodModal">
        <i class="bi bi-camera-fill me-2"></i> {{ __('gallery.upload.btn_add') }}
    </button>
</div>

@if($meals->isEmpty())
    <div class="text-center py-5 text-muted small opacity-50">
        <i class="bi bi-cup-hot fs-1 mb-2 d-block"></i>
        @if(request('search') || request('date'))
            {{ __('gallery.filter.empty_search') }}
        @else
            {{ __('gallery.empty') }}
        @endif
    </div>
@else
    <div class="row g-3">
        @foreach($meals as $meal)
        <div class="col-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 position-relative meal-card"
                 style="cursor: pointer;"
                 onclick="showDetail('{{ asset('storage/' . $meal->image_path) }}', '{{ $meal->food_name }}', '{{ $meal->notes ?? '-' }}', '{{ $meal->logged_at->format('H:i') }}')">

                <div style="height: 150px; overflow: hidden;">
                    @if($meal->image_path)
                        <img src="{{ asset('storage/' . $meal->image_path) }}" class="w-100 h-100 object-fit-cover">
                    @else
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                            <i class="bi bi-image fs-4"></i>
                        </div>
                    @endif
                </div>

                <div class="p-3 bg-white">
                    <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 14px;">{{ $meal->food_name }}</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted" style="font-size: 10px;">
                            <i class="bi bi-clock me-1"></i>{{ $meal->logged_at->format('H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

<div class="modal fade" id="foodModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">{{ __('gallery.modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logs.food.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="logged_at" value="{{ now() }}">

                    <div class="mb-3">
                        <label class="small text-muted fw-bold mb-2">{{ __('gallery.modal.food_name') }}</label>
                        <input type="text" name="food_name" class="form-control py-3" placeholder="Ex: Nasi Padang..." required>
                    </div>

                    <div class="mb-3">
                        <label class="small text-muted fw-bold mb-2">{{ __('gallery.modal.photo') }}</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="mb-4">
                        <label class="small text-muted fw-bold mb-2">{{ __('gallery.modal.notes') }}</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Notes..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-teal w-100 py-3 rounded-3 fw-bold text-white">
                        {{ __('gallery.modal.btn_save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 overflow-hidden">
            <div class="position-relative">
                <img id="detailImage" src="" class="w-100 object-fit-cover" style="height: 300px;">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3 bg-white p-2 rounded-circle opacity-100"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h4 class="fw-bold mb-2" id="detailTitle">Food Name</h4>
                <div class="d-flex align-items-center text-muted small mb-3">
                    <i class="bi bi-clock me-2"></i> <span id="detailTime">12:00</span>
                </div>
                <p class="text-muted small bg-light p-3 rounded-3 mb-0" id="detailNotes">
                    {{ __('gallery.modal.no_notes') }}
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetail(imageSrc, title, notes, time) {
        document.getElementById('detailImage').src = imageSrc;
        document.getElementById('detailTitle').innerText = title;
        // Gunakan fallback ke localization jika notes kosong
        document.getElementById('detailNotes').innerText = (notes && notes !== '-') ? notes : "{{ __('gallery.modal.no_notes') }}";
        document.getElementById('detailTime').innerText = time;

        var myModal = new bootstrap.Modal(document.getElementById('detailModal'));
        myModal.show();
    }
</script>

<style>
    .text-teal { color: #00695c !important; }
    .btn-teal { background-color: #00695c; color: white; border: none; }
    .btn-teal:hover { background-color: #004d40; color: white; }
    .border-teal-light { border-color: #b2dfdb !important; }
    .object-fit-cover { object-fit: cover; }
    .meal-card:active { transform: scale(0.98); transition: 0.1s; }
</style>
@endsection
