<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Galeri</title>
  <script src="https://cdn.tailwindcss.com"></script>
<link  href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Header -->
<nav class="bg-white shadow mb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-5">
      <!-- Judul -->
      <h1 class="text-xl font-bold text-blue-600">Admin</h1>

      <!-- Hamburger Button (only on small screens) -->
      <button
        id="menu-btn"
        class="md:hidden flex items-center px-3 py-2 border border-gray-700 rounded text-gray-700 hover:text-blue-600 hover:border-blue-600"
        aria-label="Toggle menu"
      >
        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z" />
        </svg>
      </button>

      <!-- Menu Desktop -->
      <div
        id="menu"
        class="hidden md:flex space-x-4 items-center text-sm font-medium text-gray-700"
      >
        <a href="/admingaleri" class="text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2">Kelola galeri</a>
        <a href="/adminartikel" class="hover:text-blue-600 px-3 py-2 rounded-md">Kelola artikel</a>
        <a href="/adminkeanggotaan" class="hover:text-blue-600 px-3 py-2 rounded-md">Kelola keanggotaan</a>
        <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Logout</a>
      </div>
    </div>

    <!-- Menu Mobile (hidden initially) -->
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
  <!-- Judul -->
  <div class="md:col-span-2">
    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
    <input name="judul" id="judul" type="text" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh : Pendidikan Dasar 2023" required>
  </div>

  <!-- Input Gambar -->
  <div class="md:col-span-2">
    <label for="inputImage" class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
    <input type="file" id="inputImage" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-md p-2 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
    <img id="imagePreview" class="hidden max-w-full rounded shadow border" alt="Preview Gambar">
    <input type="file" name="image_path" id="croppedImage">
  </div>

  <!-- Tombol Submit -->
  <div class="md:col-span-2 text-center mt-6">
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md">
      + Tambah
    </button>
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
      <div class="absolute top-2 right-2 space-x-1">
        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="bg-blue-500 text-white text-xs px-2 py-1 rounded hover:bg-blue-600">Edit</a>
        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 text-white text-xs px-2 py-1 rounded hover:bg-red-600">Hapus</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif
</main>

<!-- JavaScript -->


<script>
  let cropper;
  const imageInput = document.getElementById('inputImage');
  const imagePreview = document.getElementById('imagePreview');
  const croppedImageInput = document.getElementById('croppedImage');
  const form = document.getElementById('upload-form');

  imageInput.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    // ✅ Validasi hanya gambar
    if (!file.type.startsWith('image/')) {
      alert("Format file tidak didukung. Harap upload gambar (jpg, png, dll).");
      imageInput.value = "";
      return;
    }

    const reader = new FileReader();
    reader.onload = function (event) {
      imagePreview.src = event.target.result;
      imagePreview.classList.remove('hidden');

      // Destroy cropper lama
      if (cropper) cropper.destroy();

      // Init cropper
      cropper = new Cropper(imagePreview, {
        aspectRatio: 16 / 9, // bisa diubah sesuai kebutuhan
        viewMode: 1,
        autoCropArea: 1,
      });
    };
    reader.readAsDataURL(file);
  });

  form.addEventListener('submit', function (e) {
    if (cropper) {
      e.preventDefault();

      cropper.getCroppedCanvas({
        width: 800,
        height: 450,
      }).toBlob(function (blob) {
        const reader = new FileReader();
        reader.onloadend = function () {
          croppedImageInput.value = reader.result; // simpan base64 ke hidden input
          form.submit(); // submit ulang setelah hidden input siap
        };
        reader.readAsDataURL(blob);
      }, 'image/jpeg');
    }
  });
</script>


<script>
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

</body>
</html>
