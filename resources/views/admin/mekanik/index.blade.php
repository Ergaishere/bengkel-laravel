@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Mekanik</h2>

    <a href="{{ url('/admin/mekanik/create') }}" class="btn btn-primary mb-3">Tambah Mekanik</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->keahlian }}</td>
                        <td>
                            <a href="{{ url('/admin/mekanik/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/admin/mekanik/'.$item->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mekanik?')">Hapus</button>
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