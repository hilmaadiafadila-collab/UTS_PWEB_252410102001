# TogaKu

Katalog web sederhana untuk mengenal tanaman obat keluarga (TOGA), dibuat dengan Laravel untuk UTS Pemrograman Web. Web ini tidak memakai database tetapi data berupa array di Controller, lalu ditampilkan lewat Blade.

## Tentang TogaKu
TogaKu adalah kebun digital kecil yang merangkum tanaman obat keluarga dalam satu tempat. Setiap tanaman ditampilkan dengan nama, nama latin, kategori bagian tanaman (rimpang, daun, atau batang), dan kegunaan umumnya secara tradisional.

Pengguna masuk dengan username, melihat ringkasan di Dashboard, membaca penjelasan di Profil, lalu menjelajahi daftar tanaman di halaman Koleksi (route `pengelolaan`). Di halaman ini tanaman bisa dicari berdasarkan nama dan disaring berdasarkan kategori.

## Alur Web
Login → Dashboard → Profil → Koleksi

| Halaman | Route | Fungsi |
|---|---|---|
| Login | `/` | Form username (tanpa password) |
| Dashboard | `/dashboard` | Sapaan, total tanaman, total kategori, tanaman pilihan |
| Profil | `/profile` | Menampilkan username dan penjelasan web |
| Koleksi | `/pengelolaan` | Daftar tanaman, pencarian, dan filter kategori |

## Fitur
- Username dibawa antarhalaman lewat request parameter (`?username=...`)
- Data tanaman dikirim dari Controller ke View, lalu ditampilkan dengan `@foreach` dan `@forelse`
- Pencarian tanaman berdasarkan nama atau nama latin (`?q=...`), tidak peka huruf besar-kecil
- Filter kategori lewat query string (`?kategori=...`), daftar kategori diturunkan otomatis dari data
- Pencarian dan filter bisa dipakai bersamaan, dan username tetap terbawa
- Pesan khusus saat hasil pencarian atau filter kosong
- Validasi form login (username wajib diisi, maksimal 30 karakter)
- Tampilan responsif untuk HP dan desktop
- Efek hover pada kartu tanaman

## Request Parameter
| Parameter | Dibaca di | Fungsi |
|---|---|---|
| `username` | Dashboard, Profil, Koleksi | Menampilkan nama pengguna dan menjaganya antarhalaman |
| `kategori` | Koleksi | Menyaring tanaman berdasarkan kategori |
| `q` | Koleksi | Mencari tanaman berdasarkan nama atau nama latin |

Contoh: `/pengelolaan?username=budi&kategori=Daun&q=sirih`

## Tools yang digunakan:
- Laravel [isi versi, cek dengan `php artisan --version`]
- PHP [isi versi, cek dengan `php -v`]
- Blade Templating
- Tailwind CSS (via CDN)
- Google Fonts (Playfair Display dan Nunito)

## Struktur File
```
routes/web.php
app/Http/Controllers/PageController.php
resources/views/
├── layouts/app.blade.php
├── partials/head.blade.php
├── components/
│   ├── navbar.blade.php
│   └── footer.blade.php
├── login.blade.php
├── dashboard.blade.php
├── profile.blade.php
└── pengelolaan.blade.php
public/images/        (gambar tanaman)
```

## Penerapan Blade
| Fitur Blade | Lokasi |
|---|---|
| `@extends` | Semua view (memakai `layouts.app`) |
| `@section` / `@endsection` | Semua view |
| `@yield` | `layouts/app.blade.php` |
| `@include` | `layouts/app.blade.php` (memuat `partials.head`) |
| `<x-navbar />` dan `<x-footer />` | `layouts/app.blade.php` |
| `@foreach` dan `@forelse` | `dashboard.blade.php`, `pengelolaan.blade.php` |

## Cara Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/hilmaadiafadila-collab/UTS_PWEB_252410102001.git
   cd UTS_PWEB_252410102001
   ```
2. Install dependensi:
   ```bash
   composer install
   ```
3. Siapkan environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Jalankan server:
   ```bash
   php artisan serve
   ```
5. Buka `http://127.0.0.1:8000`.

## Screenshot

### Login


![Login]
<img width="1365" height="714" alt="login" src="https://github.com/user-attachments/assets/9f2be576-46d7-443f-9e35-43cfffddc458" />



### Dashboard


![Dashboard]
<img width="1365" height="721" alt="Dashboard" src="https://github.com/user-attachments/assets/6a95ed73-1a85-47ec-92c8-09da2155252c" />




### Profil


![Profil]
<img width="1365" height="721" alt="profil" src="https://github.com/user-attachments/assets/030d2f13-84ae-4c04-b52f-d7d23513c2cc" />



### Koleksi


![Koleksi]
<img width="1365" height="719" alt="koleksi" src="https://github.com/user-attachments/assets/a8fe4ce5-da96-476f-bac8-faff5252b41d" />



### Koleksi dengan pencarian dan filter


![Pencarian]
<img width="1365" height="682" alt="pencarian" src="https://github.com/user-attachments/assets/3eaac007-e28c-4553-93ff-72c76dd7f3d6" />

<img width="1365" height="681" alt="kategori" src="https://github.com/user-attachments/assets/a3147f70-87c1-4700-a333-7e283bb152e5" />


## Catatan
Informasi tanaman bersifat umum dan bukan pengganti saran dokter atau tenaga kesehatan.
