<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Mode Transportasi - Transportation Smart Destination</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
        }

        .navbar-title {
            color: #ecf0f1;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
        }

        .nav-links a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background-color: #34495e;
            transform: translateY(-2px);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 70px);
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .content::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(52, 152, 219, 0.1) 0%, rgba(255,255,255,0) 70%);
            animation: rotate 20s linear infinite;
        }

        .content-box {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            animation: fadeInUp 1s ease-out, float 6s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        /* Animasi untuk tulisan */
        .welcome-message {
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2c3e50;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typeWriter 2s steps(40) 1s forwards;
        }

        .sub-message {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #7f8c8d;
            opacity: 0;
            animation: fadeIn 1s ease-out 3s forwards;
        }

        /* Styling tombol menjadi kotak lebih besar */
        .cta-button {
            background-color: #3498db;
            color: white;
            padding: 20px 40px; /* Membuat kotak lebih besar */
            border: none;
            border-radius: 10px; /* Membuat sudut kotak */
            font-size: 1.5em; /* Ukuran font lebih besar */
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            opacity: 0; /* Mulai dari opacity 0 agar tidak terlihat */
            text-align: center;
            display: inline-block;
            text-decoration: none;
            animation: fadeInButton 1s ease-out forwards; /* Animasi fade-in untuk tombol */
            animation-delay: 4.5s; /* Tombol muncul setelah animasi teks selesai */
        }

        .cta-button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }


        .icon-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 30px;
        }

        .icon {
            font-size: 2.5em;
            margin: 0 20px;
            transition: all 0.3s ease;
            color: #3498db;
            opacity: 0;
            animation: bounceIn 0.5s ease-out forwards;
        }

        .icon:nth-child(1) { animation-delay: 4s; }
        .icon:nth-child(2) { animation-delay: 4.2s; }
        .icon:nth-child(3) { animation-delay: 4.4s; }

        .icon:hover {
            transform: scale(1.2) rotate(10deg);
            color: #2980b9;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Animasi munculnya tulisan */
        @keyframes typeWriter {
            to { width: 100%; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Animasi untuk tombol */
        @keyframes fadeInButton {
            from { opacity: 0; }
            to { opacity: 1; }
        }


        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes popIn {
            0% { transform: scale(0); }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="navbar">
        <div style="display: flex; align-items: center;">
            <div class="logo">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination" style="height: 50px;">
                </a>
            </div>
            <div class="navbar-title" style="color: #ecf0f1; font-size: 24px; font-weight: bold;">Transportation Smart Destination</div>
        </div>
        <div class="nav-links">
            <a href="{{ route('user.home') }}">Beranda</a>
            <a href="{{ route('search.route') }}">Mulai Perjalanan</a>
            <a href="{{ route('welcome') }}">Logout</a>
        </div>
    </div>

    <div class="content">
        <div class="content-box">
            <div class="welcome-message">Selamat Datang di TSD!</div>
            <div class="sub-message">Anda berhasil login. Siap untuk memulai perjalanan cerdas Anda?</div>
            <a href="{{ route('search.route') }}" class="cta-button">Mulai Perjalanan Anda</a>
            <div class="icon-container">
                <i class="fas fa-bus icon"></i>
                <i class="fas fa-train icon"></i>
                <i class="fas fa-taxi icon"></i>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: #333; color: white; text-align: center; padding: 20px; margin-top: 20px;">
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>
