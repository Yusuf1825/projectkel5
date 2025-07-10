<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🧾 Project Laravel Kelompok – Aplikasi Antarkota

Antarkota adalah aplikasi web berbasis Laravel yang dirancang untuk memudahkan proses pemesanan tiket kereta antar kota secara online. Aplikasi ini dilengkapi dengan autentikasi pengguna menggunakan Laravel Breeze dan sistem manajemen admin yang powerful menggunakan Filament. Pengguna dapat melihat jadwal keberangkatan, melihat detail rute, dan melakukan pemesanan tiket secara langsung, sementara admin dapat mengelola data jadwal, pemesanan, dan pengguna dengan mudah melalui dashboard Filament.

---

## 🛠️ Tool Requirements

Sebelum menjalankan proyek ini, pastikan sistem kamu telah memiliki:

| Tool            | Minimum Version | Keterangan                         |
| --------------- | --------------- | ---------------------------------- |
| PHP             | 8.2             | Laravel 12 membutuhkan PHP ≥ 8.1   |
| Composer        | 2.x             | Untuk mengelola dependency Laravel |
| Node.js & NPM   | Node 18 / NPM 9 | Untuk menjalankan Vite             |
| MySQL / MariaDB | 5.7+ / 10.2+    | Untuk menyimpan data aplikasi      |
| Git             | Latest          | Untuk clone dan push repository    |

---

## 👥 Pembagian Tugas

| Nama Anggota           | Fitur yang Dikerjakan                                                               |
| ---------------------- | ----------------------------------------------------------------------------------- |
| Dede Yusup Supriadi    | Setup kerangka Laravel                                                              |
| Ichwan Susilo Nugroho  | Fitur autentikasi (login & register)                                                |
| Anisa Prima Ismawati   | CRUD Produk (tambah, edit, hapus, lihat), upload gambar ke storage, DataTables Ajax |
| Neisya Luthfia Nuraini | Dashboard admin dan user, pembatasan akses halaman berdasarkan role pengguna        |

---

## ⚙️ Cara Install & Menjalankan Proyek

### 1. Clone Repository

Buka software **GIT** lalu jalankan perintah berikut:

```bash
git clone https://github.com/Yusuf1825/projectkel5.git

cd projectkel5
```

### 2. Install Dependency Laravel

```bash
composer install
npm install
```

### 3. Copy File .env & Generate App Key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Atur Konfigurasi Database

Buat database dengan nama `db_antarkota` menggunakan **XAMPP** atau semacamnya. Buka folder project yang sudah diclone, cari file yang namanya **.env** lalu edit bagian dibawah ini:

```bash
DB_CONNECTION=mysql
DB_DATABASE=db_antarkota
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Jalankan Migrasi

Buka kembali software **GIT** lalu jalankan perintah berikut:

```bash
php artisan migrate
php artisan db:seed --class=RoleSeeder
```

### 6. Link Storage (untuk menampilkan gambar)

```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

### 8. Buka Terminal Baru

```bash
npm run dev
```

Buka di browser: http://127.0.0.1:8000

## 🔐 Role Akses

| Role  | Keterangan                                                     |
| ----- | -------------------------------------------------------------- |
| admin | akses penuh (halaman depan, dashboard)                         |
| user  | hanya bisa melihat halaman depan dan melakukan pemesanan tiket |
