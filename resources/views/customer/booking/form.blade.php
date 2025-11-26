@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Booking Service Kendaraan</h5>
                </div>

                <div class="card-body">

                    <form action="/booking" method="POST">
                        @csrf

                        <!-- Layanan -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Layanan</label>
                            <select name="layanan_id" class="form-select" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($layanans as $l)
                                <option value="{{ $l->id }}">
                                    {{ $l->nama }} (Rp {{ number_format($l->harga) }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mekanik -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Mekanik</label>
                            <select name="mekanik_id" class="form-select" required>
                                <option value="">-- Pilih Mekanik --</option>
                                @foreach($mekaniks as $m)
                                <option value="{{ $m->id }}">
                                    {{ $m->nama }} ({{ $m->keahlian }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jadwal -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Jadwal Service</label>
                            <select name="jadwal_id" class="form-select" required>
                                <option value="">-- Pilih Jadwal --</option>
                                @foreach($jadwals as $j)
                                <option value="{{ $j->id }}">
                                    {{ $j->tanggal }} - {{ $j->jam }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="text-end mt-4">
                            <button class="btn btn-success px-4">Booking Sekarang</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection