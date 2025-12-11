<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/mazer/images/logo/logo.svg') }}" alt="Logo" srcset="">
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

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>