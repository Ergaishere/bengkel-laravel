@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Layanan</h2>

    <form action="{{ url('/admin/layanan/'.$data->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Layanan</label>
            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $data->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $data->harga }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>

    </form>

</div>
@endsection