<x-guest-layout>
    <div class="auth-card">
        <h3 class="fw-bold mb-1">{{ __('auth.welcome_back') }}</h3>
        <p class="text-muted small mb-4">{{ __('auth.sign_in_subtitle') }}</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">{{ __('auth.email') }}</label>
                <input type="email" name="email" class="form-control" placeholder="hello@example.com" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">{{ __('auth.password') }}</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-primary-custom shadow-sm">{{ __('auth.sign_in') }}</button>
        </form>
        <div class="text-center mt-4">
            <span class="text-muted small">{{ __('auth.new_here') }}</span>
            <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #00695c;">{{ __('auth.create_account') }}</a>
        </div>
    </div>
</x-guest-layout>
