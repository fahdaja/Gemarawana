<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
  <header class="flex space-x-5 items-center justify-between p-20 py-4 bg-white shadow">
    <img src="images/Logo GR.png" alt="Logo" class="w-12 h-12" />
    <nav>
      <ul class="flex space-x-5 text-sm font-medium">
        <li class="hover:text-blue-500 cursor-pointer"><a href="/homepage">Home</a></li>
        <li class="hover:text-blue-500 cursor-pointer"><a href="/halamankegiatan">Halaman Kegiatan</a></li>
        <li class="hover:text-blue-500 cursor-pointer"><a href="/galerikegiatan">Galeri</a></li>
        <li class="hover:text-blue-500 cursor-pointer"><a href="/artikel">Artikel</a></li>
        <li class="hover:text-blue-500 cursor-pointer"><a href="/keanggotaan">Keanggotaan</a></li>
      </ul>
    </nav>
  </header>
  <div class="max-w-6xl mx-auto mt-7 px-0">
  <input id="searchInput" type="text" placeholder="Cari artikel..." 
         class="w-full p-3 border rounded-xl shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
</div>

  <main class="px-4 py-10">
  <div>
        <h1 class=" max-w-6xl mx-auto text-left text-xl grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 font-semibold mb-5">Artikel</h1>
    </div>
        
        <div class="artikel-item max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 rounded-2xl mb-6 ">
            <img src="images/kegiatanRC.png" alt="Sejarah Gemarawana" class="w-full h-full object-cover rounded-lg aspect-[16/9]">
        <div class="text-justify items-center justify-between px-20 ">
            <h2 class="text-xl font-semibold text-gray-700 py-4">Sejarah Gemarawana</h2>
            <p class="text-gray-600">
                GEMARAWANA adalah sebuah organisasi penggiat alam yang berada di bawah naungan Politeknik Telkom.
                Organisasi ini bergerak dalam kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA
                (Mahasiswa Pecinta Alam).
            </p>
            <p class="text-sm text-gray-400 mt-2">Dipublikasikan pada 5 Mei 2025 oleh Admin</p>
            <p class="text-blue-500 hover:font-semibold cursor-pointer py-4">Baca Selengkapnya</p>
        </div>
        </div>

        <div class="artikel-item max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 rounded-2xl">
        <img src="images/kegiatanRC.png" alt="Sejarah Gemarawana" class="w-full h-full object-cover rounded-lg aspect-[16/9] ">
        <div class="text-justify items-center justify-between px-20 ">
            <h2 class="text-xl font-semibold text-gray-700 py-4">Sejarah wanadri</h2>
            <p class="text-gray-600">
                GEMARAWANA adalah sebuah organisasi penggiat alam yang berada di bawah naungan Politeknik Telkom.
                Organisasi ini bergerak dalam kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA
                (Mahasiswa Pecinta Alam).
            </p>
            <p class="text-sm text-gray-400 mt-2">Dipublikasikan pada 5 Mei 2025 oleh Admin</p>
            <p class="text-blue-500 hover:font-semibold cursor-pointer py-4">Baca Selengkapnya</p>
        </div>
    </div>
    <div class="flex justify-center mt-10 space-x-4">
  <span class="px-4 py-2 bg-blue-500 text-white rounded">1</span>
  <a href="artikel-page2.html" class="px-4 py-2 bg-gray-200 hover:bg-blue-100 rounded">2</a>
</div>
</main>
<script>
  const searchInput = document.getElementById('searchInput');
  const articles = document.querySelectorAll('.artikel-item');

  searchInput.addEventListener('input', function () {
    const query = this.value.toLowerCase();

    articles.forEach(article => {
      const text = article.innerText.toLowerCase();
      if (text.includes(query)) {
        article.style.display = '';
      } else {
        article.style.display = 'none';
      }
    });
  });
</script>
</body>


</html>