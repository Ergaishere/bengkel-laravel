@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="alert alert-success">
        Selamat datang, Admin {{ Auth::user()->name }}!
    </div>

    <p>Silakan pilih menu di atas untuk mengelola data bengkel.</p>
</div>
@endsection