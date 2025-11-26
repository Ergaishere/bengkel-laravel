@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="fw-bold mb-4">Beri Rating & Komentar</h3>

    <div class="card shadow-sm p-4">

        <h5>Layanan: {{ $booking->layanan->nama }}</h5>
        <h6>Mekanik: {{ $booking->mekanik->nama }}</h6>
        <p>Tanggal: {{ $booking->jadwal->tanggal }} {{ $booking->jadwal->jam }}</p>

        <form action="/booking/{{ $booking->id }}/rating" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <select class="form-select" name="rating" required>
                    <option value="">-- Pilih Rating --</option>
                    <option value="1">⭐ 1</option>
                    <option value="2">⭐⭐ 2</option>
                    <option value="3">⭐⭐⭐ 3</option>
                    <option value="4">⭐⭐⭐⭐ 4</option>
                    <option value="5">⭐⭐⭐⭐⭐ 5</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Komentar (opsional)</label>
                <textarea name="komentar" class="form-control" rows="3"></textarea>
            </div>

            <button class="btn btn-primary px-4">Kirim Rating</button>

        </form>

    </div>
</div>
@endsection