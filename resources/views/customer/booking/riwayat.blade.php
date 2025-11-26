@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4 fw-bold">Riwayat Booking Anda</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            @if($data->count() == 0)
                <p class="text-center text-muted">Belum ada riwayat booking.</p>
            @else

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Layanan</th>
                        <th>Mekanik</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Update Terakhir</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $b)
                    <tr class="text-center">
                        <td>{{ $b->layanan->nama }}</td>
                        <td>{{ $b->mekanik->nama }}</td>
                        <td>{{ $b->jadwal->tanggal }} - {{ $b->jadwal->jam }}</td>

                        <td>
                            @php
                                $badge = 'secondary';
                                if ($b->status == 'pending') $badge = 'warning';
                                if ($b->status == 'diterima') $badge = 'info';
                                if ($b->status == 'selesai') $badge = 'success';
                            @endphp
                            <span class="badge bg-{{ $badge }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>

                        <td>{{ $b->status_updated_at ?? '-' }}</td>
                        

                        @if($b->status == 'selesai')
    @if($b->rating)
        <td>⭐⭐⭐⭐⭐</td> {{-- bisa dibuat lebih dinamis --}}
    @else
        <td><a href="/booking/{{ $b->id }}/rating" class="btn btn-sm btn-success">Beri Rating</a></td>
    @endif
@else
    <td>-</td>
@endif
<td>                
<a href="/booking/cetak/{{ $b->id }}"  class="btn btn-secondary btn-sm mt-2" target="_blank">
    Cetak PDF
</a>
</td>

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @endif

        </div>
    </div>

</div>
@endsection