<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Antarkota Shuttle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a:hover,
        .active {
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

        .logout-btn {
            background-color: #e3342f;
            color: white;
            margin-left: 30px;
            padding: 5px 10px 10px 10px;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #cc1f1a;
            transform: translateY(-2px);
        }

        .logout-btn:active {
            transform: scale(0.95);
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

        footer {
            text-align: center;
            padding: 20px;
            color: white;
            margin-top: 40px;
            background: #1a2533
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header class="navbar" id="hero">
        <div class="logo">Antarkota</div>
        <nav class="nav-links">
            <a href="/">Beranda</a>
            <a href="{{ route('jadwal') }}" class="active">Jadwal</a>
            <a href="{{ route('pesan') }}">Pesan Tiket</a>
            @auth
                <a href="/profile">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @endauth
        </nav>
    </header>

    <div class="container my-5">
        <h1 class="mb-4">Daftar Jadwal</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($jadwals as $jadwal)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $jadwal->nama }}</h5>
                            <p class="card-text">
                                <strong>Tanggal:</strong>
                                {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}<br>
                                <strong>Jam:</strong> {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('H:i') }}<br>
                                <strong>Rute:</strong> {{ $jadwal->rute }}<br>
                                <strong>Harga:</strong> Rp{{ number_format($jadwal->harga, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('detail', $jadwal->id) }}" class="btn btn-primary">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">Belum ada jadwal tersedia.</div>
                </div>
            @endforelse
        </div>
    </div>

    <section class="cta">
        <div class="container"data-aos="fade-up">
            <h2>Siap untuk Bepergian?</h2>
            <p>Pesan tiket kamu sekarang juga dan rasakan pengalaman terbaik bersama Antarkota.</p>
            <a href="#hero" class="btn-utama">Mulai Pesan</a>
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
