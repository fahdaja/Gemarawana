<!DOCTYPE html>
<lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Keanggotaan</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <div class=" items-center justify-between mt-20 ">
            <form action="{{ isset($anggota) ? route('updateAnggota', $anggota->id) : route('tambahAnggota') }}"
                method="post" class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
                @csrf
                @if(isset($anggota))
                    @method('PUT')
                @endif
                <div class="flex justify-end">
                    <a href="/adminkeanggotaan"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg></a>
                </div>

                <h2 class="text-2xl font-semibold mb-6 text-gray-700">
                    {{ isset($anggota) ? 'Edit Anggota' : 'Tambah Anggota' }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama',$anggota->nama ?? '') }}"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- NIM -->
                     
                    <div>
                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" id="nim" value="{{ old('nim',$anggota->nim ?? '') }}"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                            @error('nim')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
                    </div>
                    <!-- No Anggota -->
                    <div>
                        <label for="no_anggota" class="block mb-2 text-sm font-medium text-gray-700">No. Anggota</label>
                        <input type="text" name="no_anggota" id="no_anggota" value="{{ old('no_anggota', $anggota->no_anggota ?? '') }}"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('no_anggota')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-700">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan',$anggota->jurusan ?? '') }}"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="w-full px-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="aktif" {{ isset($anggota) && $anggota->status == 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="non-aktif" {{ isset($anggota) && $anggota->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-700">Keterangan</label>
                        <select name="keterangan" id="keterangan"
                            class="w-full px-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="anggota_muda" {{ isset($anggota) && $anggota->keterangan == 'anggota_muda' ? 'selected' : '' }}>Anggota Muda</option>
                            <option value="anggota_penuh" {{ isset($anggota) && $anggota->keterangan == 'anggota_penuh' ? 'selected' : '' }}>Anggota Penuh</option>
                            <option value="alumni" {{ isset($anggota) && $anggota->keterangan == 'alumni' ? 'selected' : '' }}>Alumni</option>
                        </select>
                    </div>
                </div>

                <!-- Submit -->
                <div class="mt-8 text-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-indigo-700 transition ">
                        {{ isset($anggota) ? 'Simpan perubahan' : 'Kirim' }}
                    </button>

                </div>
            </form>
        </div>

    </body>

    </html>