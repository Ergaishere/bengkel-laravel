@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Pelanggan</h2>

    <a href="{{ url('/admin/pelanggan/create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ url('/admin/pelanggan/'.$item->id.'/edit') }}">Edit</a>

                            <form action="{{ url('/admin/pelanggan/'.$item->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus pelanggan?')" class="btn btn-danger btn-sm">Hapus</button>
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