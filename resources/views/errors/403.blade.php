@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-shield-exclamation" style="font-size: 5rem; color: #dc3545;"></i>
                    </div>
                    <h2 class="mb-3">403 - Akses Ditolak</h2>
                    <p class="lead mb-4">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                    <div class="alert alert-warning d-inline-block">
                        <i class="bi bi-info-circle"></i>
                        Anda login sebagai: <strong>{{ ucfirst(auth()->user()->role ?? 'Guest') }}</strong>
                    </div>
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary">
                            <i class="bi bi-house-door"></i> Kembali ke Dashboard
                        </a>
                        @if(auth()->check() && !auth()->user()->isAdmin())
                        <a href="{{ route('logout') }}" class="btn btn-secondary" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
