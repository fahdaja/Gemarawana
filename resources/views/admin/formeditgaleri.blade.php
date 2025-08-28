<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex items-center justify-center min-h-screen bg-gray-200 p-10">

        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 rounded-xl shadow-xl w-full max-w-2xl">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div class="flex justify-end"><a href="/admingaleri"><svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg></a></div>

            <h2 class="text-3xl font-semibold mb-6 text-gray-700">Edit Galeri</h2>

            <!-- Form Fields -->
            <div class="space-y-6">

                <!-- Judul -->
                <div>
                    <label for="judul" class="block text-lg font-medium text-gray-700">Judul</label>
                    <input name="judul" id="judul" type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Contoh: Tebing Citatah, Bandung" value="{{ old('judul', $galeri->judul) }}"
                        required>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <div><label for="image_path" class="block text-lg font-medium text-gray-700">Upload Gambar</label>
                    <input name="image_path" id="image_path" type="file"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG (Max 5Mb).</p>
                         <input type="hidden" name="cropped_image" id="cropped_image">
                        </div>
                    @if($galeri->image_path)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                            <img src="{{ asset('storage/' . $galeri->image_path) }}" alt="{{ $galeri->judul }}"
                                class="mt-2 w-40 h-40 object-cover rounded-lg border-2 border-indigo-500">
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">Simpan perubahan</button>
                </div>
            </div>
        </form>
    </div>

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