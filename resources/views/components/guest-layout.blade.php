<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthyFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .input-custom { background-color: #eeeeee; border: none; border-radius: 8px; padding: 12px 15px; }
        .input-custom:focus { background-color: #e2e2e2; box-shadow: none; }
        .btn-teal { background-color: #006064; color: white; border-radius: 8px; padding: 10px; font-weight: 600; }
        .btn-teal:hover { background-color: #004d50; color: white; }
        .btn-green { background-color: #669e62; color: white; border-radius: 8px; padding: 10px; font-weight: 600; }
        .btn-green:hover { background-color: #558b51; color: white; }
        .text-teal { color: #006064; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">HealthyFlow</h2>
            <p class="text-muted">Track your wellness journey</p>
        </div>
        <div class="col-12 col-md-5 col-lg-4">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
