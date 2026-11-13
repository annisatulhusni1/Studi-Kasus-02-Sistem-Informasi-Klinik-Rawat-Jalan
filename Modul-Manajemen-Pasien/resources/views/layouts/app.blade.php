<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Rawat Jalan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('pasiens.index') }}" class="text-xl font-bold text-blue-700">Klinik Rawat Jalan</a>

            @auth
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->name }}
                        <span class="ml-1 px-2 py-0.5 bg-blue-100 text-blue-700 rounded text-xs font-semibold">
                            {{ auth()->user()->role }}
                        </span>
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>