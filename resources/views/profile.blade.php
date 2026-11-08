@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow w-full">
    <div class="flex items-center gap-4 mb-4">
        <div class="w-14 h-14 rounded-full bg-emerald-100 flex items-center justify-center text-3xl">🌿</div>
        <div>
            <h1 class="text-xl font-bold">Profil</h1>
            <p class="text-gray-600">Username: <strong>{{ $username }}</strong></p>
        </div>
    </div>

    <h2 class="font-judul text-3xl font-bold text-green-800">Tentang web ini:</h2>
    <p class="mt-3 text-lg leading-relaxed text-gray-700">
        Kebun digital kecil untuk mengenal tanaman obat keluarga (TOGA). Mulai dari nama biasa dan nama latin,
        sampai jenis bagian tanaman yang dimanfaatkan, semuanya dirangkum dalam satu tempat yang mudah dijelajahi.
    </p>

    <h2 class="font-judul text-3xl font-bold text-green-800">Cara pakai:</h2>
    <p class="mt-3 text-lg leading-relaxed text-gray-700">
        Buka halaman koleksi, lalu saring tanaman berdasarkan kategori: rimpang, daun, atau batang.
        Daftar tanaman akan langsung menyesuaikan.
    </p>

</div>
@endsection