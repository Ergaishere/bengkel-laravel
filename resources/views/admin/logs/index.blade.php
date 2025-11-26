@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Riwayat Perubahan Status Booking</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Admin</th>
                <th>Status Lama</th>
                <th>Status Baru</th>
                <th>Waktu</th>
            </tr>
        </thead>

        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->booking_id }}</td>
                <td>{{ $log->admin }}</td>
                <td>{{ $log->old_status ?? '-' }}</td>
                <td>{{ $log->new_status }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection