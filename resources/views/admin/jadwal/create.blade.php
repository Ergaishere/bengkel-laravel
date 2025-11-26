@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Jadwal Service</h2>

    <form action="{{ url('/admin/jadwal') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>
@endsection