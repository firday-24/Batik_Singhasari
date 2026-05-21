@extends('layouts.admin')

@section('title', 'Kelola Review')
@section('page-title', 'Review Pelanggan')

@section('content')
<div class="card card-batik">
    <div class="card-header">
        <h5>Daftar Review Pelanggan</h5>
    </div>
    <div class="card-body">
        @if($reviews->count() > 0)
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Nama Pelanggan</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th width="80">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td><strong>{{ $review->produk->nama_produk ?? '-' }}</strong></td>
                    <td>{{ $review->nama }}</td>
                    <td>
                        <span class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </span>
                        <small>({{ $review->rating }})</small>
                    </td>
                    <td>{{ Str::limit($review->komentar, 80) }}</td>
                    <td><small>{{ $review->created_at->format('d M Y H:i') }}</small></td>
                    <td>
                        <form action="{{ route('admin.review.destroy', $review->id_testimoni) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $reviews->links() }}
        </div>

        @else
        <div class="text-center py-5 text-muted">
            <i class="fas fa-comment-slash fa-3x mb-3"></i>
            <p>Belum ada review dari pelanggan.</p>
        </div>
        @endif
    </div>
</div>
@endsection