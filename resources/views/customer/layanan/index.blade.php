@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Daftar Layanan</h2>

    <div class="card">
        <div class="card-body">
            @foreach($layanans as $l)
            <div class="border p-3 mb-3 rounded">
                <h5>{{ $l->nama }}</h5>
                <p>{{ $l->deskripsi }}</p>
                <strong>Harga: Rp {{ number_format($l->harga) }}</strong>

                <br><br>

                <a href="/favourite/add/{{ $l->id }}" class="btn btn-warning btn-sm">
                ❤️ Tambah ke Favorit
                </a>

            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection