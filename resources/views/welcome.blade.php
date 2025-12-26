<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>HealthyFlow - {{ __('welcome.welcome_title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #fff; margin: 0; }

        @media (min-width: 501px) {
            body {
                background: linear-gradient(135deg, #004d40 0%, #00695c 100%);
                display: flex; align-items: center; justify-content: center; height: 100vh;
                color: white; text-align: center;
            }
            .mobile-view { display: none; }
            .desktop-msg { display: block !important; }
        }
        .desktop-msg { display: none; }

        .hero {
            background-color: #e0f2f1;
            padding: 3rem 1.5rem 4rem;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            text-align: center;
        }
        .btn-start {
            background-color: #00695c; color: white;
            padding: 16px; border-radius: 16px; width: 100%;
            font-weight: 600; border: none; font-size: 1.1rem;
            box-shadow: 0 10px 20px rgba(0, 105, 92, 0.2);
            text-decoration: none; display: block;
        }
        .btn-outline {
            border: 2px solid #00695c; color: #00695c;
            padding: 14px; border-radius: 16px; width: 100%;
            font-weight: 600; background: transparent;
            text-decoration: none; display: block;
        }
        .feature-pill {
            background: #f8f9fa; border-radius: 12px;
            padding: 1rem; margin-bottom: 0.8rem;
            display: flex; align-items: center; gap: 1rem;
            text-align: left;
        }
        .lang-switcher {
            display: flex; background: #f1f5f9;
            border-radius: 16px; padding: 4px;
            margin-bottom: 2rem; overflow: hidden;
        }
        .lang-btn {
            flex: 1; padding: 10px; text-align: center;
            font-weight: 600; border-radius: 12px;
            transition: all 0.3s; text-decoration: none; color: #666;
        }
        .lang-btn.active { background: #00695c; color: white; }
    </style>
</head>
<body>
    <div class="desktop-msg p-5">
        <h2 class="fw-bold mb-3">{{ __('welcome.desktop_warning_title') }}</h2>
        <p class="mb-4 opacity-75">{{ __('welcome.desktop_warning_desc') }}</p>
        <div class="bg-white text-dark py-3 px-4 rounded-4 shadow-sm fw-bold d-inline-block">
            <i class="bi bi-phone me-2"></i> {{ __('welcome.desktop_warning_btn') }}
        </div>
    </div>

    <div class="mobile-view">
        <div class="hero">
            <div style="width: 64px; height: 64px; background: white; border-radius: 16px; margin: 0 auto 1.5rem; display: grid; place-items: center; color: #00695c; font-weight: bold; font-size: 1.5rem;">
                HF
            </div>
            <h1 class="fw-bold text-dark mb-3">HealthyFlow</h1>
            <p class="text-muted lead">{{ __('welcome.welcome_title') }}</p>
        </div>

        <div class="container px-4" style="margin-top: -30px;">
            <div class="lang-switcher shadow-sm">
                <a href="{{ route('switch.language', 'en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a>
                <a href="{{ route('switch.language', 'id') }}" class="lang-btn {{ app()->getLocale() == 'id' ? 'active' : '' }}">Indonesia</a>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h5 class="fw-bold mb-3">{{ __('welcome.why_us') }}</h5>

                <div class="feature-pill">
                    <div>
                        <div class="fw-bold small">{{ __('welcome.proven_title') }}</div>
                        <div class="text-muted small">{{ __('welcome.proven_desc') }}</div>
                    </div>
                </div>

                <div class="feature-pill">
                    <div>
                        <div class="fw-bold small">{{ __('welcome.sleep_recovery') }}</div>
                        <div class="text-muted small">{{ __('welcome.sleep_desc') }}</div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column gap-3 mb-4">
                <a href="{{ route('register') }}" class="btn btn-start">
                    {{ __('welcome.btn_get_started') }}
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline">
                    {{ __('welcome.btn_sign_in') }}
                </a>
            </div>

            <div class="text-center text-muted small pb-4">
                v1.0 • Safe for all ages
            </div>
        </div>
    </div>
</body>
</html>
