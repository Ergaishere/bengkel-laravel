@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Layanan Favorit Saya</h2>

    <div class="row">
        @foreach($data as $fav)
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4>{{ $fav->layanan->nama }}</h4>
                    <p>{{ $fav->layanan->deskripsi ?? '-' }}</p>

                    <a href="/favourite/remove/{{ $fav->layanan->id }}" class="btn btn-danger btn-sm">
                        Hapus dari Favorit
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection