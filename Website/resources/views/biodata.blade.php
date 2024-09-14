@extends('layout')

@section('title', 'About Me')

@section('content')
<section class="hero">
    <h2 class="centered">About Me</h2>

    <div class="biodata-grid">
        <!-- Personal Information -->
        <div class="biodata-box">
            <h3>Personal Information</h3>
            <p><strong>Name:</strong> Putu Aryasuta Tirta</p>
            <p><strong>Location:</strong> Surabaya, Jawa Timur</p>
            <p><strong>Email:</strong> <a href="mailto:putu.aryasuta.tirta-2022@ftmm.unair.ac.id">putu.aryasuta.tirta-2022@ftmm.unair.ac.id</a></p>
            <p><strong>Phone:</strong> +6287782371009</p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com/aryaaasutaa" target="_blank">@aryaaasutaa</a></p>
        </div>

        <!-- Skills -->
        <div class="biodata-box">
            <h3>Skills</h3>
            <p><strong>Hard Skills:</strong> Microsoft Excel, Microsoft Word, Microsoft Power Point, Canva, Coding.</p>
            <p><strong>Soft Skills:</strong> Kerja Sama, Kepemimpinan, Berfikir Kritis, Manajemen Waktu, Mudah Beradaptasi, Kolaboratif, Disiplin, Kepedulian Akan Sesama.</p>
        </div>

        <!-- Education -->
        <div class="biodata-box">
            <h3>Education</h3>
            <p><strong>SMAS Taman Rama Denpasar – Bali</strong> (2019-2022)</p>
            <ul>
                <li>Lulus dengan nilai di atas rata-rata</li>
                <li>Koordinator OSIS Bidang Pendidikan Bela Negara</li>
                <li>Ketua House</li>
            </ul>
            <p><strong>Universitas Airlangga – Surabaya</strong> (2022 - Sekarang)</p>
            <ul>
                <li>Mempelajari Statistika</li>
                <li>Memahami bahasa pemrograman Python</li>
                <li>Mempelajari penggunaan R-Studio</li>
            </ul>
        </div>

        <!-- Organizational Experience -->
        <div class="biodata-box">
            <h3>Organizational Experience</h3>
            <p><strong>Dirjen PITRM KERISTEK</strong> | BEM FTMM Universitas Airlangga (Maret 2023 – Desember 2023)</p>
            <p><strong>Ketua</strong> | Himpunan Mahasiswa Teknologi Sains Data (Januari 2024 – Sekarang)</p>
        </div>

        <!-- Project Experience -->
        <div class="biodata-box">
            <h3>Project Experience</h3>
            <p><strong>Aplikasi Pencatatan Pelanggaran Siswa</strong> (Februari 2023 – Maret 2023)</p>
            <ul>
                <li>Proyek yang terpilih dengan nilai terbaik dalam mata kuliah pengantar pemrograman.</li>
            </ul>
        </div>

        <!-- Achievements -->
        <div class="biodata-box">
            <h3>Achievements</h3>
            <p><strong>World Youth Invention & Innovation Award</strong> (September 2021)</p>
            <ul>
                <li>Penghargaan Bronze Medal dalam kompetisi inovasi internasional.</li>
            </ul>
        </div>
    </div>
</section>
@endsection
