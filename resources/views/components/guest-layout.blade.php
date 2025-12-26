<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f5f7fa; font-family: 'Poppins', sans-serif; margin: 0; }

        @media (min-width: 501px) {
            body {
                background: linear-gradient(135deg, #004d40 0%, #00695c 100%);
                display: flex; align-items: center; justify-content: center; height: 100vh;
                color: white; text-align: center;
            }
            .mobile-view { display: none !important; }
            .desktop-msg { display: block !important; }
        }
        .desktop-msg { display: none; }

        .auth-card {
            border: none; border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            background: white; padding: 2rem;
        }
        .form-control {
            background-color: #f8f9fa; border: 1px solid #eee;
            padding: 12px 15px; border-radius: 12px;
        }
        .form-control:focus {
            background-color: #fff; box-shadow: 0 0 0 3px rgba(0, 105, 92, 0.1);
            border-color: #00695c;
        }
        .btn-primary-custom {
            background-color: #00695c; color: white;
            border-radius: 12px; padding: 12px; font-weight: 600;
            border: none; width: 100%; margin-top: 10px;
        }
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

    <div class="mobile-view container d-flex flex-column justify-content-center align-items-center min-vh-100 py-4">
        <div class="text-center mb-4">
            <div style="width: 50px; height: 50px; background: #00695c; color: white; border-radius: 12px; display: grid; place-items: center; font-weight: bold; margin: 0 auto 10px;">HF</div>
            <h4 class="fw-bold text-dark">HealthyFlow</h4>
        </div>
        <div class="col-12 col-md-5 col-lg-4">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
