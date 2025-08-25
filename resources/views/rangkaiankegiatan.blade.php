<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rangkaian Kegiatan | Mapala Gemarawana</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <style>
    /* Minimal timeline styling with Tailwind + custom */
    .timeline {
      position: relative;
      margin-top: 2rem;
      padding-left: 2.5rem;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      left: 1rem;
      width: 4px;
      height: 100%;
      background-color: #dc2626;
      /* Tailwind red-600 */
      border-radius: 2px;
    }

    .timeline-item {
      position: relative;
      margin-bottom: 2rem;
      padding-left: 2.5rem;
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      left: 0.25rem;
      top: 0.25rem;
      width: 1.25rem;
      height: 1.25rem;
      background-color: white;
      border-width: 4px;
      border-color: #dc2626;
      border-style: solid;
      border-radius: 9999px;
      /* rounded-full */
      z-index: 10;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">
  <!-- Navbar -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center space-x-3">
      <img src="{{ asset('images/Logo GR.png') }}" alt="Logo" class="h-12 w-auto object-contain">
      <span class="text-xl md:text-1xl font-bold tracking-wide">GEMARAWANA</span>
    </div>

      <!-- Hamburger Button (mobile only) -->
      <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Navigation Menu (desktop) -->
      <nav class="hidden md:block">
        <ul class="flex space-x-6 font-semibold text-gray-700">
          <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
          <li><a href="/rangkaiankegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Rangkaian Kegiatan</a>
          </li>
          <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
          <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
          <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
        </ul>
      </nav>
    </div>

    <!-- Navigation Menu (mobile dropdown) -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
      <ul class="flex flex-col space-y-3 font-semibold text-gray-700 bg-white p-4 rounded shadow">
        <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
        <li><a href="/rangkaiankegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Rangkaian Kegiatan</a>
        </li>
        <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
        <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
        <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
      </ul>
    </div>
  </header>


  <main class="flex-grow max-w-5xl mx-auto px-6 py-12">
    <h1 class="text-5xl font-extrabold text-red-700 mb-10 text-center drop-shadow-md" data-aos="fade-down">
      Rangkaian Kegiatan MAPALA GEMARAWANA
    </h1>

    <div class="timeline">

      <!-- Pendidikan Dasar -->
      <article class="timeline-item" data-aos="fade-right" data-aos-delay="100">
        <h2 class="text-3xl font-bold mb-3">Pendidikan Dasar (DIKSAR)</h2>
        <p class="text-gray-700 mb-4 leading-relaxed">
          Pendidikan Dasar atau yang biasa disebut Diklatsar merupakan kegiatan awal dan paling mendasar dalam proses
          perekrutan anggota baru organisasi mahasiswa pecinta alam (Mapala). Kegiatan ini bertujuan untuk
          memperkenalkan nilai-nilai dasar, wawasan kepecintaalaman, serta membentuk karakter, mental, dan fisik calon
          anggota agar siap menjadi bagian dari organisasi.
        </p>

        <!-- Accordion: Tujuan -->
        <div class="mb-3">
          <input type="checkbox" id="tujuan-diksar" class="hidden peer" />
          <label for="tujuan-diksar"
            class="flex justify-between items-center cursor-pointer font-semibold text-red-700 text-lg peer-checked:text-red-900 select-none">
            Tujuan
            <svg xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 transform peer-checked:rotate-180 transition-transform duration-300" fill="none"
              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </label>
          <div
            class="max-h-0 overflow-hidden peer-checked:max-h-96 transition-all duration-500 ease-in-out mt-2 text-gray-700 list-disc list-inside">
            <ul>
              <li></li>
              <li>o Menanamkan semangat kepedulian terhadap alam dan lingkungan hidup.</li>
              <li>o Membentuk sikap disiplin, tanggung jawab, dan solidaritas dalam tim.</li>
              <li>o Memberikan pengetahuan dan keterampilan dasar survival, navigasi, mountaineering, dan teknik
                kegiatan alam bebas lainnya.</li>
              <li>o Mengenalkan struktur organisasi, sejarah, dan filosofi Mapala.</li>
            </ul>
          </div>
        </div>

        <!-- Accordion: Materi Pelatihan -->
        <div class="mb-3">
          <input type="checkbox" id="materi-diksar" class="hidden peer" />
          <label for="materi-diksar"
            class="flex justify-between items-center cursor-pointer font-semibold text-red-700 text-lg peer-checked:text-red-900 select-none">
            Rangkaian Kegiatan Diklatsar
            <svg xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 transform peer-checked:rotate-180 transition-transform duration-300" fill="none"
              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </label>
          <div
            class="max-h-0 overflow-hidden peer-checked:max-h-[800px] transition-all duration-500 ease-in-out mt-2 text-gray-700 list-decimal list-inside">
            <ol>
              <li>1. Seleksi Administratif dan Wawancara Awal Calon peserta menyerahkan dokumen dan mengikuti wawancara
                untuk mengetahui motivasi dan kesiapan mereka.</li>
              <li>2. Pendidikan Ruangan (Indoor Training)
                Materi disampaikan dalam bentuk kelas mengenai:</li>
              <li>o Etika lingkungan.</li>
              <li>o Navigasi darat.</li>
              <li>o Pengenalan medan dan cuaca.</li>
              <li>o Manajemen perjalanan dan logistik.</li>
              <li>3. Pendidikan Lapangan (Outdoor Training)
                Simulasi kegiatan di alam terbuka seperti:</li>
              <li>Pendakian gunung.</li>
              <li>o Latihan survival.</li>
              <li>o Praktik penggunaan kompas dan peta.</li>
              <li>o Simulasi penyelamatan.</li>
              <li>4. Evaluasi dan Pelantikan
                Peserta yang dinyatakan lulus akan dilantik menjadi Anggota Muda dan berhak mengikuti kegiatan
                organisasi secara penuh.</li>
            </ol>
          </div>
        </div>

        <!-- Accordion: Durasi & Evaluasi -->
        <div>
          <input type="checkbox" id="durasi-diksar" class="hidden peer" />
          <label for="durasi-diksar"
            class="flex justify-between items-center cursor-pointer font-semibold text-red-700 text-lg peer-checked:text-red-900 select-none">
            Nilai-Nilai yang Ditekankan
            <svg xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 transform peer-checked:rotate-180 transition-transform duration-300" fill="none"
              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </label>
          <div
            class="max-h-0 overflow-hidden peer-checked:max-h-48 transition-all duration-500 ease-in-out mt-2 text-gray-700">
            <p>
              <li>Cinta alam dan sesama manusia</li>
              <li>Tangguh, mandiri, dan bertanggung jawab</li>
              <li>Berjiwa petualang namun tetap mengutamakan keselamatan</li>
              <li>Berlandaskan asas kekeluargaan dan solidaritas</li>

            </p>
          </div>
        </div>
      </article>

      <!-- Masa Bimbingan -->
      <article class="timeline-item" data-aos="fade-left" data-aos-delay="200">
        <h2 class="text-3xl font-bold mb-3">Masa Bimbingan</h2>
        <p class="text-gray-700 mb-6 max-w-3xl leading-relaxed">
          Tahap lanjutan setelah Diksar untuk mendalami keterampilan teknis yang dibagi ke dalam 4 divisi utama:
        </p>

        <ul class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">
          <!-- Rock Climbing -->
          <li
            class="bg-white shadow-lg rounded-lg p-5 border border-red-200 hover:shadow-red-400 transition-shadow duration-300"
            data-aos="zoom-in" data-aos-delay="300">
            <h3 class="text-xl font-semibold text-red-700 mb-3 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12">
                <path d="M6 18L18 6M6 6l12 12" />
              </svg>
              Rock Climbing
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li>Rock Climbing atau Panjat Tebing adalah salah satu kegiatan petualangan alam bebas yang menjadi bagian
                dari pengembangan keterampilan anggota Mapala. Kegiatan ini melatih keberanian, teknik, kekuatan fisik,
                dan ketangkasan dalam menaklukkan medan vertikal berupa tebing batu alam.</li>
              <li>Tujuan dan Manfaat Kegiatan:</li>
              <li>Melatih keberanian dan fokus dalam menghadapi medan ekstrem.</li>
              <li>Meningkatkan keterampilan teknis dalam panjat tebing, seperti penggunaan tali, pengaman (anchor), dan
                teknik belay.</li>
              <li>Membangun kerja sama tim dan komunikasi saat di lapangan.</li>
              <li>Memupuk sikap tanggung jawab terhadap keselamatan diri dan tim.</li>
              Materi dan Teknik yang Diajarkan:

              <li>Pengenalan alat panjat (harness, carabiner, ascender, dsb.)</li>Pengenalan alat panjat (harness,
              carabiner, ascender, dsb.)
              <li>Pemasangan anchor dan penggunaan tali</li>
              <li>Teknik top rope dan lead climbing</li>
              <li>Belaying dan komunikasi antar pemanjat</li>
              <li>Simulasi evakuasi di tebing (rescue climbing)</li>

            </ul>
          </li>

          <!-- Navigasi -->
          <li
            class="bg-white shadow-lg rounded-lg p-5 border border-red-200 hover:shadow-red-400 transition-shadow duration-300"
            data-aos="zoom-in" data-aos-delay="400">
            <h3 class="text-xl font-semibold text-red-700 mb-3 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L15 12.75 9.75 8.5" />
              </svg>
              Olahraga Arus Deras (White Water Rafting)
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li>Olahraga Arus Deras atau White Water Rafting merupakan kegiatan petualangan yang memacu adrenalin di
                sungai berarus deras. Kegiatan ini menjadi bagian dari pelatihan fisik dan mental anggota Mapala,
                melibatkan kerjasama tim yang solid, strategi, serta penguasaan teknik pengarungan sungai.</li>
              Tujuan dan Manfaat Kegiatan:

              <li>Mengasah kemampuan navigasi di medan air yang dinamis.</li>
              <li>Melatih kekompakan dan komunikasi tim dalam menghadapi situasi darurat.</li>
              <li>Meningkatkan daya tahan fisik dan kesiapan mental dalam menghadapi risiko.</li>
              <li>Membiasakan anggota untuk berpikir cepat dan mengambil keputusan tepat saat kondisi kritis.</li>
              Materi dan Teknik yang Diajarkan:

              <li>Pengenalan peralatan arung jeram (helm, pelampung, dayung, perahu).</li>• Pengenalan peralatan arung
              jeram (helm, pelampung, dayung, perahu).
              <li>Teknik dayung dan posisi tubuh yang aman.</li>
              <li>Manuver dasar (forward paddle, back paddle, high side).</li>
              <li>Prosedur penyelamatan (rescue technique) dan self-rescue.</li>
              <li>Simulasi evakuasi korban tenggelam dan flip boat recovery.</li>
            </ul>
          </li>

          <!-- Pertolongan Pertama -->
          <li
            class="bg-white shadow-lg rounded-lg p-5 border border-red-200 hover:shadow-red-400 transition-shadow duration-300"
            data-aos="zoom-in" data-aos-delay="500">
            <h3 class="text-xl font-semibold text-red-700 mb-3 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M18.364 5.636l-1.414 1.414M5.636 18.364l-1.414-1.414M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3" />
              </svg>
              Gunung dan Hutan
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </li>

          <!-- Survival -->
          <li
            class="bg-white shadow-lg rounded-lg p-5 border border-red-200 hover:shadow-red-400 transition-shadow duration-300"
            data-aos="zoom-in" data-aos-delay="600">
            <h3 class="text-xl font-semibold text-red-700 mb-3 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 10h2l.5 2h13l.5-2h2M12 14l-3 3m6 0l-3-3m0 6v-6" />
              </svg>
              Jurnalistik
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </li>
        </ul>
      </article>

      <!-- Kegiatan Lanjutan -->
      <!-- Kegiatan Lanjutan -->
      <article class="timeline-item" data-aos="fade-right" data-aos-delay="700">
        <h2 class="text-3xl font-bold mb-3">Pengembaraan</h2>
        <p class="text-gray-700 max-w-3xl leading-relaxed mb-6">
          Pengembaraan merupakan bentuk penerapan nyata dari seluruh proses pembelajaran dan pembentukan karakter yang
          telah dilalui selama masa bimbingan pasca Pendidikan Dasar (Diklatsar). Kegiatan ini menjadi ajang ujian
          kedewasaan, tanggung jawab, dan kesiapan Anggota Muda untuk menjadi bagian penuh dari organisasi.
          Melalui pengembaraan, anggota diuji secara fisik, mental, dan emosional dalam menghadapi medan yang
          sesungguhnya di alam bebas, sekaligus mengintegrasikan berbagai keterampilan yang telah dipelajari selama masa
          bimbingan.

        </p>

        <h3 class="text-xl font-semibold mb-3">Tujuan Umum Pengembaraan:</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2 max-w-3xl">
          <li>Mengaplikasikan keterampilan dan pengetahuan teknis dari materi Gunung Hutan, Rock Climbing, Arus Deras,
            dan Jurnalistik.</li>
          <li>Mengasah kemandirian, ketangguhan, dan kemampuan bekerja dalam tim di situasi nyata.</li>
          <li>Menumbuhkan sikap tanggung jawab, kepemimpinan, dan kecintaan terhadap alam.</li>
          <li>Mengembangkan kemampuan dokumentasi dan pelaporan kegiatan secara sistematis.</li>
        </ul>

      </article>


      <section id="lingkup-kegiatan" class="max-w-3xl mx-auto mt-12 px-4">
        <h2 class="text-2xl font-bold mb-4 text-red-700">Lingkup Kegiatan Pengembaraan</h2>
        <p class="mb-4 text-gray-700">Pengembaraan dapat mencakup berbagai bentuk kegiatan lapangan, antara lain:</p>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li><strong>Gunung Hutan:</strong> Perjalanan lintas jalur dengan medan hutan dan pegunungan sebagai latihan
            navigasi, survival, dan manajemen perjalanan.</li>
          <li><strong>Rock Climbing:</strong> Praktik pemanjatan tebing di lokasi alam, melibatkan teknik belay,
            penggunaan alat, dan simulasi evakuasi.</li>
          <li><strong>Arus Deras:</strong> Pengarungan sungai sebagai latihan kerja sama tim, pengendalian perahu, dan
            prosedur penyelamatan.</li>
          <li><strong>Jurnalistik Lapangan:</strong> Pencatatan perjalanan, fotografi, wawancara, dan pembuatan laporan
            sebagai bentuk dokumentasi dan publikasi kegiatan.</li>
        </ul>
      </section>

      <section id="tahapan-pengembaraan" class="max-w-3xl mx-auto mt-12 px-4">
        <h2 class="text-2xl font-bold mb-6 text-red-700">Tahapan Pengembaraan</h2>
        <ol class="list-decimal list-inside text-gray-700 space-y-3">
          <li>Setiap tim menyusun rencana perjalanan mandiri, termasuk pemetaan jalur, logistik, dan pembagian peran.
          </li>
          <li>Kegiatan dilakukan di alam bebas sesuai rencana, di mana seluruh materi masa bimbingan diterapkan
            langsung.</li>
          <li>Anggota melakukan pencatatan harian, pengumpulan data lapangan, dan pengambilan dokumentasi visual.</li>
          <li>Setelah pengembaraan, dilakukan evaluasi oleh pembimbing dan presentasi hasil sebagai bentuk refleksi dan
            pertanggungjawaban.</li>
        </ol>
        <h3 class="text-xl font-semibold mb-3">Tujuan Umum Pengembaraan:</h3>
        Bagi anggota yang berhasil menyelesaikan pengembaraan dengan baik dan dinyatakan lulus evaluasi:
        <li>Diberikan Pakaian Dinas Lapangan (PDL) sebagai identitas resmi dan kebanggaan sebagai anggota penuh.</li>
        <li>Ditetapkan Nomor Anggota Tetap Gemarawana, sebagai tanda pengakuan dan pencatatan resmi dalam keanggotaan
          organisasi.
          Pakaian PDL dan nomor anggota bukan hanya simbol kelulusan, tetapi juga tanggung jawab moral untuk menjaga
          nama baik dan nilai-nilai luhur Gemarawana dalam setiap tindakan, baik di lapangan maupun dalam kehidupan
          sehari-hari.</li>


      </section>
    </div>
  </main>
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600 text-sm select-none"> © 2025 MAPALA GEMARAWANA |
    All rights reserved </footer>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init({ duration: 700, once: true, }); </script>

  
  <script>
    //responsive menu toggle
  document.getElementById('menu-toggle').addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>

</body>

</html>