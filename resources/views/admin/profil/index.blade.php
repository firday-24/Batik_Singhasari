@extends('layouts.admin')

@section('title', 'Profil Toko')
@section('page-title', 'Profil Toko')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-batik">
            <div class="card-header">
                <h5>Informasi Toko Saat Ini</h5>
            </div>
            <div class="card-body">
                @if($profil)
                    @if($profil->logo_toko)
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo/' . $profil->logo_toko) }}" 
                             class="img-fluid rounded shadow" style="max-height: 150px;">
                    </div>
                    @endif

                    <table class="table table-borderless">
                        <tr>
                            <th width="180">Nama Toko</th>
                            <td>: <strong>{{ $profil->nama_toko }}</strong></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>: {{ $profil->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>: {{ $profil->kontak }}</td>
                        </tr>
                        <tr>
                            <th>WhatsApp</th>
                            <td>: {{ $profil->whatsapp }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $profil->email }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>: {{ $profil->lokasi }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('admin.profil.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profil Toko
                    </a>
                @else
                    <div class="alert alert-warning">
                        Profil toko belum diisi. Silakan tambahkan terlebih dahulu.
                    </div>
                    <a href="{{ route('admin.profil.edit') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Isi Profil Toko
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection