@extends('layouts.app')

@section('content')

<style>
body {
    background: radial-gradient(circle at top, #0d0d19, #000000 70%) !important;
    background-attachment: fixed;
}

.cyber-card {
    background: rgba(20, 20, 40, 0.85);
    border: 1px solid #3a3aff;
    box-shadow: 0 0 25px rgba(0, 102, 255, 0.4);
    border-radius: 20px;
    padding: 30px;
    color: white;
    backdrop-filter: blur(8px);
    animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}

.cyber-input {
    background: rgba(255,255,255,0.1);
    border: 1px solid #5555ff;
    color: #00eaff;
    border-radius: 10px;
}

.cyber-input:focus {
    border-color: #00eaff;
    box-shadow: 0 0 8px #00eaff;
    background: rgba(255,255,255,0.15);
    color: #fff;
}

.cyber-title {
    font-size: 32px;
    font-weight: 800;
    color: #00eaff;
    text-shadow: 0 0 8px #00eaff;
}

.cyber-btn {
    background: linear-gradient(90deg, #0066ff, #00eaff);
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 10px;
    width: 100%;
    padding: 10px;
    transition: 0.3s;
}

.cyber-btn:hover {
    box-shadow: 0 0 18px #00eaff;
    transform: translateY(-3px);
}

.cyber-link {
    color: #00eaff;
    text-shadow: 0 0 6px #00eaff;
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="cyber-card">

                <h2 class="text-center cyber-title mb-4">REGISTER</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- NAME -->
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input id="name" type="text"
                               class="form-control cyber-input @error('name') is-invalid @enderror"
                               name="name" required autofocus>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input id="email" type="email"
                               class="form-control cyber-input @error('email') is-invalid @enderror"
                               name="email" required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input id="password" type="password"
                               class="form-control cyber-input @error('password') is-invalid @enderror"
                               name="password" required>
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password</label>
                        <input id="password-confirm" type="password"
                               class="form-control cyber-input"
                               name="password_confirmation" required>
                    </div>

                    <button type="submit" class="cyber-btn">
                        DAFTAR SEKARANG
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="cyber-link">Sudah punya akun? Login</a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection