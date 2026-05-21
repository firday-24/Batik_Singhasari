@extends('layouts.admin')

@section('title', isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori')

@section('page-title', isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-batik">
            <div class="card-header">
                <h5>{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ isset($kategori) ? 
                    route('admin.kategori.update', $kategori->id_kategori) : 
                    route('admin.kategori.store') }}" 
                    method="POST">
                    
                    @csrf
                    @if(isset($kategori))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_kategori" 
                               class="form-control @error('nama_kategori') is-invalid @enderror"
                               value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" 
                               required>
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  rows="5">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection