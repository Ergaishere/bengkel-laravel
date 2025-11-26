@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Kontak Bengkel</h2>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5>Informasi Kontak</h5>
                    <p class="mb-1">Telepon/WA: 0812-3456-7890</p>
                    <p class="mb-1">Email: info@bengkelonline.test</p>
                    <p class="mb-0">Instagram: @bengkelonline</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5>Alamat & Jam Operasional</h5>
                    <p class="mb-1">Jl. No. kaliurang, Kota jember</p>
                    <p class="mb-1">Senin – Sabtu: 08.00 – 17.00</p>
                    <p class="mb-0">Minggu/Tanggal Merah: Tutup</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection