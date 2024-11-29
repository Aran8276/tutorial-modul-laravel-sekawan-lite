@if ($level == 'admin')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ route('dashboardAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('bukuAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        Buku
                    </a>
                    <a class="nav-link" href="{{ route('kategoriAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        Kategori Buku
                    </a>
                    <a class="nav-link" href="{{ route('rakAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        Rak Buku
                    </a>
                    <a class="nav-link" href="{{ route('penulisAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-pencil"></i>
                        </div>
                        Penulis
                    </a>
                    <a class="nav-link" href="{{ route('penerbitAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-house"></i>
                        </div>
                        Penerbit
                    </a>
                    <a class="nav-link" href="{{ route('peminjamanAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-hand"></i>
                        </div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="{{ route('pengaturanAdmin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-gear"></i>
                        </div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href={{ route('login') }}>
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-right-from-bracket"></i>
                        </div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Admin Perpustakaan
            </div>
        </nav>
    </div>
@else
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ route('dashboardSiswa') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('bukuSiswa') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        Buku
                    </a>
                    <a class="nav-link" href="{{ route('peminjamanSiswa') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-clipboard"></i>
                        </div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="{{ route('pengaturanSiswa') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-gear"></i>
                        </div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="{{ route('login') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-right-from-bracket"></i>
                        </div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Siswa
            </div>
        </nav>
    </div>
@endif
