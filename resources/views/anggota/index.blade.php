@extends('layouts.app')

@section('title', 'Data Anggota Perpustakaan')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Daftar Anggota</h4>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggotas as $anggota)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $anggota->nama }}</td>
                        <td>{{ $anggota->npm }}</td>
                        <td>{{ $anggota->email }}</td>
                        <td>{{ $anggota->alamat }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data anggota {{ $anggota->nama }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $anggotas->links() }}
        </div>
    </div>
</section>
@endsection