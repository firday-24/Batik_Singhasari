@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')

@section('content')
<div class="card card-batik">
    <div class="card-header">
        <h5><i class="fas fa-edit"></i> Edit Produk</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}" 
                                {{ old('id_kategori', $produk->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Produk -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" 
                           value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Harga & Stok -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" 
                           value="{{ old('harga', $produk->harga) }}" min="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" 
                           value="{{ old('stok', $produk->stok) }}" min="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Foto Saat Ini -->
            @if($produk->foto_produk)
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini</label><br>
                <img src="{{ asset('images/produk/' . $produk->foto_produk) }}" 
                     class="img-thumbnail" style="max-height: 180px;">
            </div>
            @endif

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label">Foto Produk Baru (Opsional)</label>
                <input type="file" name="foto_produk" class="form-control @error('foto_produk') is-invalid @enderror" 
                       accept="image/jpeg,image/png,image/jpg">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                @error('foto_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                          rows="6">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Update Produk
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary btn-lg">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection