<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMARAWANA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .text-shadow {
        text-shadow: 
            2px 2px 4px rgba(1, 1, 1, 1); /* Shadow lembut */
    }
</style>
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <header class="bg-white text-gray-900 shadow-md w-full">
  <div class="flex justify-between items-center px-6 py-4 w-full">
    <!-- Kiri: Logo dan Judul -->
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/Logo GR.png') }}" alt="Logo" class="h-12 w-auto object-contain">
      <span class="text-xl md:text-1xl font-bold tracking-wide">GEMARAWANA</span>
    </div>

    <!-- Kanan: Navigasi -->
    <nav>
      <ul class="flex space-x-4 md:space-x-6 text-sm md:text-base font-medium">
        <li><a href="/" class="text-blue-600 border-b-2 border-blue-600 pb-1">Home</a></li>
        <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
        <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
        <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
        <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
      </ul>
    </nav>
  </div>
</header>



    <section class="relative">
        <img src="{{ asset('images/Diksar.jpg') }}" alt="Banner" class="w-full h-96 object-cover ">
        <h1 class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-4xl font-bold text-red-600 text-shadow">GEMARAWANA</h1>
    </section>

    <section class="container mx-auto py-12 px-6 text-center">
        <h1 class="text-2xl max-w-3xl mx-auto font-bold">TENTANG GEMARAWANA</h1>
        <img src="{{ asset('images/Logo GR.png') }}" alt="Logo" class="mx-auto mb-4">
        <p class="text-lg max-w-3xl mx-auto">
        GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan Politeknik Telkom. Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA (Mahasiswa Pecinta Alam). GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom dengan latar belakang yang berbeda - beda.GEMARAWANA sendiri memiliki kepanjangan Genderang Maut Raja Wana yang berarti bahwa kami (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh manusia serta turut mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarikan bumi ini.
        </p>
    </section>

    <section class="container mx-auto py-12 px-6">
        <h2 class="text-2xl font-bold text-center mb-6">Pengenalan Divisi Gemarawana</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <img src="{{ asset('images/Orad.png') }}" alt="Divisi 1" class="mx-auto">
                <p class="mt-2">Orad</p>
            </div>
            <div>
                <img src="{{ asset('images/Rockclimbing.png') }}" alt="Divisi 2" class="mx-auto">
                <p class="mt-2">Rock Climbing</p>
            </div>
            <div>
                <img src="{{ asset('images/Gununghutan.png') }}" alt="Divisi 3" class="mx-auto">
                <p class="mt-2">Gunung Hutan</p>
            </div>
            <div>
                <img src="{{ asset('images/Jurnalistik.png') }}" alt="Divisi 4" class="mx-auto">
                <p class="mt-2">Jurnalistik</p>
            </div>
        </div>
    </section>

    <section class="bg-gray-800 py-12 px-6 text-center">
        <blockquote class="text-lg italic max-w-3xl mx-auto">
        <i class="fas fa-quote-left text-white-400 text-2xl"> "Untuk menjadi seorang anggota, setiap calon anggota harus melewati beberapa tahap rangkaian kegiatan yang diadakan oleh organisasi ini dan organisasi ini hanya menerima calon anggota yang berstatus sebagai mahasiswa Telkom University."</i>
           
        </blockquote>
    </section>

    <footer class="bg-gray-700 py-6 text-center">
        <div class="container mx-auto text-sm">
            <h1 class="text-lg justify-center text-center">Contact Us</h1>
            <p><a href="https://wa.me/6281256478847" class="hover:text-blue-500 cursor-pointer justify-center  py-2"> | Whatsapp | </a><a href="https://www.instagram.com/gemarawana?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="hover:text-blue-500 cursor-pointer justify-center  py-2">| Instagram |</a></p>
            <i class="text-center space-y-2 font-medium ">© 2025 GEMARAWANA | Anggota muda</>
            <p>Muhammad Fahd Al Islam Al Bantani x Muhammad Ansyari Farhan</p>
        </div>
    </footer>
</body>
</html>
