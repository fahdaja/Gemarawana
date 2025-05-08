<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen">
  <!-- Navbar -->
  <header class="flex space-x-5 items-center justify-between p-20 py-4 bg-white shadow">
    <img src="images/logo GR.png" alt="Logo" class="w-12 h-12" />
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
  <main class="px-4 py-10">
    <div>
        <h1 class="text-center text-xl font-semibold mb-10">Keanggotaan</h1>
    </div>

    <div class="flex justify-center text-center gap-8 mb-6">
    <!-- Anggota Muda -->
    <div class="bg-gray-100 rounded-md px-8 py-6 w-45">
      <p class="text-sm font-semibold mb-2 ">ANGGOTA MUDA</p>
      <p class="text-3xl font-bold mb-2 ">16</p>
      <button class="text-sm font-medium underline"><a href="" class="hover:text-blue-500">Lihat anggota</a></button>
    </div>

    <!-- Anggota Penuh -->
    <div class="bg-gray-100 rounded-md px-8 py-6 w-45">
      <p class="text-sm font-semibold mb-2 ">ANGGOTA PENUH</p>
      <p class="text-3xl font-bold mb-2 ">72</p>
      <button class="text-sm font-medium underline "><a href="" class="hover:text-blue-500">Lihat anggota</a></button>
    </div>
  </div>

  <!-- Deskripsi -->
  <div class="max-w-xl mx-auto text-sm px-3 mb-8 justify-center">
    <p>
      Lorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sumLorem ip sum
    </p>
  </div>

    
  <!-- Tombol Atur -->
  <div class="flex justify-center mt-8">
  <button class="relative bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg text-sm font-semibold shadow-md transition duration-200 ease-in-out"><a href="/admin">Atur anggota</a>
    
  </button>
</div>


  </main>
 
</body>

</html>