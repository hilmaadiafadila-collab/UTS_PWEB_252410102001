@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="font-judul text-4xl font-bold text-green-800">Halo, {{ $username }}!</h1>
    <p class="mt-3 text-lg leading-relaxed text-gray-700">
    Selamat datang di kebun digital TOGA, tempat kamu mengenal tanaman obat keluarga yang mungkin selama ini
    tumbuh diam-diam di pekarangan rumah atau terselip di dapur nenek. Dari rimpang yang harum, daun yang
    segar, sampai batang yang wangi, setiap tanaman punya cerita dan kegunaan tradisionalnya sendiri.
    </p>
    <p class="mt-3 text-lg leading-relaxed text-gray-700">
        Jelajahi koleksinya di halaman Pengelolaan, saring berdasarkan kategori, lalu kenali nama latin dan
        kegunaan umumnya. Siapa tahu, setelah ini kamu jadi ingin menanam satu di rumah. Selamat menjelajah!
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Total Tanaman</p>
            <p class="text-3xl font-bold">{{ $totalTanaman }}</p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Total Kategori</p>
            <p class="text-3xl font-bold">{{ $totalKategori }}</p>
        </div>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="bg-green-700 text-white p-5 rounded-2xl shadow">
            Lihat Koleksi →
        </a>
    </div>

    <div class="mt-8">
        <h2 class="font-judul text-2xl font-bold text-green-800 mb-3">Tanaman Pilihan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($pilihanTanaman as $t)
                <div class="bg-white rounded-2xl shadow overflow-hidden">
                    <img src="{{ asset('images/' . $t['gambar']) }}" alt="{{ $t['nama'] }}"
                        class="w-full h-36 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold">{{ $t['nama'] }}</h3>
                        <p class="text-xs italic text-gray-500">{{ $t['latin'] }}</p>
                        <p class="mt-2 text-sm">{{ $t['manfaat'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection