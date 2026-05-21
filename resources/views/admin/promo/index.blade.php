@extends('layouts.admin')

@section('title', 'Kelola Promo')
@section('page-title', 'Promo')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Promo</h4>
    <a href="{{ route('admin.promo.create') }}" class="btn btn-batik">
        <i class="fas fa-plus"></i> Tambah Promo Baru
    </a>
</div>

<div class="card card-batik">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Gambar</th>
                    <th>Judul Promo</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promos as $promo)
                <tr>
                    <td>
                        @if($promo->gambar)
                            <img src="{{ asset('images/promo/'.$promo->gambar) }}" width="70" class="rounded">
                        @else
                            <i class="fas fa-image text-muted"></i>
                        @endif
                    </td>
                    <td><strong>{{ $promo->judul }}</strong></td>
                    <td>{{ $promo->tanggal_mulai->format('d M') }} - {{ $promo->tanggal_selesai->format('d M Y') }}</td>
                    <td>
                        @if($promo->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.promo.toggle', $promo->id_promo) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-toggle-{{ $promo->is_active ? 'on' : 'off' }}"></i>
                        </a>
                        <a href="{{ route('admin.promo.edit', $promo->id_promo) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.promo.destroy', $promo->id_promo) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus promo ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $promos->links() }}
@endsection