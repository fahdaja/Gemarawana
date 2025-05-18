<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Anggota Penuh dan Alumni</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center py-10">

  <div class="bg-white rounded-lg shadow-md p-8 max-w-6xl w-full mb-12">
    <button
      onclick="history.back()"
      class="mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
      ← Kembali
    </button>

    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Anggota Penuh</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-md shadow-sm">
        <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
          <tr>
            <th class="px-6 py-3 border-b border-gray-300 text-center">No</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Nama</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">NIM</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">No Anggota</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Jurusan</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($anggotaPenuh as $index => $anggota)
          <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->nama }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->nim }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->no_anggota }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->jurusan }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">
              <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                {{ $anggota->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ ucfirst($anggota->status) }}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-md p-8 max-w-6xl w-full">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Alumni</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-md shadow-sm">
        <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
          <tr>
            <th class="px-6 py-3 border-b border-gray-300 text-center">No</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Nama</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">NIM</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">No Anggota</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Jurusan</th>
            <th class="px-6 py-3 border-b border-gray-300 text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumni as $index => $anggota)
          <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->nama }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->nim }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->no_anggota }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $anggota->jurusan }}</td>
            <td class="px-6 py-4 border-b border-gray-200 text-center">
              <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                {{ $anggota->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ ucfirst($anggota->status) }}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
