<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --hf-primary: #00695c; /* Teal gelap sesuai gambar */
            --hf-bg: #f8f9fa;
        }
        body {
            background-color: var(--hf-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Sidebar Styling */
        .sidebar {
            min-height: 100vh;
            background: white;
            border-right: 1px solid #e0e0e0;
        }
        .nav-link {
            color: #555;
            font-weight: 500;
            padding: 10px 15px;
            margin-bottom: 5px;
            border-radius: 8px;
        }
        .nav-link:hover {
            background-color: #f0f0f0;
            color: var(--hf-primary);
        }
        .nav-link.active {
            background-color: #e0f2f1; /* Light teal */
            color: var(--hf-primary);
        }
        .nav-link i {
            margin-right: 10px;
        }
        /* Common Components */
        .btn-teal {
            background-color: var(--hf-primary);
            color: white;
            border: none;
        }
        .btn-teal:hover {
            background-color: #004d40;
            color: white;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .section-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .section-subtitle {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        /* Avatar Placeholder */
        .logo-box {
            background-color: #e0f2f1;
            color: var(--hf-primary);
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-4 sidebar d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex align-items-center mb-4">
                    <div class="logo-box">HF</div>
                    <div>
                        <h5 class="m-0 fw-bold">HealthyFlow</h5>
                        <small class="text-muted" style="font-size: 10px;">Your wellness companion</small>
                    </div>
                </div>

                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-bar-chart-fill"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('logs') ? 'active' : '' }}" href="{{ route('logs') }}">
                        <i class="bi bi-journal-text"></i> Daily logs
                    </a>
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                        <i class="bi bi-image"></i> Gallery
                    </a>
                    <a class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
                        <i class="bi bi-gear-fill"></i> Settings
                    </a>
                </nav>
            </div>

            <div class="text-muted small">
                &copy; 2025 HealthyFlow
            </div>
        </div>

        <div class="col-md-10 p-5">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
