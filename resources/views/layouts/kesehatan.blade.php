<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Kesehatan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'slide-in': 'slideIn 0.3s ease-out',
          },
          keyframes: {
            slideIn: {
              '0%': { transform: 'translateX(-100%)' },
              '100%': { transform: 'translateX(0)' },
            },
          },
        },
      },
    };
  </script>
</head>
<body class="bg-gray-100">

<!-- Sidebar Mobile -->
<div id="mobileSidebar" class="fixed inset-0 z-50 hidden">
  <div onclick="toggleSidebar(false)" class="absolute inset-0 bg-black bg-opacity-40"></div>
  <div class="relative w-64 h-full bg-gradient-to-b from-teal-800 to-teal-900 text-white shadow-md flex flex-col justify-between animate-slide-in overflow-y-auto max-h-screen">
    <div>
      <div class="p-6 text-center border-b border-white/20 relative">
        <button onclick="toggleSidebar(false)" class="absolute left-4 top-4 text-xl text-white lg:hidden">✕</button>
        <img src="https://www.bahrululumic.com/static/media/logo.bdf38093e82df3e22c5e.png" alt="Logo" class="h-16 mx-auto mb-2">
        <h1 class="text-lg font-bold">Pondok Pesantren</h1>
      </div>
      <nav class="p-4 text-sm space-y-3">
        <a href="{{ route('kesehatan.dashboard') }}" class="block font-medium hover:bg-teal-700 p-2 rounded">Dashboard</a>

        <span class="block text-xs text-white/50 mt-4">Data Santri</span>
        <a href="{{ route('kesehatan.data-santri') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Lihat Daftar Santri</a>

        <span class="block text-xs text-white/50 mt-4">Rekam Medis</span>
        <a href="{{ route('kesehatan.tambah-rekam-medis') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Tambah Rekam Medis</a>
        <a href="{{ route('kesehatan.riwayat-kesehatan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Riwayat Kesehatan</a>

        <span class="block text-xs text-white/50 mt-4">Rekomendasi Perpulangan</span>
        <a href="{{ route('kesehatan.ajukan-perpulangan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Ajukan Perpulangan</a>
        <a href="{{ route('kesehatan.status-pengajuan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Status Pengajuan</a>

        <span class="block text-xs text-white/50 mt-4">Pengaturan</span>
        <a href="{{ route('kesehatan.profil') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Profil Saya</a>
      </nav>
    </div>
    <div class="p-4 border-t border-white/20">
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
    <button type="button" onclick="confirmLogout()" class="w-full text-left text-red-400 hover:underline">
        Logout
    </button>
</form>

    </div>
  </div>
</div>

<!-- Wrapper -->
<div class="flex min-h-screen">

  <!-- Sidebar Desktop -->
  <aside class="w-64 bg-gradient-to-b from-teal-800 to-teal-900 text-white shadow-md hidden lg:flex flex-col justify-between sticky top-0 h-screen">
    <div>
      <div class="p-6 text-center border-b border-white/20">
        <img src="https://www.bahrululumic.com/static/media/logo.bdf38093e82df3e22c5e.png" alt="Logo" class="h-16 mx-auto mb-2">
        <h1 class="text-lg font-bold">Pondok Pesantren</h1>
      </div>
      <nav class="p-4 text-sm space-y-3 overflow-y-auto max-h-[calc(100vh-200px)]">
        <a href="{{ route('kesehatan.dashboard') }}" class="block font-medium hover:bg-teal-700 p-2 rounded">Dashboard</a>

        <span class="block text-xs text-white/50 mt-4">Data Santri</span>
        <a href="{{ route('kesehatan.data-santri') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Lihat Daftar Santri</a>

        <span class="block text-xs text-white/50 mt-4">Rekam Medis</span>
        <a href="{{ route('kesehatan.tambah-rekam-medis') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Tambah Rekam Medis</a>
        <a href="{{ route('kesehatan.riwayat-kesehatan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Riwayat Kesehatan</a>

        <span class="block text-xs text-white/50 mt-4">Rekomendasi Perpulangan</span>
        <a href="{{ route('kesehatan.ajukan-perpulangan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Ajukan Perpulangan</a>
        <a href="{{ route('kesehatan.status-pengajuan') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Status Pengajuan</a>

        <span class="block text-xs text-white/50 mt-4">Pengaturan</span>
        <a href="{{ route('kesehatan.profil') }}" class="block hover:bg-teal-700 p-2 pl-4 rounded">Profil Saya</a>
      </nav>
    </div>
    <div class="p-4 border-t border-white/20">
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
    <button type="button" onclick="confirmLogout()" class="w-full text-left text-red-400 hover:underline">
        Logout
    </button>
</form>

    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col w-full overflow-y-auto">

    <!-- Navbar -->
    <header class="bg-white text-teal-800 shadow-md p-4 flex justify-between items-center sticky top-0 z-30">
      <!-- Hamburger -->
      <button class="lg:hidden text-2xl" onclick="toggleSidebar(true)">☰</button>

      <div class="flex-1"></div>

      <!-- User Info -->
      <div class="flex items-center space-x-3">
        <span class="text-sm hidden sm:inline">Hai, Kesehatan</span>
        <div class="w-9 h-9 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold">K</div>
      </div>
    </header>

    <!-- Konten -->
    @yield('content')

  </div>
</div>

<script>
  function toggleSidebar(show) {
    const sidebar = document.getElementById('mobileSidebar');
    show ? sidebar.classList.remove('hidden') : sidebar.classList.add('hidden');
  }

  function confirmLogout() {
    Swal.fire({
      title: 'Yakin ingin logout?',
      text: "Anda akan keluar dari akun Anda.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Logout',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    });
  }
</script>


</body>
</html>
