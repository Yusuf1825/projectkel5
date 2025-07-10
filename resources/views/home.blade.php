<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Antarkota Shuttle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #111827;
            color: white;
        }

        section {
            border-top: 1px solid #334155;
        }

        .navbar,
        footer {
            background: #0f172a;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 99;
        }

        .navbar {
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            background: #f97316;
        }

        .nav-links a {
            color: white;
            margin-left: 30px;
            padding: 5px 10px 10px 10px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .hero {
            background: url('{{ asset('images/bg.jpg') }}') no-repeat center center/cover;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: white;
        }

        .hero-overlay {
            width: 100%;
            padding-left: 80px;
            background: rgba(0, 0, 0, 0.4);
            height: 100%;
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .btn-utama {
            padding: 14px 28px;
            background: #f97316;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
        }

        .menu-layanan {
            position: relative;
            top: -40px;
            z-index: 10;
            background: #0f172a;
            max-width: 1100px;
            margin: 0 auto;
            border-radius: 12px;
            padding: 20px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            border: 1px solid #1f2633;
        }

        .search-section-wrapper {
            background-color: #0f172a;
            /* atau warna yang kamu mau */
        }

        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-end;
            justify-content: space-between;
        }

        .search-field {
            flex: 1 1 20%;
            display: flex;
            flex-direction: column;
        }

        .search-field label {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #f97316;
        }

        .search-field input,
        .search-field select {
            padding: 10px;
            border: 1px solid #2b3549;
            background: #0f172a;
            color: white;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-cari {
            background: #f97316;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .menu-layanan {
            background-color: #0f172a;
            padding: 60px 30px 50px;
            text-align: center;
        }

        .layanan {
            background-color: #1a2533;
            padding: 60px 30px 50px;
            text-align: center;
        }

        .mengapa {
            background-color: #0f172a;
            padding: 60px 30px 50px;
            text-align: center;
        }

        .testimoni {
            background-color: #1a2533;
            padding: 60px 30px 50px;
            text-align: center;
        }

        .cta {
            background-color: #0f172a;
            padding: 60px 30px 50px;
            text-align: center;
        }

        .menu-layanan h2,
        .layanan h2,
        .mengapa h2,
        .testimoni h2,
        .cta h2 {
            font-size: 28px;
            margin-bottom: 30px;
            color: white;
        }

        .icon-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        .icon-item {
            width: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .icon-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #334155;
            padding: 10px;
            margin-bottom: 8px;
            transition: background 0.3s;
        }

        .icon-item:hover img {
            background: #475569;
        }

        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: #1e293b;
            padding: 20px;
            border-radius: 12px;
            width: 280px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            color: white;
        }

        .card h3 {
            margin-top: 0;
            font-size: 20px;
            color: #facc15;
        }

        .card p {
            font-size: 16px;
        }

        .testimoni .card p {
            font-style: italic;
        }

        .testimoni .card strong {
            display: block;
            margin-top: 10px;
            color: #facc15;
        }

        .cta p {
            font-size: 18px;
            margin: 10px 0 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: white;
            margin-top: 40px;
            background: #1a2533
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header class="navbar" id="hero">
        <div class="logo">Antarkota</div>
        <nav class="nav-links">
            <a href="/">Beranda</a>
            <a href="{{ route('jadwal') }}">Jadwal</a>
            <a href="{{ route('pesan') }}">Pesan Tiket</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-overlay">
            <div class="hero-content"data-aos="fade-up">
                <h1>Temukan Perjalanan Terbaikmu</h1>
                <p>Antarkota hadir untuk menghubungkan kota-kota favoritmu dengan mudah dan cepat.</p>
                @guest
                    <a href="{{ route('login') }}" class="btn-utama">Login</a>
                @endguest

                @auth
                    <a href="{{ route('pesan') }}" class="btn-utama">Pesan Tiket</a>
                @endauth

            </div>
        </div>
    </section>

    <section class="menu-layanan">
        <div class="container"data-aos="fade-up">
            <h2>Tujuan Populer</h2>
            <div class="icon-grid">
                <a href="{{ route('layanan.purwakarta') }}" class="icon-item">
                    <img src="{{ asset('images/bg.jpg') }}" alt="purwakarta">
                    <span>Purwakarta</span>
                </a>
                <a href="{{ route('layanan.bandung') }}" class="icon-item">
                    <img src="{{ asset('images/bg.jpg') }}" alt="bandung">
                    <span>Bandung</span>
                </a>
                <a href="{{ route('layanan.jakarta') }}" class="icon-item">
                    <img src="{{ asset('images/bg.jpg') }}" alt="jakarta">
                    <span>Jakarta</span>
                </a>
            </div>
        </div>
    </section>

    <section class="layanan">
        <div class="container"data-aos="fade-up">
            <h2>Layanan Kami</h2>
            <div class="card-container">
                <div class="card">
                    <h3>Pemesanan Mudah</h3>
                    <p>Pesan tiket kapan saja secara online tanpa antre.</p>
                </div>
                <div class="card">
                    <h3>Jadwal Lengkap</h3>
                    <p>Lihat dan bandingkan jadwal perjalanan dengan mudah.</p>
                </div>
                <div class="card">
                    <h3>Dukungan 24/7</h3>
                    <p>Tim kami siap membantu kamu setiap saat.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mengapa">
        <div class="container"data-aos="fade-up">
            <h2>Mengapa Memilih Antarkota?</h2>
            <div class="card-container">
                <div class="card">
                    <h3>Harga Terjangkau</h3>
                    <p>Kami menawarkan tarif kompetitif untuk semua rute perjalanan.</p>
                </div>
                <div class="card">
                    <h3>Kemudahan Akses</h3>
                    <p>Aplikasi ramah pengguna, bisa diakses dari mana saja.</p>
                </div>
                <div class="card">
                    <h3>Keamanan Terjamin</h3>
                    <p>Setiap perjalanan dilengkapi protokol keamanan terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimoni">
        <div class="container"data-aos="fade-up">
            <h2>Kata Mereka tentang Antarkota</h2>
            <div class="card-container">
                <div class="card">
                    <p>"Sangat mudah digunakan, dan perjalanan saya sangat nyaman!"</p>
                    <strong>- Anonim</strong>
                </div>
                <div class="card">
                    <p>"Tepat waktu dan sopirnya ramah. Rekomendasi banget!"</p>
                    <strong>- Anonim</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container"data-aos="fade-up">
            <h2>Siap untuk Bepergian?</h2>
            <p>Pesan tiket kamu sekarang juga dan rasakan pengalaman terbaik bersama Antarkota.</p>
            <a href="{{ route('pesan') }}" class="btn-utama">Mulai Pesan</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Antarkota. All rights reserved.</p>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
