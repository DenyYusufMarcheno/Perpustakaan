<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | @yield('title', 'Dashboard')</title>
    
    {{-- PATH ASET DIREVISI TOTAL: Sesuai dengan folder compiled/ Anda --}}
    
    {{-- Main CSS (Asumsi Mazer menggunakan app.css atau sejenisnya di folder compiled/css) --}}
    <link rel="stylesheet" href="{{ asset('assets/mazer/dist/assets/compiled/css/app.css') }}">
    
    {{-- Vendor/Icon CSS (Asumsi icon/tema lainnya juga ada di compiled/css) --}}
    <link rel="stylesheet" href="{{ asset('assets/mazer/dist/assets/compiled/css/app-dark.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/mazer/dist/assets/compiled/css/iconly.css') }}"> 
    {{-- Jika ada vendor lain (misalnya bootstrap-icons), sesuaikan path-nya di sini --}}
    
    {{-- Dark Mode CSS --}}
    <link rel="stylesheet" href="{{ asset('css/darkmode.css') }}">
</head>
<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            {{-- Header sederhana --}}
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('title')</h3>
            </div>

            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Perpustakaan Laravel Mazer</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    {{-- PATH SCRIPT DIREVISI TOTAL: Sesuai dengan folder compiled/js Anda --}}
    {{-- Asumsi main script Mazer adalah app.js atau main.js di dalam compiled/js --}}
    <script src="{{ asset('assets/mazer/dist/assets/compiled/js/app.js') }}"></script>
    {{-- Tambahkan script lain yang diperlukan di sini --}}
    
    {{-- Dark Mode Script --}}
    <script src="{{ asset('js/darkmode.js') }}"></script>
</body>
</html>