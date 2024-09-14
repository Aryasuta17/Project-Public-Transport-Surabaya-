@extends('layout')

@section('title', 'Portfolio')

@section('content')
<section class="hero">
    <h2>My Portfolio</h2>
</section>

<div class="portfolio-grid">
    <div class="portfolio-box">
        <h2>Project Experience</h2>
        <h3>Aplikasi Pencatatan Pelanggaran Siswa</h3>
        <p>(Februari 2023 – Maret 2023)</p>
        <ul>
            <li>Proyek yang terpilih dengan nilai terbaik dalam mata kuliah pengantar pemrograman.</li>
        </ul>
    </div>

    <div class="portfolio-box">
        <h2>Achievements</h2>
        <h3>World Youth Invention & Innovation Award</h3>
        <p>(September 2021)</p>
        <ul>
            <li>Penghargaan Bronze Medal dalam kompetisi inovasi internasional.</li>
        </ul>
    </div>
</div>
@endsection
