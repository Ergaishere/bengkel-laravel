@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Pelanggan</h2>

    <form action="{{ url('/admin/pelanggan') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No. Telp</label>
            <input type="text" name="telp" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>
@endsection