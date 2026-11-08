@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="w-full max-w-sm mx-auto bg-white p-8 rounded-2xl shadow-lg border border-green-100 mt-10">
        <h1 class="font-judul text-3xl font-bold text-green-800 text-center">TogaKu</h1>
        <p class="text-center text-gray-500 text-sm mt-1 mb-6">
            Masuk untuk mengenal tanaman obat keluarga
        </p>

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-3">
            @csrf
            <input type="text" name="username" value="{{ old('username') }}"
                   placeholder="Username"
                   class="w-full border border-green-200 rounded-xl p-2.5 focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('username')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit"
                    class="w-full bg-green-700 hover:bg-green-800 text-white rounded-xl py-2.5 transition">
                Masuk
            </button>
        </form>
    </div>
@endsection