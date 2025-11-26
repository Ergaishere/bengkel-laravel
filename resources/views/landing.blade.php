@extends('layouts.app')

@section('content')

<div class="hero-section text-center" data-aos="fade-down">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Bengkel Online Premium</h1>
        <p class="lead mb-4">Booking service kendaraan secara modern, cepat, dan tanpa ribet.</p>

        <a href="{{ route('login') }}" class="btn btn-light btn-lg btn-glow me-3 px-4">Masuk</a>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">Daftar</a>
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center fw-bold mb-5" data-aos="fade-up">Fitur Unggulan Kami</h3>

    <div class="row g-4">
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-modern h-100 text-center">
                <h5 class="fw-bold">Booking Online</h5>
                <p>Pesan tanpa antre, cukup lewat HP!</p>
            </div>
        </div>

        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="card-modern h-100 text-center">
                <h5 class="fw-bold">Mekanik Profesional</h5>
                <p>Ditangani oleh teknisi bersertifikat.</p>
            </div>
        </div>

        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="card-modern h-100 text-center">
                <h5 class="fw-bold">Jadwal Fleksibel</h5>
                <p>Pilih sendiri tanggal & waktu service.</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Kontak & Lokasi</h3>

    <div class="row g-4">
        <div class="col-md-6" data-aos="fade-right">
            <div class="card-modern">
                <h5 class="fw-bold">Kontak</h5>
                <p class="mb-1">Telp: 0812-3456-7890</p>
                <p class="mb-1">Email: info@bengkelonline.com</p>
                <p>Instagram: @bengkelonline</p>
            </div>
        </div>

        <div class="col-md-6" data-aos="fade-left">
            <div class="card-modern">
                <h5 class="fw-bold">Alamat Bengkel</h5>
                <p>Jl. kaliurang No.Q12A, Kota jember</p>
                <p>Buka: 08.00 – 17.00</p>
            </div>
        </div>
    </div>
</div>

@endsection