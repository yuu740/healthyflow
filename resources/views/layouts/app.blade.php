<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <meta name="theme-color" content="#00695c">
    <style>
        :root {
            --hf-primary: #00695c;
            --hf-primary-light: #e0f2f1;
            --hf-accent: #ffab00;
            --hf-bg: #f5f7fa;
            --hf-text: #2d3748;
            --app-max-width: 480px;
        }

        body {
            background-color: #e2e8f0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        @media (min-width: 501px) {
            body {
                background: linear-gradient(135deg, #004d40 0%, #00695c 100%);
                display: flex; align-items: center; justify-content: center; height: 100vh;
                color: white; text-align: center;
            }
            #app-container { display: none !important; }
            .desktop-msg { display: block !important; }
        }
        .desktop-msg { display: none; }

        #app-container {
            width: 100%;
            max-width: var(--app-max-width);
            background-color: #ffffff;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding-bottom: 90px;
        }

        .top-bar {
            background: white;
            position: sticky; top: 0; z-index: 1020;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f1f1;
        }

        .bottom-nav {
            max-width: var(--app-max-width);
            width: 100%;
            left: 50%; transform: translateX(-50%);
            background: white;
            height: 70px;
            border-top: 1px solid #eee;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.03);
        }

        .bottom-nav-link {
            text-decoration: none;
            color: #94a3b8;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            font-size: 10px; font-weight: 500;
            width: 25%;
            transition: all 0.2s;
        }

        .bottom-nav-link i { font-size: 1.4rem; margin-bottom: 2px; }
        .bottom-nav-link.active { color: var(--hf-primary); }
    </style>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>
</head>
<body>
    <div class="desktop-msg p-5">
        <h2 class="fw-bold mb-3">{{ __('welcome.desktop_warning_title') }}</h2>
        <p class="mb-4 opacity-75">{{ __('welcome.desktop_warning_desc') }}</p>
        <div class="bg-white text-dark py-3 px-4 rounded-4 shadow-sm fw-bold d-inline-block">
            <i class="bi bi-phone me-2"></i> {{ __('welcome.desktop_warning_btn') }}
        </div>
    </div>

    <div id="app-container">
        <div class="top-bar d-flex align-items-center justify-content-between">
             <div class="d-flex align-items-center">
                <div class="me-2 d-flex align-items-center justify-content-center rounded-3 text-white fw-bold"
                     style="width:36px; height:36px; background: var(--hf-primary);">HF</div>
                <div>
                    <h6 class="m-0 fw-bold text-dark" style="line-height: 1.2;">HealthyFlow</h6>
                    <small class="text-muted" style="font-size: 11px;">Hello, User!</small>
                </div>
            </div>
            <div class="d-flex gap-3">
                <a href="#" class="btn-notif"><i class="bi bi-bell fs-5"></i><span class="badge-dot"></span></a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent text-secondary p-0">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="px-3 py-4">
            @yield('content')
        </div>

        <nav class="bottom-nav fixed-bottom d-flex justify-content-between align-items-center px-2">
            <a href="{{ route('dashboard') }}" class="bottom-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi {{ request()->routeIs('dashboard') ? 'bi-grid-fill' : 'bi-grid' }}"></i>
                <span>{{ __('dashboard.nav.home') }}</span>
            </a>
            <a href="{{ route('daily_logs') }}" class="bottom-nav-link {{ request()->routeIs('daily_logs') ? 'active' : '' }}">
                <i class="bi {{ request()->routeIs('daily_logs') ? 'bi-journal-plus' : 'bi-journal' }}"></i>
                <span>{{ __('dashboard.nav.logs') }}</span>
            </a>
            <a href="{{ route('gallery') }}" class="bottom-nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                <i class="bi {{ request()->routeIs('gallery') ? 'bi-images' : 'bi-image' }}"></i>
                <span>{{ __('dashboard.nav.gallery') }}</span>
            </a>
            <a href="{{ route('healthy_timer') }}" class="bottom-nav-link {{ request()->routeIs('healthy_timer') ? 'active' : '' }}">
                <i class="bi {{ request()->routeIs('healthy_timer') ? 'bi-stopwatch-fill' : 'bi-stopwatch-fill' }}"></i>
                <span>{{ __('dashboard.nav.timer') }}</span>
            </a>
            <a href="{{ route('settings') }}" class="bottom-nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                <i class="bi {{ request()->routeIs('settings') ? 'bi-gear-fill' : 'bi-gear' }}"></i>
                <span>{{ __('dashboard.nav.settings') }}</span>
            </a>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
