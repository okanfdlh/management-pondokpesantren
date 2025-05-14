<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pondok Pesantren</title>

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .input-field:focus {
            border-color: #059669;
            box-shadow: 0 0 8px rgba(5, 150, 105, 0.5);
        }

        .btn-back:hover {
            transform: translateX(-4px);
        }
    </style>
</head>
<body class="bg-emerald-700 relative min-h-screen flex items-center justify-center px-4">

    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/bg-pondok.jpg'); filter: brightness(0.5);"></div>

    <!-- Overlay hitam semi-transparan -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Tombol Back -->
    <a href="{{ route('home') }}" class="absolute top-6 left-6 z-20 flex items-center text-white font-semibold hover:text-gray-200 transition-transform btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>

    <!-- Card Login -->
    <div class="relative z-20 bg-white bg-opacity-90 backdrop-blur-xl shadow-2xl rounded-xl px-8 py-10 w-full max-w-md animate-fade-in">
        <div class="text-center mb-6">
            <!-- Logo Pondok (jika ada) -->
            <img src="https://www.bahrululumic.com/static/media/logo.bdf38093e82df3e22c5e.png" alt="Logo Pondok" class="w-16 h-16 mx-auto mb-2">
            <h2 class="text-3xl font-bold text-emerald-700">Login</h2>
            <p class="text-gray-600 text-sm mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Alert jika login gagal -->
        @if($errors->has('login_error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">{{ $errors->first('login_error') }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username"
                    class="input-field w-full px-4 py-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-emerald-400"
                    value="{{ old('username') }}">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password"
                    class="input-field w-full px-4 py-3 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-emerald-400">
            </div>

            <button type="submit" class="w-full bg-emerald-700 text-white py-3 rounded-md font-semibold text-lg shadow-md transition-all
                    hover:bg-emerald-600 hover:shadow-lg hover:brightness-110">
                Masuk
            </button>

            <div class="text-center">
                <a href="#" class="text-emerald-700 text-sm hover:underline">Lupa password?</a>
            </div>
        </form>
    </div>

    <!-- Tailwind Animation -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: 0, transform: 'translateY(20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        }
                    }
                }
            }
        };
    </script>
</body>

</html>
