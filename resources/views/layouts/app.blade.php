<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Font Premium -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- AOS Animation -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif !important;
        background: #f4f7fb;
    }

    .navbar {
        background: #ffffffcc !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid #e5e5e5;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.3rem;
        color: #0d6efd !important;
    }

    .hero-section {
        background: linear-gradient(135deg, #4f46e5 0%, #0ea5e9 100%);
        color: white;
        padding: 120px 0;
        border-radius: 0 0 50px 50px;
    }

    .btn-glow {
        position: relative;
        overflow: hidden;
        transition: 0.3s;
    }
    .btn-glow:hover {
        box-shadow: 0 0 15px rgba(255,255,255,0.7);
        transform: translateY(-2px);
    }

    .card-modern {
        border-radius: 15px;
        padding: 20px;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .card-modern:hover {
        transform: translateY(-5px);
    }

    footer {
        background: #111827;
        color: #e5e7eb;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<footer class="py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0 fw-bold">© {{ date('Y') }} Bengkel Online </p>
        <p class="text-muted small"></p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
AOS.init();

</script>

<body>
<div id="app">

    <!-- NAVBAR FIX -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Bengkel Online
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side -->
            <ul class="navbar-nav me-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                @else
                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('layanan.index') }}">Data Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('mekanik.index') }}">Data Mekanik</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.index') }}">Data Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.index') }}">Data Pelanggan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('booking.index') }}">Data Booking</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/customer/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/layanan-list">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/booking">Booking Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="/booking-riwayat">Riwayat Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="/favourite">Favorit</a></li>
                    @endif
                @endguest
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ url('/contact') }}">Contact</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <!-- CONTENT -->
    <main class="py-4">
        @yield('content')
    </main>

</div>
</body>
</html>