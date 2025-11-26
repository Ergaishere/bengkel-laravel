@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Layanan</h2>

    <a href="{{ url('/admin/layanan/create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>Rp {{ number_format($item->harga) }}</td>
                        <td>
                            <a href="{{ url('/admin/layanan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/admin/layanan/'.$item->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
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