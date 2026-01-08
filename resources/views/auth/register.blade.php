<x-guest-layout>
    <div class="auth-card">
        <h3 class="fw-bold mb-1">{{ __('auth.join_us') }}</h3>
        <p class="text-muted small mb-4">{{ __('auth.register_subtitle') }}</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">{{ __('Nama Lengkap') }}</label>
                <input type="text" name="name" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">{{ __('auth.email_short') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">{{ __('auth.password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">{{ __('auth.confirm_password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn-primary-custom shadow-sm">{{ __('auth.create_account') }}</button>
        </form>
        <div class="text-center mt-4">
            <span class="text-muted small">{{ __('auth.already_have_account') }}</span>
            <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #00695c;">{{ __('auth.sign_in') }}</a>
        </div>
    </div>
</x-guest-layout>
