@extends('layouts.app')

@section('title', 'Daftar Peminjaman & Pengembalian')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Data Transaksi Peminjaman</h4>
            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Catat Peminjaman Baru</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Anggota</th>
                        <th>Buku Dipinjam</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $peminjaman->anggota->nama }}</td>
                        <td>{{ $peminjaman->buku->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
                        <td>{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') : '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $peminjaman->status == 'Dipinjam' ? 'warning' : 'success' }}">{{ $peminjaman->status }}</span>
                        </td>
                        <td>
                            @if ($peminjaman->status == 'Dipinjam')
                            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Sudah Kembali">
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi Pengembalian Buku?')">
                                    Kembalikan
                                </button>
                            </form>
                            @else
                                <span class="text-muted">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $peminjamans->links() }}
        </div>
    </div>
</section>
@endsection