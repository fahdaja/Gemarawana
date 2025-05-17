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
      <img src="images/logo GR.png" alt="Logo MAPALA GEMARAWANA" class="w-12 h-12" />
      <nav>
        <ul class="flex space-x-6 font-semibold text-gray-700">
          <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
          <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
          <li><a href="/galerikegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Galeri</a></li>
          <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
          <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
        </ul>
      </nav>
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

</body>
</html>
