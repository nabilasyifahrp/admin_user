<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-purple-700 p-4 text-white flex justify-between items-center shadow-md">
        <div class="text-lg font-bold">
            Admin Panel
        </div>
        <div class="flex gap-4">
            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
