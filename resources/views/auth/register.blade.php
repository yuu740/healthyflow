<x-guest-layout>
    <div class="card card-custom p-4 bg-white">
        <div class="card-body">
            <h4 class="fw-bold mb-4">Create Account</h4>

            @if ($errors->any())
                <div class="alert alert-danger py-2 mb-3">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Email</label>
                    <input type="email" name="email" class="form-control input-custom" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Password</label>
                    <input type="password" name="password" class="form-control input-custom" required>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control input-custom" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-green">Create Account</button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <span class="text-muted small">Already have an account?</span>
        <a href="{{ route('login') }}" class="text-teal small">Login</a>
    </div>
</x-guest-layout>
