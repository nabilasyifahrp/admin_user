<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-300 via-purple-400 to-purple-600 min-h-screen flex flex-col items-center justify-center text-white">

    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold bg-gradient-to-r from-white via-purple-100 to-white text-transparent bg-clip-text drop-shadow-md">
            ✨ Selamat Datang di <span class="underline decoration-purple-200">Aplikasi</span> ✨
        </h1>
        <p class="mt-4 text-lg text-purple-100 italic tracking-wide">
            Ayo mulai perjalananmu dengan login atau daftar dulu ya!
        </p>
    </div>


    <div class="flex gap-6">
        <a href="{{ route('login') }}">
            <button class="flex items-center gap-2 px-6 py-3 bg-white text-purple-700 font-semibold rounded-xl shadow-lg hover:bg-purple-100 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Login
            </button>
        </a>

        <a href="{{ route('register') }}">
            <button class="flex items-center gap-2 px-6 py-3 bg-white text-purple-700 font-semibold rounded-xl shadow-lg hover:bg-purple-100 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Register
            </button>
        </a>
    </div>
</body>
</html>