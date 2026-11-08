<nav class="bg-green-700 text-white">
    <div class="w-full px-6 py-3 flex items-center justify-between">
        <span class="font-bold text-lg">TogaKu</span>
        <div class="flex gap-4 text-sm">
            <a href="{{ route('dashboard', ['username' => request('username')]) }}">Dashboard</a>
            <a href="{{ route('pengelolaan', ['username' => request('username')]) }}">Koleksi</a>
            <a href="{{ route('profile', ['username' => request('username')]) }}">Profil</a>
            <a href="{{ route('login') }}">Keluar</a>
        </div>
    </div>
</nav>