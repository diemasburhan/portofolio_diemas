<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Optimization -->
    <title>@yield('title', 'Diemas Burhan Septian | Portofolio Linux Deploy & PHP Laravel Developer')</title>
    <meta name="description" content="Portofolio Profesional Diemas Burhan Septian. Ahli dalam Linux Deployment, Web Programming (PHP, MySQL, CSS), Laravel Framework, Docker, Nginx/Apache, Wordpress, dan IT Support. Lulusan Institut Digital Ekonomi LPKIA.">
    <meta name="keywords" content="Diemas Burhan Septian, LPKIA, Portofolio, Linux Deploy, PHP, Laravel, MySQL, Docker, Nginx, IT Support, Indonesia">
    <meta name="author" content="Diemas Burhan Septian">

    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Global Nav -->
    <nav class="global-nav" id="global-nav">
        <div class="global-nav-container">
            <a href="#" class="global-nav-brand">Diemas Burhan Septian</a>
            <ul class="global-nav-menu">
                <li><a href="#hero">Mulai</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#skills">Keahlian</a></li>
                <li><a href="#projects">Portofolio</a></li>
                <li><a href="#contact">Hubungi</a></li>
            </ul>
            <div style="width: 10px;"></div> <!-- Placeholder to balance flex layout on desktop -->
        </div>
    </nav>

    <!-- Sub Nav -->
    <nav class="sub-nav" id="sub-nav">
        <div class="sub-nav-container">
            <span class="sub-nav-title" style="display: flex; align-items: center;">
                <img src="{{ asset('images/logo_dbs.png') }}" alt="DBS Logo" style="height: 24px; width: auto; object-fit: contain;">
            </span>
            <div class="sub-nav-links">
                <a href="#about">Profil</a>
                <a href="#skills">Teknologi</a>
                <a href="#projects">Aplikasi Web</a>
                <a href="#contact" class="btn-primary" style="padding: 6px 14px; font-size: 13px;">Hubungi</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>Pendidikan</h4>
                    <ul>
                        <li><span class="dense-link" style="color:var(--color-ink)">Institut Digital Ekonomi LPKIA</span></li>
                        <li>S1 Teknik Informatika</li>
                        <li>IPK: 3.58 (Lulus)</li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Aplikasi Akademik</h4>
                    <ul>
                        <li><a href="https://hera.lpkia.ac.id/" target="_blank">HERA LPKIA</a></li>
                        <li><a href="https://eproposal.lpkia.ac.id/" target="_blank">e-Proposal</a></li>
                        <li><a href="https://pot.lpkia.ac.id/" target="_blank">Portal Orang Tua</a></li>
                        <li><a href="https://lubsiswa.lpkia.ac.id/" target="_blank">LUB Siswa</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Web Akademik & CDC</h4>
                    <ul>
                        <li><a href="https://lpkia.ac.id/" target="_blank">LPKIA Official Portal</a></li>
                        <li><a href="https://participant.lpkia.ac.id/" target="_blank">Participant System</a></li>
                        <li><a href="https://cdc.lpkia.ac.id/" target="_blank">Career Center (CDC)</a></li>
                        <li><a href="https://event.lpkia.ac.id/" target="_blank">Event Hub</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Fakultas & Prodi</h4>
                    <ul>
                        <li><a href="https://informatika.lpkia.ac.id/" target="_blank">Prodi Informatika</a></li>
                        <li><a href="http://administrasibisnis.lpkia.ac.id/" target="_blank">Prodi Adm. Bisnis</a></li>
                        <li><a href="https://sisteminformasi.lpkia.ac.id/" target="_blank">Prodi Sist. Informasi</a></li>
                        <li><a href="https://sarpras.lpkia.ac.id/" target="_blank">Sistem Sarpras</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-legal">
                <span>Hak Cipta &copy; {{ date('Y') }} Diemas Burhan Septian. Semua Hak Dilindungi.</span>
                <span>Terinspirasi oleh Desain Apple &bull; Dibuat dengan Laravel & MySQL</span>
            </div>
        </div>
    </footer>

    <!-- Toast Notification if any -->
    @if(session('success'))
        <div class="alert-toast" id="alert-toast">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('alert-toast');
                if (toast) {
                    toast.style.transition = 'opacity 0.5s ease';
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 4000);
        </script>
    @endif

    @yield('scripts')
</body>
</html>
