<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-200 via-purple-300 to-purple-500 min-h-screen text-gray-800">

    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-purple-700">📝 Artikel Admin</h1>
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">Logout</button>
        </form>
        @endauth
    </nav>

    <main class="py-8">
        @yield('content')
    </main>

</body>
</html>
