<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Artikel</title>
  <script src="https://cdn.tailwindcss.com"></script>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow mb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-5">
      <!-- Judul -->
      <h1 class="text-xl font-bold text-blue-600">Admin</h1>

      <!-- Hamburger Button (hanya muncul di layar kecil) -->
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
        class="hidden md:flex space-x-2 items-center text-sm font-medium"
      >
        <a href="/admingaleri" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md">Kelola galeri</a>
        <a href="/adminartikel" class="text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2">Kelola artikel</a>
        <a href="/adminkeanggotaan" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md">Kelola keanggotaan</a>
        <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Logout</a>
      </div>
    </div>

    <!-- Menu Mobile (default hidden, muncul saat toggle) -->
    <div id="mobile-menu" class="md:hidden hidden flex-col space-y-2 pb-5">
      <a href="/admingaleri" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Kelola galeri</a>
      <a href="/adminartikel" class="block text-blue-600 border-b-2 border-blue-600 pb-1 px-3 py-2 text-sm font-medium">Kelola artikel</a>
      <a href="/adminkeanggotaan" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Kelola keanggotaan</a>
      <a href="/logout" class="block bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
    </div>
  </div>
</nav>

  <!-- Main Content -->
  <main class="max-w-5xl mx-auto p-6 space-y-8">
    
    <!-- Form Tambah/Edit Artikel -->
    <section class="bg-white p-6 rounded-xl shadow">
      <h2 class="text-2xl font-semibold mb-6">Tambah Artikel</h2>
      <form id="artikelForm" action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">

          <div>
            <label class="block text-sm font-medium mb-1">Judul Artikel</label>
            <input type="text" id="judul" name="judul" class="w-full border rounded p-2" required />
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" class="w-full border rounded p-2" required></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Upload Gambar</label>
              <input type="file" id="image_path" name="image_path" accept="image/*" class="w-full border rounded p-2" />
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG (Max 5Mb).</p>
              <input type="hidden" name="cropped_image" id="cropped_image">
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Provinsi</label>
            <select id="provinsi" name="provinsi_id" class="w-full border rounded p-2" required>
              <option value="">Pilih Provinsi</option>
              @foreach($provinsi as $prov)
                <option value="{{ $prov->id }}" data-nama="{{ $prov->nama }}">{{ $prov->nama }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Kota</label>
            <select id="kota" name="kota_id" class="w-full border rounded p-2" required>
              <option value="">Pilih Kota</option>
              @foreach ($kota as $k)
                <option value="{{ $k->id }}" data-nama="{{ $k->nama }}">{{ $k->nama }}</option>
              @endforeach
            </select>
          </div>

          <input type="hidden" name="lokasi" id="lokasi">

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
            + Tambah
          </button>

        </div>
      </form>
    </section>

    <!-- Daftar Artikel -->
    <section class="bg-white p-6 rounded-xl shadow">
  <h2 class="text-lg font-semibold mb-4">Daftar Artikel</h2>
  @foreach ($artikel as $item)
    <div class="flex items-start space-x-4 border p-4 rounded shadow-sm bg-gray-50 mb-4">
      <img src="{{ asset('storage/' . $item->image_path) }}" class="w-32 h-20 object-cover rounded" />
      <div class="flex-1">
        <h3 class="font-semibold text-gray-800">{{ $item->judul }}</h3>
        <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
        <p class="text-sm text-blue-600 mt-1">{{ $item->lokasi }}</p>

        <div class="mt-4 flex gap-3">
          <a href="{{ route('admin.artikel.edit', $item->id) }}" 
             class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 transition">
            Edit
          </a>

          <form action="{{ route('admin.artikel.destroy', $item->id) }}" 
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 transition">
              Hapus
            </button>
          </form>
        </div>

      </div>
    </div>
  @endforeach
</section>


  </main>
<!-- Modal Crop Gambar -->
<div id="cropModal" class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded shadow max-w-xl w-full">
    <h2 class="text-lg font-semibold mb-4">Crop Gambar</h2>
    <div class="w-full h-64 overflow-hidden">
      <img id="cropImage" class="max-w-full">
    </div>
    <div class="mt-4 flex justify-end space-x-2">
      <button id="cancelCrop" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
      <button id="confirmCrop" class="px-4 py-2 bg-blue-600 text-white rounded">Crop</button>
    </div>
  </div>
</div>

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const provinsiSelect = document.getElementById('provinsi');
      const kotaSelect = document.getElementById('kota');
      const lokasiInput = document.getElementById('lokasi');

      function updateLokasi() {
        const provinsiText = provinsiSelect.options[provinsiSelect.selectedIndex]?.text || '';
        const kotaText = kotaSelect.options[kotaSelect.selectedIndex]?.text || '';
        if (provinsiText && kotaText && provinsiText !== 'Pilih Provinsi' && kotaText !== 'Pilih Kota') {
          lokasiInput.value = `${provinsiText}, ${kotaText}`;
        } else {
          lokasiInput.value = '';
        }
      }

      provinsiSelect.addEventListener('change', function () {
        const provId = this.value;
        if (!provId) {
          kotaSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
          lokasiInput.value = '';
          return;
        }

        kotaSelect.innerHTML = '<option value="">Loading...</option>';
        fetch(`/api/kota/${provId}`)
          .then(res => res.json())
          .then(data => {
            kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
            data.forEach(kota => {
              kotaSelect.innerHTML += `<option value="${kota.id}">${kota.nama}</option>`;
            });
          })
          .catch(() => {
            kotaSelect.innerHTML = '<option value="">Gagal memuat kota</option>';
          });

        updateLokasi();
      });

      kotaSelect.addEventListener('change', updateLokasi);

      document.getElementById('artikelForm').addEventListener('submit', function () {
        updateLokasi(); // pastikan lokasi sudah diupdate sebelum form submit
      });
    });
  </script>

  <script>
  let cropper;
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
  
<script>
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

</body>
</html>
