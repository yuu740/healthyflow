@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold m-0">All Notifications</h4>
</div>

<div class="list-group rounded-4 shadow-sm bg-white overflow-hidden">
    @forelse($notifications as $notification)
        <div class="list-group-item border-0 border-bottom px-4 py-3 {{ $notification->read_at ? 'opacity-75' : 'bg-light' }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1 {{ $notification->read_at ? 'text-muted' : 'text-dark' }}">
                        {{ $notification->data['title'] ?? 'System Alert' }}
                    </h6>
                    <p class="mb-1 small text-muted">{{ $notification->data['message'] ?? '-' }}</p>
                    <small class="text-muted" style="font-size:10px">{{ $notification->created_at->format('d M, H:i') }}</small>
                </div>
                @if(!$notification->read_at)
                    <span class="badge bg-danger rounded-circle p-1" style="width:10px; height:10px;"></span>
                @endif
            </div>
        </div>
    @empty
        <div class="p-5 text-center text-muted">You have no notifications history.</div>
    @endforelse
</div>
@endsection
