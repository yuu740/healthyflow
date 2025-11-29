<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - HealthyFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fcfcfc; /* Putih sedikit abu biar mata nyaman */
        }

        /* 1. Styling Navbar Lonjong di Tengah */
        .nav-pill-custom {
            background-color: #e6e6e6; /* Abu-abu muda sesuai gambar */
            border-radius: 50px;       /* Membuat sudut sangat bulat */
            padding: 10px 30px;
            display: inline-flex;
            gap: 30px;                 /* Jarak antar menu */
        }
        .nav-link-custom {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }
        .nav-link-custom:hover {
            color: #000;
        }

        /* 2. Styling Card Water (Biru Pastel) */
        .card-water {
            background-color: #d0e8ea; /* Warna biru pastel sesuai gambar */
            border: 1px solid #b0d0d3;
            border-radius: 20px;
            height: 180px;             /* Tinggi fix biar rapi */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .card-water:hover {
            transform: translateY(-5px); /* Efek naik dikit pas dihover */
        }

        /* 3. Styling Card Activity (Putih) */
        .card-activity {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 20px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .card-activity:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-weight: 600;
            font-size: 18px;
            color: #000;
        }
    </style>
</head>
<body>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <h4 class="fw-bold mb-0">HealthyFlow</h4>

            <div class="d-none d-md-block"> <div class="nav-pill-custom">
                    <a href="#" class="nav-link-custom fw-bold">Dashboard</a>
                    <a href="#" class="nav-link-custom">Logs</a>
                    <a href="#" class="nav-link-custom">Gallery</a>
                    <a href="#" class="nav-link-custom">Settings</a>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-dark text-decoration-none fw-medium" style="font-size: 14px;">
                    Log out
                </button>
            </form>
        </div>

        <div class="mb-5">
            <h3 class="fw-medium">
                Hi, {{ Auth::user()->name }}! Stay Hydrated 💧✨
            </h3>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card-water">
                        <span class="card-title">Daily Water Intake</span>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card-activity">
                        <span class="card-title">Weekly Activity</span>
                    </div>
                </a>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
