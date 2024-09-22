<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Berita - Transportation Smart Destination</title>
    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya Umum */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Header */
        .header {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .header .logo {
            display: flex;
            align-items: center;
        }
        .header .logo img {
            height: 50px;
            margin-right: 15px;
        }
        .header h2 {
            color: #fff;
            margin: 0;
            font-weight: 700;
            font-size: 24px;
        }

        /* Navigasi */
        nav {
            margin-left: auto;
        }
        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 8px 12px;
        }
        nav ul li a:hover {
            color: #e74c3c;
        }

        /* Konten */
        .container {
            padding: 100px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 36px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .berita-item {
            background-color: rgba(0, 0, 0, 0.7);
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
        }
        .berita-item h2 {
            margin-top: 0;
            color: #e74c3c;
        }
        .berita-item img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .berita-item p {
            line-height: 1.6;
            color: #fff;
        }

        /* Footer */
        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer-bottom p {
            margin: 0;
            font-size: 14px;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #e74c3c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }
            .berita-item {
                padding: 15px;
            }
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h2>Transportation Smart Destination</h2>
        </div>
        <!-- Navigasi -->
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('berita') }}">Berita</a></li>
                <li><a href="{{ route('pilihan.transportasi') }}">Transportasi</a></li>
                <li><a href="{{ route('diskusi') }}">Diskusi</a></li>
                <li><a href="{{ route('contact.us') }}">Kontak Kami</a></li>
                <!-- Menampilkan "Login" dan "Register" jika diperlukan -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Berita Terbaru</h1>
        <!-- Contoh statis berita -->
        <div class="berita-item">
            <h2>Semakin Laris dan Diminati, Suroboyo Bus Bakal Tambah Rute dan Armada</h2>
            <img src="{{ asset('images/berita1.jpg') }}" alt="Berita 1" style="width: 300px; height: auto;">
            <p>SURABAYA - Jumlah penumpang Suroboyo Bus mengalami kenaikan. Itu berdampak pada rencana penambahan rute. Sekaligus berdampak pada penambahan armada untuk menjangkau pengguna. Kepala Seksi Angkutan Jalan dan Penumpang Dinas Perhubungan (Dishub) Kota Surabaya Ali Mustofa mengatakan, ada rencana perluasan layanan transportasi umum di Surabaya. Bakal ada penambahan rute dan armada. Tapi wacana itu tengah dikaji. "Kami mengajukan permohonan rute baru sekaligus penambahan armada," ujar Ali Mustofa, Jumat (20/9). Pengkajian rute itu berdasarkan kebutuhan penumpang di setiap wilayah. Tujuannya untuk meng-cover pengguna moda transportasi. Sebab, jumlah penumpang terus meningkat. "Masih dipertimbangkan," ucapnya. Ali menyebutkan, jumlah armada Suroboyo Bus sebanyak 28 unit. Rutenya Terminal Osowilangun-Terminal Intermoda Joyoboyo (TIJ), TeminalPurabaya-Pirngadi, Purabaya-Rajawali, hingga Terminal Purabaya-Dukuh. Jam operasional bus itu mulai pukul 05.30 hingga 21.00 setiap harinya. "Sekarang rutenya masih sama dan dijangkau oleh 28 armada," terangnya. Penambahan rute itu bentuk peningkatan pelayanan moda transportasi di Kota Surabaya. Setiap hari, unit Suroboyo Bus berjalan 278 kilometer. Itu sejalan dengan jumlah penumpang yang meningkat hingga 120 ribu penumpang tiap bulan. "Dengan penambahan rute dan armada harapannya semakin mengakomodasi warga di banyak titik," ucap Ali. Sementara itu, pengamat transportasi ITS Machus mengatakan hal senada. Penambahan rute Suroboyo Bus dan armada sangat perlu. Itu sejalan dengan peningkatan sarana prasarana yang memadai. "Harus maksimal, totalitas, dan komitmen," ujarnya. (hil/rek)</p>
        </div>
        <div class="berita-item">
            <h2>Dukung Transportasi Lokal, KA Komuter Bakal Terintegrasi dengan Trans Jatim</h2>
            <img src="{{ asset('images/berita2.jpg') }}" alt="Berita 2" style="width: 300px; height: auto;">
            <p>SURABAYA - Setelah melalui pandemi Covid-19, mobilitas masyarakat menggunakan moda kereta api terus meningkat. Selama satu bulan sedikitnya 1,7 juta orang menggunakan layanan kereta lokal. Bahkan, beberapa stasiun kecil seperti Stasiun Pakis Aji dan Stasiun Purwosari juga mengalami peningkatkan jumlah penumpang secara signifikan. "Sampai saat ini sudah melayani 1.500 penumpang setelah direaktivasi. Artinya, ada peningkatan sekitar 4-5 persen," kata Vice President Corporate Secretary PT KAI Commuter Indonesia (KCI) Anne Purba, Rabu (12/7). Karena itu, menurut dia, PT Kereta Api Indonesia (KAI) akan mengintegrasikan antarmoda transportasi seperti Bus Trans Jatim dengan KA komuter. Mengingat setiap hari 40 ribu orang menggunakan transportasi kereta lokal. "Ada tiga hal yang harus kita lakukan kajian dan persiapan untuk integrasi antarmoda. Yakni integrasi pembayaran, layanan, kemudian fisik. Kita juga melihat halte-halte yang memang potensial untuk integrasi ke stasiun," ungkap Anne Purba. Dia menyebut integrasi komuter dengan Bus Trans Jatim akan dilakukan di beberapa stasiun. Rencananya mulai uji coba pada bulan Agustus mendatang. "Nanti kita coba di beberapa stasiun dulu. Sembari kita melihat potensinya," kata Anne. Sementara itu, KA Komuter Line Dhoho dan KA Penataran melakukan perubahan operasional perjalanan. Anne Purba menjelaskan, KA Komuter Dhoho dan Penataran menambah frekuensi menjadi lima perjalanan pulang-pergi. Sedangkan KA Penataran empat perjalanan pulang-pergi. Ada tiga perjalanan tanpa transit di Stasiun Blitar. "Ini berdasarkan evaluasi kami. Sarana prasarana khususnya lintasan komuter KA Dhoho sudah double track," kata Anne. (rmt/rek)</p>
        </div>
        <!-- Tambahkan lebih banyak berita sesuai kebutuhan -->
    </div>

    <!-- Footer Bawah -->
    <div class="footer-bottom">
        <p>&copy; 2023 Transportation Smart Destination</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Tambahkan Font Awesome untuk ikon media sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
