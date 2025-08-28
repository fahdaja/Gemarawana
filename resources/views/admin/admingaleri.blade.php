<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Galeri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Header -->
<nav class="bg-white shadow mb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-5">
      <h1 class="text-xl font-bold text-blue-600">Admin</h1>
      <button id="menu-btn"
        class="md:hidden flex items-center px-3 py-2 border border-gray-700 rounded text-gray-700 hover:text-blue-600 hover:border-blue-600"
        aria-label="Toggle menu">
        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/></svg>
      </button>
      <div id="menu" class="hidden md:flex space-x-4 items-center text-sm font-medium text-gray-700">
        <a href="/admingaleri" class="text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2">Kelola galeri</a>
        <a href="/adminartikel" class="hover:text-blue-600 px-3 py-2 rounded-md">Kelola artikel</a>
        <a href="/adminkeanggotaan" class="hover:text-blue-600 px-3 py-2 rounded-md">Kelola keanggotaan</a>
        <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Logout</a>
      </div>
    </div>
    <div id="mobile-menu" class="md:hidden hidden flex-col space-y-2 pb-5">
      <a href="/admingaleri" class="block text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2 text-sm font-medium">Kelola galeri</a>
      <a href="/adminartikel" class="block hover:text-blue-600 px-3 py-2 rounded-md text-gray-700 text-sm font-medium">Kelola artikel</a>
      <a href="/adminkeanggotaan" class="block hover:text-blue-600 px-3 py-2 rounded-md text-gray-700 text-sm font-medium">Kelola keanggotaan</a>
      <a href="/logout" class="block bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
    </div>
  </div>
</nav>

@if (Auth::user() != null)
<main class="max-w-5xl mx-auto p-6">
<h1 class="text-2xl font-semibold mb-6">Kelola-Galeri</h1> 

<!-- Form Tambah Gambar -->
<section class="bg-white p-6 rounded-xl shadow mb-10">
  <h2 class="text-lg font-semibold mb-4">Tambah Foto</h2>
  <form id="upload-form" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @csrf
    <div class="md:col-span-2">
      <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
      <input name="judul" id="judul" type="text" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh : Pendidikan Dasar 2023" required>
    </div>
    <div class="md:col-span-2">
    <div><label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_path">Upload Gambar</label>
<input class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-describedby="file_input_help" id="image_path" type="file" name="image_path">
<p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG (Max 5Mb).</p></div>
  <input type="hidden" name="cropped_image" id="cropped_image">
</div>
    <div class="md:col-span-2 text-center mt-6">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md">+ Tambah</button>
    </div>
  </form>
</section>
@endif

@if (Auth::user() != null)
<section class="bg-white p-6 rounded-xl shadow">
  <h2 class="text-lg font-semibold mb-4">Daftar Gambar</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($galeri as $item)
    <div class="relative bg-gray-100 rounded shadow">
      <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->judul }}" class="w-full h-40 object-cover rounded-t">
      <div class="p-2">
        <p class="text-sm font-medium">{{ $item->judul }}</p>
      </div>

      <div class="absolute top-2 right-2 inline-flex space-x-1">
        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="bg-blue-500 text-white text-xs px-2 py-1 rounded hover:bg-blue-600">Edit</a>
        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"  onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 text-white text-xs px-2 py-1 rounded hover:bg-red-600">Hapus</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif
</main>
<script>
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
<script>let cropper;
  const fileInput = document.getElementById('image_path');
  const croppedInput = document.getElementById('cropped_image');

  // 1. Ketika pilih gambar
  fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
      // Buat img element baru untuk cropper
      let img = document.createElement('img');
      img.id = 'image';
      img.src = e.target.result;
      img.style.maxWidth = '100%';

      // Hapus cropper lama kalau ada
      const oldImage = document.getElementById('image');
      if (oldImage) oldImage.remove();

      fileInput.insertAdjacentElement('afterend', img);

      if (cropper) cropper.destroy();
      cropper = new Cropper(img, {
       viewMode: 1,  
        responsive: true,
        viewMode: 1,
        autoCropArea: 1,
      });
    };
    reader.readAsDataURL(file);
    // masukkan hasil crop ke hidden input (base64)
    croppedInput.value = canvas.toDataURL('image/png');
  });

</script>
</body>
</html>
