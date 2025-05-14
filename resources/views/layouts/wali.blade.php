<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Wali Santri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
  <style>
    :root {
      --primary: #1F8F2F;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white border-b shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-semibold text-[--primary]">Dashboard Wali Santri</h1>
      <div class="text-sm space-x-4">
        <a href="#" class="hover:underline text-[--primary]">Profil</a>
        <a href="#" class="hover:underline text-red-600">Logout</a>
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-4 py-8">

@yield('content')
  </main>

</body>
</html>