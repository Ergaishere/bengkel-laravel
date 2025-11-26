@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4" data-aos="fade-right">Dashboard Admin</h2>

    <div class="row g-4">

        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-modern text-center">
                <h6 class="text-muted">Layanan</h6>
                <h2>{{ \App\Models\Layanan::count() }}</h2>
                <a href="/admin/layanan" class="btn btn-primary btn-sm btn-glow">Kelola</a>
            </div>
        </div>

        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="card-modern text-center">
                <h6 class="text-muted">Mekanik</h6>
                <h2>{{ \App\Models\Mekanik::count() }}</h2>
                <a href="/admin/mekanik" class="btn btn-primary btn-sm btn-glow">Kelola</a>
            </div>
        </div>

        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="card-modern text-center">
                <h6 class="text-muted">Jadwal</h6>
                <h2>{{ \App\Models\Jadwal::count() }}</h2>
                <a href="/admin/jadwal" class="btn btn-primary btn-sm btn-glow">Kelola</a>
            </div>
        </div>

        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
            <div class="card-modern text-center">
                <h6 class="text-muted">Booking</h6>
                <h2>{{ \App\Models\Booking::count() }}</h2>
                <a href="/admin/booking" class="btn btn-primary btn-sm btn-glow">Kelola</a>
            </div>
        </div>

    </div>

</div>
@endsection