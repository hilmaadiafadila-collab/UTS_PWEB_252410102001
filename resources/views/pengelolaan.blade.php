@extends('layouts.app')

@section('title', 'Koleksi Tanaman')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Koleksi Tanaman Toga</h1>

    {{-- Pencarian --}}
    <form action="{{ route('pengelolaan') }}" method="GET" class="flex gap-2 mb-4">
        <input type="hidden" name="username" value="{{ $username }}">
        @if ($kategoriAktif)
            <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
        @endif
        <input type="text" name="q" value="{{ $cari }}" placeholder="Cari nama tanaman..."
            class="flex-1 border border-green-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white rounded-xl px-4 py-2 transition">
            Cari
        </button>
    </form>

    {{-- Filter kategori --}}
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="px-3 py-1 rounded-full border {{ !$kategoriAktif ? 'bg-green-700 text-white' : 'bg-white' }}">
            Semua
        </a>
        @foreach ($daftarKategori as $k)
            <a href="{{ route('pengelolaan', ['username' => $username, 'kategori' => $k]) }}"
               class="px-3 py-1 rounded-full border {{ $kategoriAktif === $k ? 'bg-green-700 text-white' : 'bg-white' }}">
                {{ $k }}
            </a>
        @endforeach
    </div>

    {{-- Daftar tanaman --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($tanaman as $t)
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg hover:-translate-y-1 transition">
                <img src="{{ asset('images/' . $t['gambar']) }}" alt="{{ $t['nama'] }}"
                     class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold">{{ $t['nama'] }}</h2>
                    <p class="text-xs italic text-gray-500">{{ $t['latin'] }}</p>
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">{{ $t['kategori'] }}</span>
                    <p class="text-sm mt-2">{{ $t['manfaat'] }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada tanaman yang cocok.</p>
        @endforelse
    </div>
@endsection