@extends('layouts.admin')

@section('title', 'Kelola Produk')
@section('page-title', 'Produk')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4>Daftar Produk</h4>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>

<table class="table table-hover card-batik">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
        <tr>
            <td>
                @if($produk->foto_produk)
                    <img src="{{ asset('images/produk/'.$produk->foto_produk) }}" width="60" class="rounded">
                @endif
            </td>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
            <td>Rp {{ number_format($produk->harga) }}</td>
            <td>{{ $produk->stok }}</td>
            <td>
                <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" class="d-inline" 
                      onsubmit="return confirm('Hapus produk ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $produks->links() }}
@endsection