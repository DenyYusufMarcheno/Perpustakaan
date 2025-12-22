@extends('layouts.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Selamat Datang di Sistem Peminjaman Buku Perpustakaan</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h5 class="alert-heading">Halo, {{ auth()->user()->name }}!</h5>
                        <p>Anda login sebagai: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
                    </div>

                    @if(auth()->user()->isAdmin() || auth()->user()->isPetugas())
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="mb-0">{{ \App\Models\Buku::count() }}</h3>
                                            <span>Total Buku</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="mb-0">{{ \App\Models\Anggota::count() }}</h3>
                                            <span>Total Anggota</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-people-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="mb-0">{{ \App\Models\Peminjaman::where('status', 'Dipinjam')->count() }}</h3>
                                            <span>Peminjaman Aktif</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-arrow-down-up" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Menu Cepat</h5>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('buku.index') }}" class="btn btn-primary">
                                    <i class="bi bi-book-fill"></i> Kelola Buku
                                </a>
                                <a href="{{ route('anggota.index') }}" class="btn btn-success">
                                    <i class="bi bi-people-fill"></i> Kelola Anggota
                                </a>
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-warning">
                                    <i class="bi bi-arrow-down-up"></i> Kelola Peminjaman
                                </a>
                                <a href="{{ route('peminjaman.create') }}" class="btn btn-info text-white">
                                    <i class="bi bi-plus-circle"></i> Tambah Peminjaman
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Menu Anggota</h5>
                                    <p>Sebagai anggota, Anda dapat melihat katalog buku yang tersedia di perpustakaan.</p>
                                    <a href="{{ route('buku.list') }}" class="btn btn-primary">
                                        <i class="bi bi-book-fill"></i> Lihat Katalog Buku
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
