@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Layanan</h2>

    <form action="{{ url('/admin/layanan') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Layanan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>
@endsection