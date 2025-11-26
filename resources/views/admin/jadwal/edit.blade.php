@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Jadwal Service</h2>

    <form action="{{ url('/admin/jadwal/'.$data->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $data->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" value="{{ $data->jam }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>

    </form>

</div>
@endsection