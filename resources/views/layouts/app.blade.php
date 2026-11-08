<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TogaKu</title>
    @include('partials.head')
</head>
<body class="font-isi bg-green-50 text-gray-800 min-h-screen flex flex-col">
    <x-navbar />

    <main class="flex-1 w-full max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>