<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();

        $projects = [
            [
                'name' => 'LPKIA Official Website',
                'url' => 'https://lpkia.ac.id/',
                'screenshot' => 'lpkia.png',
                'brief' => 'Landing page utama Institut Digital Ekonomi LPKIA. Menyajikan informasi profil kampus, program studi, pendaftaran mahasiswa baru (PMB), berita terkini, dan pengumuman resmi. Diemas mengelola ketersediaan server Linux, melakukan update modul CMS, dan mengoptimalkan performa load page agar tetap responsif bagi calon pendaftar.',
                'category' => 'Official Portal',
            ],
            [
                'name' => 'HERA LPKIA (Sistem Informasi Akademik)',
                'url' => 'https://hera.lpkia.ac.id/',
                'screenshot' => 'hera.png',
                'brief' => 'Sistem Informasi Akademik terintegrasi (HERA) yang digunakan oleh seluruh sivitas akademika LPKIA. Menampung proses kartu rencana studi (KRS), jadwal perkuliahan, hingga penginputan dan pemantauan nilai mahasiswa secara real-time. Diemas mengawal deployment backend PHP/Laravel, pemeliharaan basis data MySQL, instalasi sertifikat SSL, dan monitoring server dengan Nginx.',
                'category' => 'Web Application',
            ],
            [
                'name' => 'e-Proposal LPKIA',
                'url' => 'https://eproposal.lpkia.ac.id/',
                'screenshot' => 'eproposal.png',
                'brief' => 'Sistem pengajuan proposal tugas akhir/skripsi dan penelitian bagi mahasiswa serta dosen LPKIA. Memfasilitasi alur pengajuan secara digital mulai dari draf awal, persetujuan pembimbing, hingga review dari penguji. Diemas bertanggung jawab atas deployment repositori Git, konfigurasi routing domain, serta pemantauan logs server.',
                'category' => 'Web Application',
            ],
            [
                'name' => 'Participant LPKIA',
                'url' => 'https://participant.lpkia.ac.id/',
                'screenshot' => 'participant.png',
                'brief' => 'Portal pendaftaran dan pengelolaan peserta untuk berbagai kegiatan eksternal maupun internal kampus, seperti seminar, sertifikasi kompetensi, dan program pelatihan. Diemas mengelola orkestrasi web server (Apache/Nginx) untuk mengantisipasi lonjakan trafik saat pendaftaran dibuka.',
                'category' => 'Registration Portal',
            ],
            [
                'name' => 'Career Development Center (CDC) LPKIA',
                'url' => 'https://cdc.lpkia.ac.id/',
                'screenshot' => 'cdc.png',
                'brief' => 'Portal karir resmi LPKIA yang menghubungkan alumni dengan perusahaan mitra. Menyediakan fitur info lowongan kerja, pengelolaan CV online, penjadwalan interview, serta kuesioner tracer study kelulusan. Diemas mengurus deployment aplikasi, integrasi database lowongan, dan IT support berkala.',
                'category' => 'Job & Career Portal',
            ],
            [
                'name' => 'Event Hub LPKIA',
                'url' => 'https://event.lpkia.ac.id/',
                'screenshot' => 'event.png',
                'brief' => 'Platform khusus untuk manajemen penyelenggaraan event kampus LPKIA, mencakup promosi acara, reservasi tiket digital, hingga check-in peserta menggunakan scan QR code. Diemas merawat backend PHP/Laravel dan memastikan integrasi database MySQL berjalan stabil selama event berlangsung.',
                'category' => 'Event Management System',
            ],
            [
                'name' => 'SARPRAS LPKIA (Sistem Sarana & Prasarana)',
                'url' => 'https://sarpras.lpkia.ac.id/',
                'screenshot' => 'sarpras.png',
                'brief' => 'Sistem pengelolaan aset, inventaris sarana kampus, dan pengajuan pemeliharaan fasilitas di Institut Digital Ekonomi LPKIA. Membantu tim sarpras mencatat kondisi ruang dan barang secara digital. Diemas bertugas mengawasi konfigurasi database, deployment source code, dan pemeliharaan server secara berkala.',
                'category' => 'Inventory Management',
            ],
            [
                'name' => 'Informatika LPKIA',
                'url' => 'https://informatika.lpkia.ac.id/',
                'screenshot' => 'informatika.png',
                'brief' => 'Situs profil program studi Teknik Informatika S1 LPKIA. Berisi seputar kurikulum prodi, daftar dosen, prestasi mahasiswa, dan bidang minat riset. Diemas memelihara deployment website ini menggunakan Nginx dan memberikan IT support teknis terkait pembaruan informasi konten prodi.',
                'category' => 'Department Website',
            ],
            [
                'name' => 'Administrasi Bisnis LPKIA',
                'url' => 'http://administrasibisnis.lpkia.ac.id/',
                'screenshot' => 'administrasibisnis.png',
                'brief' => 'Situs profil program studi Administrasi Bisnis LPKIA. Berfungsi sebagai media komunikasi publik mengenai program magang, karir lulusan, dan akreditasi prodi. Diemas bertanggung jawab penuh atas konfigurasi hosting server, deploy web, dan optimasi load-balancing dasar.',
                'category' => 'Department Website',
            ],
            [
                'name' => 'Sistem Informasi LPKIA',
                'url' => 'https://sisteminformasi.lpkia.ac.id/',
                'screenshot' => 'sisteminformasi.png',
                'brief' => 'Portal profil program studi Sistem Informasi LPKIA yang menyajikan prospek kerja lulusan, mata kuliah unggulan seperti Data Science/ERP, dan kegiatan himpunan mahasiswa. Diemas menangani deployment web application pada server Linux dan instalasi sertifikat keamanan SSL/HTTPS.',
                'category' => 'Department Website',
            ],
            [
                'name' => 'Portal Orang Tua (POT) LPKIA',
                'url' => 'https://pot.lpkia.ac.id/',
                'screenshot' => 'pot.png',
                'brief' => 'Aplikasi Portal Orang Tua untuk memantau kemajuan studi putra-putrinya secara langsung, termasuk perolehan nilai, kehadiran kelas, dan tagihan biaya kuliah (registrasi). Diemas memelihara kelancaran deployment web dan sinkronisasi database MySQL dengan core system HERA.',
                'category' => 'Parent Monitoring System',
            ],
            [
                'name' => 'LUB Siswa LPKIA (Layanan Keuangan & Beasiswa)',
                'url' => 'https://lubsiswa.lpkia.ac.id/',
                'screenshot' => 'lubsiswa.png',
                'brief' => 'Layanan administrasi keuangan kuliah dan pengajuan beasiswa bagi mahasiswa aktif. Memudahkan validasi pembayaran dan pendaftaran berbagai program beasiswa prestasi maupun bantuan. Diemas bertanggung jawab atas deployment sistem, pengawasan log transaksi beasiswa, dan perlindungan integritas database keuangan.',
                'category' => 'Financial & Scholarship Portal',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
