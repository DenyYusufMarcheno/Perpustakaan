<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/mazer/dist/assets/compiled/svg/logo.svg') }}" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu Utama</li>

                <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isPetugas()))
                <li class="sidebar-item {{ Request::is('anggota*') ? 'active' : '' }}">
                    <a href="{{ route('anggota.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Data Anggota</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::is('buku*') ? 'active' : '' }}">
                    <a href="{{ route('buku.index') }}" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Katalog Buku</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::is('peminjaman*') ? 'active' : '' }}">
                    <a href="{{ route('peminjaman.index') }}" class='sidebar-link'>
                        <i class="bi bi-arrow-down-up"></i>
                        <span>Transaksi Peminjaman</span>
                    </a>
                </li>
                @endif
                
                @if(auth()->check() && auth()->user()->isAdmin())
                <li class="sidebar-item {{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Kelola User/Member/Admin</span>
                    </a>
                </li>
                @endif

                @if(auth()->check() && auth()->user()->isAnggota())
                <li class="sidebar-item {{ Request::is('buku-list') ? 'active' : '' }}">
                    <a href="{{ route('buku.list') }}" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Lihat Katalog Buku</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-title">Akun</li>
                
                {{-- Dark Mode Toggle --}}
                <li class="sidebar-item">
                    <a href="#" id="darkModeToggle" class='sidebar-link dark-mode-toggle' role="button" aria-label="Toggle dark mode">
                        <i class="bi bi-moon-fill"></i>
                        <span>Mode Gelap</span>
                    </a>
                </li>

                @auth
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class='sidebar-link btn btn-link text-decoration-none w-100 text-start'>
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
                @endauth

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>