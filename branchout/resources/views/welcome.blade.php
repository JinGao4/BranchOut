<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BranchOut</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #1a1a1a;
        }
        .btn-green {
            background-color: #28a745;
            color: #fff;
        }
        .btn-green:hover {
            background-color: #218838;
            color: #fff;
        }
        .hero-section {
            background-color: #e6f4ea;
            border-radius: 1rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <header class="container py-4 d-flex justify-content-between align-items-center">
        <h1 class="h4 fw-bold text-success">BranchOut</h1>
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-success me-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success me-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main class="container flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="row align-items-center hero-section p-5 shadow-sm">
            <div class="col-md-6 text-center text-md-start">
                <h2 class="fw-bold text-success">Welcome to BranchOut</h2>
                <p class="lead mt-3 mb-4">Grow your network, expand your opportunities, and branch out into success with our platform.</p>
                <a href="{{ route('register') }}" class="btn btn-green btn-lg">Get Started</a>
            </div>
            <div class="col-md-6 text-center mt-4 mt-md-0">
                <img src="https://cdn-icons-png.flaticon.com/512/4273/4273800.png" alt="BranchOut logo" width="250" class="img-fluid">
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-muted small">
        © {{ now()->year }} BranchOut. All rights reserved.
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
