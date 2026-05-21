@extends('layouts.admin')

@section('title', 'Edit Promo')
@section('page-title', 'Edit Promo')

@section('content')
<div class="card card-batik">
    <div class="card-header">
        <h5><i class="fas fa-edit"></i> Edit Promo</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.promo.update', $promo->id_promo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Promo <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                       value="{{ old('judul', $promo->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                           value="{{ old('tanggal_mulai', $promo->tanggal_mulai->format('Y-m-d')) }}" required>
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                           value="{{ old('tanggal_selesai', $promo->tanggal_selesai->format('Y-m-d')) }}" required>
                    @error('tanggal_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Promo</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                        {{ old('is_active', $promo->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Aktif
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi / Deskripsi Promo <span class="text-danger">*</span></label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" 
                          rows="6" required>{{ old('isi', $promo->isi) }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gambar Saat Ini -->
            @if($promo->gambar)
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                <img src="{{ asset('images/promo/' . $promo->gambar) }}" 
                     class="img-thumbnail" style="max-height: 200px;">
            </div>
            @endif

            <div class="mb-4">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                       accept="image/jpeg,image/png,image/jpg">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Update Promo
                </button>
                <a href="{{ route('admin.promo.index') }}" class="btn btn-secondary btn-lg">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection