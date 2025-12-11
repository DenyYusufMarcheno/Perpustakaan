@extends('layouts.app')

@section('title', 'Buat Peminjaman Baru')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                
                {{-- Dropdown Anggota --}}
                <div class="mb-3">
                    <label for="anggota_id" class="form-label">Pilih Anggota</label>
                    <select class="form-select @error('anggota_id') is-invalid @enderror" id="anggota_id" name="anggota_id" required>
                        <option value="">-- Pilih Anggota --</option>
                        @foreach ($anggotas as $anggota)
                            <option value="{{ $anggota->id }}" {{ old('anggota_id') == $anggota->id ? 'selected' : '' }}>
                                {{ $anggota->nama }} ({{ $anggota->npm }})
                            </option>
                        @endforeach
                    </select>
                    @error('anggota_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Dropdown Buku (Hanya Stok Tersedia) --}}
                <div class="mb-3">
                    <label for="buku_id" class="form-label">Pilih Buku</label>
                    <select class="form-select @error('buku_id') is-invalid @enderror" id="buku_id" name="buku_id" required>
                        <option value="">-- Pilih Buku --</option>
                        @forelse ($bukus as $buku)
                            <option value="{{ $buku->id }}" {{ old('buku_id') == $buku->id ? 'selected' : '' }}>
                                {{ $buku->judul }} oleh {{ $buku->penulis }} (Stok Tersedia: {{ $buku->stok }})
                            </option>
                        @empty
                            <option value="" disabled>Semua buku yang tersedia sedang dipinjam atau stok kosong.</option>
                        @endforelse
                    </select>
                    @error('buku_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                {{-- Tanggal Pinjam --}}
                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
                    @error('tanggal_pinjam')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-success me-2">Catat Peminjaman</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</section>
@endsection