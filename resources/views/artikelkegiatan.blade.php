<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
  /* Membatasi teks jadi maksimal 3 baris dengan ... */
  .line-clamp-10 {
    display: -webkit-box;
    -webkit-line-clamp: 10;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
</style>
<body class="bg-gray-100 text-gray-800">
  <!-- Header -->
   <header class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/Logo GR.png') }}" alt="Logo" class="h-12 w-auto object-contain">
      <span class="text-xl md:text-1xl font-bold tracking-wide">GEMARAWANA</span>
    </div>

    <!-- Hamburger menu (mobile only) -->
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
        <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
        <li><a href="/artikelkegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Artikel</a></li>
        <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
      </ul>
    </nav>
  </div>

  <!-- Mobile Navigation -->
  <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
    <ul class="flex flex-col space-y-3 font-semibold text-gray-700 bg-white p-4 rounded shadow">
      <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
      <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
      <li><a href="/galerikegiatan" class="hover:text-blue-600 transition">Galeri</a></li>
      <li><a href="/artikelkegiatan" class="text-blue-600 border-b-2 border-blue-600 pb-1">Artikel</a></li>
      <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
    </ul>
  </div>
</header>


  <main class="px-4 py-10">
    <div>
      <h1 class="max-w-6xl mx-auto text-left text-xl font-semibold mb-1 pl-5">Artikel</h1>
    </div>

    <!-- filter -->
    <div class="px-4 sm:px-6 md:px-10 py-4 text-gray-600">
      <div class="relative flex flex-col sm:flex-row w-full max-w-6xl mx-auto shadow-md rounded-full overflow-hidden">
       <form method="GET" action="/artikelkegiatan" class="relative flex flex-col sm:flex-row w-full max-w-6xl mx-auto shadow-md rounded-full overflow-hidden">
        <!-- Search Input -->
        <input
    id="searchInput"
    type="search"
    name="search"
    value="{{ request('search') }}"
    placeholder="Search..."
    class="flex-1 bg-white h-10 px-4 text-sm text-gray-800 border-none focus:ring-0 focus:outline-none"
    autocomplete="off"
    spellcheck="false"
    autocapitalize="none"
  />

        <!-- Search Button -->
        <button
    type="submit"
    class="flex items-center justify-center h-10 w-full sm:w-10 bg-blue-500 hover:bg-blue-600 text-white rounded-b-full sm:rounded-r-full sm:rounded-bl-none transition-all duration-200"
  >
    <!-- icon search -->
    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786
        c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23
        c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208
        c0.571,0.593,1.339,0.92,2.162,0.92
        c0.779,0,1.518-0.297,2.079-0.837
        C56.255,54.982,56.293,53.08,55.146,51.887z
        M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
        s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
  </button>
</form>
      </div>
    </div>

    <!-- Artikel list -->
    <!-- Artikel list -->
<div class="artikel-list max-w-6xl mx-auto space-y-6">
  @foreach ($artikel as $item)
    <div class="artikel-item bg-white p-6 grid grid-cols-1 sm:grid-cols-2 gap-7 rounded-2xl" data-id="{{ $item->id }}">
      <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->judul }}" class="object-cover rounded-lg aspect-[16/9] mt-5" />
      <div class="text-justify px-6 sm:px-10 flex flex-col justify-between">
        <div>
          <h2 class="text-xl font-semibold text-gray-700 py-4">{{ $item->judul }}</h2>
          <p class="text-gray-600 line-clamp-10">{{ $item->deskripsi }}</p>
          <p class="text-sm text-blue-600 mt-1">{{ $item->lokasi }}</p>
        </div>
        <p class="text-blue-500 hover:font-semibold cursor-pointer py-4 baca-selengkapnya" 
           data-title="{{ $item->judul }}" 
           data-description="{{ $item->deskripsi }}" 
           data-image="{{ asset('storage/' . $item->image_path) }}" 
           data-location="{{ $item->lokasi }}">Baca Selengkapnya</p>
      </div>
    </div>
  @endforeach
</div>
<p id="notFoundMessage" class="text-center text-gray-500 mt-6 hidden">
  Artikel tidak ditemukan.
</p>

<!-- Pagination Laravel -->
<div class="flex justify-center mt-10">
  {{ $artikel->links('vendor.pagination.tailwind') }}
