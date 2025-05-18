<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <label for="image_path" class="block text-lg font-medium text-gray-700">Upload Gambar</label>
                    <input name="image_path" id="image_path" type="file"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
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

</body>

</html>