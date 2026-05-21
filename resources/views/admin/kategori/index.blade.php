@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('page-title', 'Kategori')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Kategori</h4>
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah Kategori
    </a>
</div>

<table class="table table-striped card-batik">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ Str::limit($kategori->deskripsi, 50) }}</td>
            <td><span class="badge bg-primary">{{ $kategori->produks_count }}</span></td>
            <td>
                <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection