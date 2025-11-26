@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Jadwal Service</h2>

    <a href="{{ url('/admin/jadwal/create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>
                            <a href="{{ url('/admin/jadwal/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ url('/admin/jadwal/'.$item->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus jadwal?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
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