@extends('layouts.app')

@section('content')
<style>
.card-cyber {
    background: rgba(20,20,40,0.8);
    color: #00eaff;
    border: 1px solid #3a3aff;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,102,255,0.4);
    padding: 20px;
    transition: .3s;
}
.card-cyber:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 25px #00eaff;
}
</style>

<div class="container py-4">

    <h2 class="fw-bold mb-4 text-info" style="text-shadow:0 0 6px #00eaff;">
        Welcome, {{ Auth::user()->name }} 👋
    </h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card-cyber text-center">
                <h5>Layanan</h5>
                <p>Cek semua pilihan service.</p>
                <a href="/layanan-list" class="btn btn-primary btn-sm">Lihat</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-cyber text-center">
                <h5>Booking Service</h5>
                <p>Pilih mekanik & jadwal.</p>
                <a href="/booking" class="btn btn-success btn-sm">Booking</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-cyber text-center">
                <h5>Riwayat Booking</h5>
                <p>Lihat histori service.</p>
                <a href="/booking-riwayat" class="btn btn-info btn-sm">Riwayat</a>
            </div>
        </div>

    </div>

</div>
@endsection