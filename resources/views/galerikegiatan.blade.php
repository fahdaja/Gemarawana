<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Kegiatan | Mapala Gemarawana</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
   <header class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/Logo GR.png') }}" alt="Logo" class="h-12 w-auto object-contain">
      <span class="text-xl md:text-1xl font-bold tracking-wide">GEMARAWANA</span>
    </div>

    <!-- Hamburger button (mobile only) -->
    <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Desktop Navigation -->
    <nav class="hidden md:block">
      <ul class="flex space-x-6 font-semibold text-gray-700">
        <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
        <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
        <li><a href="/galerikegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Galeri</a></li>
        <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
        <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
      </ul>
    </nav>
  </div>

  <!-- Mobile Navigation -->
  <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
    <ul class="flex flex-col space-y-3 font-semibold text-gray-700 bg-white p-4 rounded shadow">
      <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
      <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
      <li><a href="/galerikegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Galeri</a></li>
      <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
      <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
    </ul>
  </div>
</header>

  <!-- Main Content -->
  <main class="px-4 py-10">
    <h1 class="text-center text-2xl font-bold mb-10 tracking-wide">Galeri Kegiatan</h1>

    <!-- Gallery Container -->
    <div class="max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 rounded-2xl shadow border border-gray-200">

      @foreach ($galeri as $item)
      <!-- Card -->
      <div class="group relative bg-gray-50 rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="Foto Kegiatan"
             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent text-white text-sm p-3">
          <p class="font-semibold truncate">{{ $item->judul }}</p>
        </div>
      </div>
      @endforeach

    </div>
  </main>
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600 text-sm select-none"> © 2025 MAPALA GEMARAWANA |
    All rights reserved </footer>
<script>
  // responsive menu toggle
  document.getElementById('menu-toggle').addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>

</body>
</html>
