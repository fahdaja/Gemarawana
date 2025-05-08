<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Kegiatan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
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
      <h1 class="text-center text-xl font-semibold mb-10">Halaman Kegiatan</h1>
    </div>

    <div class="max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 rounded-2xl mb-6 ">
      <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-auto h-auto object-cover rounded-lg">
      <div class="text-justify items-center justify-between px-20 ">
        <h2 class="font-semibold py-4">Rock Climbing citatah</h2>
        <p class="text-gray-600">GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan
          Politeknik Telkom. Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan
          MAPALA (Mahasiswa Pecinta Alam). GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom
          dengan latar belakang yang berbeda - beda.GEMARAWANA sendiri memiliki kepanjangan Genderang Maut Raja Wana
          yang berarti bahwa kami (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh
          manusia serta turut mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarlkan buml
          ini.
        </p>
        <p class="text-sm text-gray-400 mt-2">Dipublikasikan pada 5 Mei 2025 oleh Admin</p>
        <span onclick="openModal('modal1')" class="text-blue-500 hover:font-semibold cursor-pointer py-4">Baca
          Selengkapnya</span>
      </div>
      <!-- Modal Pop-up -->
      <div id="modal1" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div
          class="bg-white max-w-6xl w-full max-h-screen overflow-y-auto p-6 grid grid-cols-1 sm:grid-cols-2 gap-7 rounded-2xl shadow-lg relative">

          <!-- Tombol Close -->
          <button onclick="closeModal('modal1')"
            class="absolute top-3 right-4 text-gray-600 hover:text-black text-2xl font-bold">&times;</button>

          <!-- Isi Modal -->
          <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-full h-auto object-cover rounded-lg">

          <div class="text-justify px-6 flex flex-col justify-center break-words">
            <h2 class="font-semibold text-xl mb-4">Rock Climbing Citatah</h2>
            <p class="text-gray-600">
              GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan Politeknik Telkom.
              Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA
              (Mahasiswa Pecinta Alam). <br><br>
              GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom dengan latar belakang yang
              berbeda-beda. GEMARAWANA sendiri memiliki kepanjangan "Genderang Maut Raja Wana" yang berarti bahwa kami
              (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh manusia serta turut
              mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarikan bumi ini. <br><br>
              Kegiatan utama kami meliputi pendakian, panjat tebing, penelusuran gua, konservasi lingkungan, hingga
              edukasi kepada masyarakat tentang pentingnya menjaga alam. Kami percaya bahwa melalui aksi nyata, kami
              bisa menjadi agen perubahan dalam menjaga bumi
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 rounded-2xl mb-6 ">
      <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-full h-full object-cover rounded-lg">
      <div class="text-justify items-center justify-between px-20 ">
        <h2 class="font-semibold py-4">Rock Climbing citatah</h2>
        <p class="text-gray-600">GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan
          Politeknik Telkom. Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan
          MAPALA (Mahasiswa Pecinta Alam). GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom
          dengan latar belakang yang berbeda - beda.GEMARAWANA sendiri memiliki kepanjangan Genderang Maut Raja Wana
          yang berarti bahwa kami (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh
          manusia serta turut mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarlkan buml
          ini.
        </p>
        <span onclick="openModal('modal2')" class="text-blue-500 hover:font-semibold cursor-pointer py-4">Baca
          Selengkapnya</span>
      </div>
      <!-- Modal Pop-up -->
      <div id="modal2" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div
          class="bg-white max-w-6xl w-full max-h-screen overflow-y-auto p-6 grid grid-cols-1 sm:grid-cols-2 gap-7 rounded-2xl shadow-lg relative">

          <!-- Tombol Close -->
          <button onclick="closeModal('modal2')"
            class="absolute top-3 right-4 text-gray-600 hover:text-black text-2xl font-bold">&times;</button>

          <!-- Isi Modal -->
          <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-full h-auto object-cover rounded-lg">

          <div class="text-justify px-6 flex flex-col justify-center break-words">
            <h2 class="font-semibold text-xl mb-4">Rock Climbing Citatah</h2>
            <p class="text-gray-600">
              GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan Politeknik Telkom.
              Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA
              (Mahasiswa Pecinta Alam). <br><br>
              GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom dengan latar belakang yang
              berbeda-beda. GEMARAWANA sendiri memiliki kepanjangan "Genderang Maut Raja Wana" yang berarti bahwa kami
              (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh manusia serta turut
              mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarikan bumi ini. <br><br>
              Kegiatan utama kami meliputi pendakian, panjat tebing, penelusuran gua, konservasi lingkungan, hingga
              edukasi kepada masyarakat tentang pentingnya menjaga alam. Kami percaya bahwa melalui aksi nyata, kami
              bisa menjadi agen perubahan dalam menjaga bumi edukasi kepada masyarakat tentang pentingnya menjaga alam.
              Kami percaya bahwa melalui aksi nyata, kami bisa menjadi agen perubahan dalam menjaga bumi
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="max-w-6xl mx-auto bg-white p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 rounded-2xl mb-6 ">
      <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-auto h-auto object-cover rounded-lg">
      <div class="text-justify items-center justify-between px-20 ">
        <h2 class="font-semibold py-4">Rock Climbing citatah</h2>
        <p class="text-gray-600">GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan
          Politeknik Telkom. Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan
          MAPALA (Mahasiswa Pecinta Alam). GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom
          dengan latar belakang yang berbeda - beda.GEMARAWANA sendiri memiliki kepanjangan Genderang Maut Raja Wana
          yang berarti bahwa kami (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh
          manusia serta turut mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarlkan buml
          ini.
        </p>
        <span onclick="openModal('modal2')" class="text-blue-500 hover:font-semibold cursor-pointer mt-4">Baca
          Selengkapnya</span>
      </div>

      <!-- Modal Pop-up -->
      <div id="modal3" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div
          class="bg-white max-w-6xl w-full max-h-screen overflow-y-auto p-6 grid grid-cols-1 sm:grid-cols-2 gap-7 rounded-2xl shadow-lg relative">

          <!-- Tombol Close -->
          <button onclick="closeModal('modal3')"
            class="absolute top-3 right-4 text-gray-600 hover:text-black text-2xl font-bold">&times;</button>

          <!-- Isi Modal -->
          <img src="images/IMG_1665.png" alt="Foto Kegiatan" class="w-full h-auto object-cover rounded-lg">

          <div class="text-justify px-6 flex flex-col justify-center break-words">
            <h2 class="font-semibold text-xl mb-4">Rock Climbing Citatah</h2>
            <p class="text-gray-600">
              GEMARAWANA adalah sebuah organisasi penggiat alam yang berada dibawah naungan Politeknik Telkom.
              Organisasi ini bergerak dalam bidang kegiatan alam bebas yang lebih dikenal dengan sebutan MAPALA
              (Mahasiswa Pecinta Alam). <br><br>
              GEMARAWANA didirikan oleh 6 orang (perintis) mahasiswa Politeknik Telkom dengan latar belakang yang
              berbeda-beda. GEMARAWANA sendiri memiliki kepanjangan "Genderang Maut Raja Wana" yang berarti bahwa kami
              (sekelompok orang) mendeklarasikan diri mengecam kerusakan alam yang dilakukan oleh manusia serta turut
              mengabdi kepada bangsa ini sebagai kelompok penggiat alam dan berupaya melestarikan bumi ini. <br><br>
              Kegiatan utama kami meliputi pendakian, panjat tebing, penelusuran gua, konservasi lingkungan, hingga
              edukasi kepada masyarakat tentang pentingnya menjaga alam. Kami percaya bahwa melalui aksi nyata, kami
              bisa menjadi agen perubahan dalam menjaga bumi edukasi kepada masyarakat tentang pentingnya menjaga alam.
              Kami percaya bahwa melalui aksi nyata, kami bisa menjadi agen perubahan dalam menjaga bumi
            </p>
          </div>
        </div>
      </div>
    </div>


    <script>
      function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }

      function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    </script>
  </main>


</body>

</html>