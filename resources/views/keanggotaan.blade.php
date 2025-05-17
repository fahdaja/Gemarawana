<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keanggotaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <!-- Navbar (tidak diubah sesuai permintaan) -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <img src="images/logo GR.png" alt="Logo MAPALA GEMARAWANA" class="w-12 h-12" />
      <nav>
        <ul class="flex space-x-6 font-semibold text-gray-700">
          <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
          <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
          <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
          <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
          <li><a href="/keanggotaan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Keanggotaan</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Section -->
  <main class="py-16 px-4 bg-white">
    <div class="max-w-5xl mx-auto text-center">
      <h1 class="text-4xl font-bold text-gray-800 mb-6">Keanggotaan</h1>
      <p class="text-gray-600 mb-12">
        Halaman ini menampilkan informasi mengenai status keanggotaan dalam organisasi, yang terbagi menjadi dua kategori: <strong>Anggota Muda</strong> dan <strong>Anggota Penuh</strong>. Melalui halaman ini, pengunjung dapat melihat jumlah anggota aktif di setiap kategori dan mengakses detail masing-masing anggota. Fitur pengelolaan keanggotaan juga disediakan agar administrator dapat dengan mudah memperbarui data keanggotaan sesuai kebutuhan organisasi. Dengan sistem ini, manajemen anggota menjadi lebih efisien, transparan, dan terstruktur.
      </p>

      <!-- Kartu Anggota -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 px-4">
        <!-- Anggota Muda -->
        <div class="bg-gray-50 hover:bg-blue-50 transition duration-300 rounded-xl p-6 shadow-md">
          <h3 class="text-lg font-semibold text-gray-700 mb-2">ANGGOTA MUDA</h3>
          <p class="text-5xl font-bold text-blue-600">{{ $jumlahAnggotaMuda }}</p>
          <a href="{{ route('detail.anggota.muda') }}" class="inline-block mt-4 text-blue-500 font-medium hover:underline">
            Lihat anggota
          </a>
        </div>

        <!-- Anggota Penuh -->
        <div class="bg-gray-50 hover:bg-blue-50 transition duration-300 rounded-xl p-6 shadow-md">
          <h3 class="text-lg font-semibold text-gray-700 mb-2">ANGGOTA PENUH</h3>
          <p class="text-5xl font-bold text-blue-600">{{ $jumlahAnggotaPenuh }}</p>
          <a href="{{ route('detail.anggota.penuh') }}" class="inline-block mt-4 text-blue-500 font-medium hover:underline">
            Lihat anggota
          </a>
        </div>
      </div>

      <!-- Tombol Atur -->
      <a href="/login">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition">
          Atur anggota
        </button>
      </a>
    </div>
  </main>

</body>
</html>
