<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda - Pondok Pesantren</title>
    
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Load Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .social-icon {
            transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        .social-icon:hover {
            transform: scale(1.2);
            color: #1e293b;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-emerald-700 text-white py-5 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-semibold">Pondok Pesantren Bahrul Ulum</h1>
            <a href="{{ route('login') }}" class="btn bg-blue-800 text-white px-6 py-2 md:py-3 rounded-lg font-semibold text-sm md:text-lg shadow-md hover:bg-blue-600 transition-all">
                Login
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-emerald-700 text-white py-16 md:py-20">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-10 px-6">
            <!-- Teks -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl md:text-5xl font-bold leading-tight">Sistem Informasi Pondok Pesantren</h2>
                <p class="mt-4 md:mt-6 text-base md:text-lg opacity-90">
                    Aplikasi ini membantu dalam pengelolaan santri, izin, pelanggaran, prestasi, serta rekam medis santri.
                    Didesain untuk memudahkan wali santri dalam memantau perkembangan anaknya di pondok pesantren.
                </p>
            </div>
            <!-- Gambar -->
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="https://www.bahrululumic.com/static/media/logo.bdf38093e82df3e22c5e.png" alt="Logo Bahrul Ulum" class="w-52 md:w-72 drop-shadow-lg">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-gray-700 text-center py-6 shadow-md">
        <div class="flex justify-center space-x-10 mb-4">
            <a href="https://www.instagram.com/official_bahrululumsungailiat?igsh=N3ExYjlxaXpqeDd5" class="text-emerald-700 text-3xl sm:text-4xl md:text-5xl hover:text-emerald-500 social-icon">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.youtube.com/@islamiccentretvBangka" class="text-emerald-700 text-3xl sm:text-4xl md:text-5xl hover:text-emerald-500 social-icon">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="https://www.tiktok.com/@icmedia20?_t=ZS-8ucIV7wsotU&_r=1" class="text-emerald-700 text-3xl sm:text-4xl md:text-5xl hover:text-emerald-500 social-icon">
                <i class="fa-brands fa-tiktok"></i>
            </a>
        </div>
        <p class="mt-4 text-sm">&copy; 2025 Pondok Pesantren Bahrul Ulum Islamic Center - Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
