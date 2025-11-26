@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Edit Status Booking</h2>

    <form action="{{ url('/admin/booking/'.$data->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $data->status=='pending'?'selected':'' }}>Pending</option>
                <option value="diterima" {{ $data->status=='diterima'?'selected':'' }}>Diterima</option>
                <option value="selesai" {{ $data->status=='selesai'?'selected':'' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection