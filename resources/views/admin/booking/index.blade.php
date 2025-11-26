@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Data Booking</h2>

    <div class="card">
        <div class="card-body">
            
        <form method="GET" action="" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ request('search') }}"
               class="form-control" placeholder="Cari booking... (nama, layanan, mekanik, status)">
        <button class="btn btn-primary">Cari</button>
        <a href="/admin/booking" class="btn btn-secondary">Reset</a>
    </div>
</form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Mekanik</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Update Terakhir</th>  
                        <th>Aksi</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $i)
                    <tr>
                        <td>{{ $i->user->name ?? 'User hilang' }}</td>
                        <td>{{ $i->layanan->nama ?? 'Layanan hilang' }}</td>
                        <td>{{ $i->mekanik->nama ?? 'Mekanik hilang' }}</td>
                        <td>
                            {{ isset($i->jadwal) ? $i->jadwal->tanggal.' '.$i->jadwal->jam : 'Jadwal hilang' }}
                        </td>

                        <!-- STATUS BADGE -->
                        <td>
                            @php
                                $badge = 'secondary';
                                if ($i->status == 'pending') $badge = 'warning';
                                if ($i->status == 'diterima') $badge = 'info';
                                if ($i->status == 'selesai') $badge = 'success';
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($i->status) }}</span>
                        </td>
                        <td>{{ $i->status_updated_at ?? '-' }}</td>
                        <td>


                        
                            <a href="{{ url('/admin/booking/'.$i->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                        
                            <form action="{{ url('/admin/booking/'.$i->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus booking?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                                <td>
    <a href="/booking/cetak/{{ $i->id }}"
       class="btn btn-secondary btn-sm" 
       target="_blank">
        Cetak PDF
    </a>
</td>
             
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection