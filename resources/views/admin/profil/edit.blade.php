@extends('layouts.admin')

@section('title', 'Edit Profil Toko')
@section('page-title', 'Edit Profil Toko')

@section('content')
<div class="card card-batik">
    <div class="card-header">
        <h5><i class="fas fa-store"></i> Edit Profil Toko</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Toko <span class="text-danger">*</span></label>
                <input type="text" name="nama_toko" class="form-control" 
                       value="{{ old('nama_toko', $profil->nama_toko ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Toko</label>
                <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Telepon / Kontak</label>
                    <input type="text" name="kontak" class="form-control" 
                           value="{{ old('kontak', $profil->kontak ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">WhatsApp</label>
                    <input type="text" name="whatsapp" class="form-control" 
                           value="{{ old('whatsapp', $profil->whatsapp ?? '') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="{{ old('email', $profil->email ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi / Alamat</label>
                    <input type="text" name="lokasi" class="form-control" 
                           value="{{ old('lokasi', $profil->lokasi ?? '') }}">
                </div>
            </div>

            <!-- Logo Saat Ini -->
            @if($profil && $profil->logo_toko)
            <div class="mb-3">
                <label class="form-label">Logo Saat Ini</label><br>
                <img src="{{ asset('images/logo/' . $profil->logo_toko) }}" 
                     class="img-thumbnail" style="max-height: 120px;">
            </div>
            @endif

            <div class="mb-4">
                <label class="form-label">Logo Toko Baru (Opsional)</label>
                <input type="file" name="logo_toko" class="form-control" accept="image/jpeg,image/png,image/jpg">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti logo</small>
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary btn-lg">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection