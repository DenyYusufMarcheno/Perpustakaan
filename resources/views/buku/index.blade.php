@extends('layouts.app')

@section('title', 'Katalog Buku Perpustakaan')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Daftar Buku</h4>
            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>ISBN</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $buku)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->isbn }}</td>
                        <td>
                            <span class="badge bg-{{ $buku->stok > 0 ? 'success' : 'danger' }}">
                                {{ $buku->stok }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku {{ $buku->judul }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $bukus->links() }}
        </div>
    </div>
</section>
@endsection