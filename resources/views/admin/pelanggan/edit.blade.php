@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Pelanggan</h2>

    <form action="{{ url('/admin/pelanggan/'.$data->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $data->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No. Telp</label>
            <input type="text" name="telp" value="{{ $data->telp }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>

    </form>

</div>
@endsection