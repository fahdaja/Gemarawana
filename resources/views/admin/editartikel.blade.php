<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10 relative">

    <a href="{{ route('admin.artikel.index') }}"
       class="absolute top-4 right-4 text-gray-500 hover:text-red-600 p-2 rounded-full transition duration-200"
       title="Batal / Kembali">
        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Edit Artikel</h2>
        
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required
                          class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
            </div>

            <div>
                <div><label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
                <input type="file" id="image_path" name="image_path"
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                       <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG (Max 5Mb).</p>
                <input type="hidden" name="cropped_image" id="cropped_image">
                </div>
                @if($artikel->image_path)
                <label class="block text-sm font-medium text-gray-700 mt-5">Gambar Saat Ini</label>
                    <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="Gambar Artikel"
                         class="mt-4 w-48 h-auto rounded-md shadow">
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                    <select id="provinsi" name="provinsi_id" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsi as $prov)
                            <option value="{{ $prov->id }}" {{ (old('provinsi_id', $artikel->provinsi_id) == $prov->id) ? 'selected' : '' }}>
                                {{ $prov->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="kota" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                    <select id="kota" name="kota_id" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Kota</option>
                        @foreach($kota as $k)
                            <option value="{{ $k->id }}" {{ (old('kota_id', $artikel->kota_id) == $k->id) ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <input type="hidden" name="lokasi" id="lokasi" value="{{ old('lokasi', $artikel->lokasi) }}">

            <div class="flex items-center justify-start space-x-4 pt-4">
                <button type="submit"
                        class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
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

        provinsiSelect.addEventListener('change', () => {
            const provId = provinsiSelect.value;
            if (!provId) {
                kotaSelect.innerHTML = '<option value="">Pilih Provinsi dulu</option>';
                updateLokasi();
                return;
            }

            fetch(`/api/kota/${provId}`)
                .then(res => res.json())
                .then(data => {
                    kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                    data.forEach(kota => {
                        kotaSelect.innerHTML += `<option value="${kota.id}">${kota.nama}</option>`;
                    });
                    updateLokasi();
                })
                .catch(() => {
                    kotaSelect.innerHTML = '<option value="">Gagal memuat kota</option>';
                });
        });

        kotaSelect.addEventListener('change', updateLokasi);

        updateLokasi();
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
