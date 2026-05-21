@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Kontak Kami</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('kontak.kirim') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="5" required></textarea>
        </div>

        <button class="btn btn-primary">Kirim Pesan</button>
    </form>

</div>

@endsection