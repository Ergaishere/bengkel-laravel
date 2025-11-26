@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Mekanik</h2>

    <form action="{{ url('/admin/mekanik/'.$data->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Mekanik</label>
            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keahlian</label>
            <input type="text" name="keahlian" value="{{ $data->keahlian }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>

    </form>

</div>
@endsection