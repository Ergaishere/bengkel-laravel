@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Mekanik</h2>

    <form action="{{ url('/admin/mekanik') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Mekanik</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keahlian</label>
            <input type="text" name="keahlian" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>
@endsection