</div>
  </main>
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600 text-sm select-none"> © 2025 MAPALA GEMARAWANA |
    All rights reserved </footer>

<div id="popup" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
  <div
    class="bg-white rounded-lg shadow-lg max-w-4xl w-full p-8 relative grid grid-cols-2 gap-8
           opacity-0 scale-90 transition-all duration-250 ease-in-out"
  >
    <!-- Tombol close -->
    <button
      id="closePopup"
      class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 font-bold text-3xl leading-none select-none"
      aria-label="Tutup Popup"
    >&times;</button>

    <!-- Container gambar dengan aspect ratio fixed 9:16 -->
   <div class="col-span-1 row-span-2 rounded overflow-hidden aspect-[16/9] mt-2">
  <img
    id="popupImage"
    src=""
    alt="Gambar Artikel"
    class="w-full h-full object-cover"
    loading="lazy"
  />
</div>

    <!-- Konten teks, kolom 2 -->
    <div class="flex flex-col justify-start">
      <h2
        id="popupTitle"
        class="text-2xl font-semibold text-gray-800 mb-4"
      ></h2>
      <p
        id="popupDescription"
        class="text-gray-600 overflow-auto max-h-72 pr-4 scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-300 leading-relaxed"
      ></p>
      <p
        id="popupLocation"
        class="text-sm text-blue-600  mt-6"
      ></p>
    </div>
  </div>
</div>



<script>
  // Kode popup kamu yang sudah ada (jangan diubah)
  const popup = document.getElementById('popup');
  const popupContent = popup.querySelector('div');
  const closePopup = document.getElementById('closePopup');

  const popupImage = document.getElementById('popupImage');
  const popupTitle = document.getElementById('popupTitle');
  const popupDescription = document.getElementById('popupDescription');
  const popupLocation = document.getElementById('popupLocation');

  const bacaButtons = document.querySelectorAll('.baca-selengkapnya');

  bacaButtons.forEach(button => {
    button.addEventListener('click', () => {
      const title = button.getAttribute('data-title');
      const description = button.getAttribute('data-description');
      const image = button.getAttribute('data-image');
      const location = button.getAttribute('data-location');

      popupTitle.textContent = title;
      popupDescription.textContent = description;
      popupImage.src = image;
      popupLocation.textContent = location;

      // Show popup with animation
      popup.classList.remove('hidden');
      popup.classList.add('flex');
      popupContent.style.opacity = '0';
      popupContent.style.transform = 'scale(0.9)';
      setTimeout(() => {
        popupContent.style.opacity = '1';
        popupContent.style.transform = 'scale(1)';
      }, 10);
    });
  });

  function close() {
    popupContent.style.opacity = '0';
    popupContent.style.transform = 'scale(0.9)';
    setTimeout(() => {
      popup.classList.remove('flex');
      popup.classList.add('hidden');
      popupImage.src = '';
    }, 250);
  }

  closePopup.addEventListener('click', close);

  popup.addEventListener('click', (e) => {
    if (e.target === popup) close();
  });

  // ====== SCRIPT SEARCH RESPONSIF ======
  const searchInput = document.getElementById('searchInput');
  const artikelItems = document.querySelectorAll('.artikel-item');
  const notFoundMessage = document.getElementById('notFoundMessage');

  searchInput.addEventListener('input', () => {
    const keyword = searchInput.value.toLowerCase().trim();
    

     let hasMatch = false;

    if (keyword === '') {
      // Jika kosong, tampilkan semua artikel
      artikelItems.forEach(item => item.style.display = '');
    } else {
      artikelItems.forEach(item => {
        const judul = item.querySelector('h2')?.textContent.toLowerCase() || '';
        const deskripsi = item.querySelector('p.line-clamp-10')?.textContent.toLowerCase() || '';

        const isMatch = judul.includes(keyword) || deskripsi.includes(keyword);
      item.style.display = isMatch ? '' : 'none';
      
      if (isMatch) hasMatch = true;
    });
   if (hasMatch) {
      notFoundMessage.classList.add('hidden');
    } else {
      notFoundMessage.classList.remove('hidden');
    }
  }
});
</script>

<script>
  // Responsive menu toggle
  document.getElementById('menu-toggle').addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>

</body>
</html>
