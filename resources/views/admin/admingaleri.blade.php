<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Galeri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Header -->
<nav class="bg-white shadow mb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600 text-center">Admin</h1>
      <div class="flex text-right justify-end items-center space-x-2 py-5">
        <a href="/admingaleri" class="text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2 text-sm font-medium">Kelola galeri</a>
        <a href="/adminartikel" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Kelola artikel</a>
        <a href="/adminkeanggotaan" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Kelola keanggotaan</a>
        <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
      </div>
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
    <input name="judul" id="judul" type="text" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Tebing Citatah, Bandung" required>
  </div>

  <!-- Input Gambar -->
  <div class="md:col-span-2">
    <label for="inputImage" class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
    <input type="file" id="inputImage" accept="image/*" class="w-full border border-gray-300 rounded-md p-2 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
  </div>

  <!-- Preview Gambar untuk Crop -->
  <div id="crop-container" class="hidden md:col-span-2 mt-4 rounded border border-dashed border-gray-400 p-4 max-w-2xl mx-auto">
    <p class="text-center text-sm text-gray-500 mb-2">Crop Gambar di bawah ini:</p>
    <div class="w-full max-h-[400px] overflow-hidden rounded">
      <img id="image" class="max-w-full h-auto mx-auto" />
    </div>
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
  const inputImage = document.getElementById('inputImage');
  const imageElement = document.getElementById('image');
  const cropContainer = document.getElementById('crop-container');
  const form = document.getElementById('upload-form');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  let cropper;

  inputImage.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
      imageElement.src = event.target.result;
      cropContainer.classList.remove('hidden');

      if (cropper) cropper.destroy();

      cropper = new Cropper(imageElement, {
        aspectRatio: 1, // bebas bisa diganti
        viewMode: 1,
        autoCropArea: 1,
        responsive: true
      });
    };
    reader.readAsDataURL(file);
  });

  form.addEventListener('submit', function (e) {
  e.preventDefault();

  if (!cropper) {
    alert("Pilih gambar terlebih dahulu!");
    return;
  }

  // Ambil hasil crop sebagai base64 string
  const base64Image = cropper.getCroppedCanvas().toDataURL('image/jpeg');

  // Buat FormData baru
  const formData = new FormData(form);

  // Hapus file input supaya tidak terkirim file fisik
  formData.delete('image_path');

  // Kirim base64 string ke key image_base64 (sesuai controller yang aku berikan)
  formData.append('image_base64', base64Image);

  fetch(form.action, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrfToken,
    },
    body: formData
  })
  .then(response => {
    if (!response.ok) throw new Error("Upload gagal");
    return response.text();
  })
  .then(() => window.location.reload())
  .catch(error => alert(error.message));

});
</script>


</body>
</html>
