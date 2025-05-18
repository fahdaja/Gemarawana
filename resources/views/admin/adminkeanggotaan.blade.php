<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Keanggotaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow mb-7">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-5">
      <!-- Judul -->
      <h1 class="text-xl font-bold text-blue-600">Admin</h1>

      <!-- Tombol Hamburger (hanya di layar kecil) -->
      <button
        id="menu-btn"
        class="md:hidden flex items-center px-3 py-2 border border-gray-700 rounded text-gray-700 hover:text-blue-600 hover:border-blue-600"
        aria-label="Toggle menu"
      >
        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z" />
        </svg>
      </button>

      <!-- Menu Navigasi -->
      <div
        id="menu"
        class="hidden md:flex space-x-4 items-center text-sm font-medium text-gray-700"
      >
        <a href="/admingaleri" class="px-3 py-2  hover:text-blue-600">Kelola galeri</a>
        <a href="/adminartikel" class="px-3 py-2  hover:text-blue-600">Kelola artikel</a>
        <a href="/adminkeanggotaan" class="px-3 py-2  text-blue-600 border-b-2 border-blue-600 pb-1">
          Kelola keanggotaan
        </a>
        @if (Auth::user() != null)
          <a href="/logout" class="bg-red-500 px-3 py-2 rounded-md text-white hover:bg-red-600">
            Logout
          </a>
        @endif
      </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden flex-col space-y-3 pb-5">
      <a href="/admingaleri" class="block px-3 py-2  text-gray-700 hover:text-blue-600">Kelola galeri</a>
      <a href="/adminartikel" class="block px-3 py-2  text-gray-700 hover:text-blue-600">Kelola artikel</a>
      <a href="/adminkeanggotaan" class="block px-3 py-2  text-blue-600 border-b-2 border-blue-600 pb-1">Kelola keanggotaan</a>
      @if (Auth::user() != null)
        <a href="/logout" class="block bg-red-500 px-3 py-2 rounded-md text-white hover:bg-red-600">Logout</a>
      @endif
    </div>
  </div>
</nav>
  <main class="p-6 space-y-12 max-w-5xl mx-auto flex flex-col">

    <h1 class="text-2xl font-semibold ">Kelola-Keanggotaan</h1>
    <!-- Anggota Muda (Column) -->
    <section class="bg-white rounded shadow p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Anggota Muda</h2>
        @if (Auth::user() != null)

      <a href="/formtambahanggota">
        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">+ Tambah</button>
      </a>
    @endif

      </div>
      <div class="overflow-x-auto">
  <table class="w-full text-sm min-w-[600px]">
    <thead class="bg-gray-100 text-left">
      <tr>
        <th class="py-2 text-center">No</th>
        <th class="py-2 text-center">Nama</th>
        <th class="py-2 text-center">NIM</th>
        <th class="py-2 text-center">Jurusan</th>
        <th class="py-2 text-center">Status</th>
        @if (Auth::user() != null)
          <th class="text-center">Aksi</th>
        @endif
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($dataAnggota as $data)
        @if ($data->keterangan == 'anggota_muda')
          <tr class="border-b">
            <td class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $data->nama }}</td>
            <td class="text-center">{{ $data->nim }}</td>
            <td class="text-center">{{$data->jurusan}}</td>
            <td class="text-center">{{$data->status}}</td>
            @if (Auth::user() != null)
              <td class="p-3 text-center">
                <a href="/editAnggota/{{ $data->id }}"
                  class="bg-blue-600 rounded-md px-2 py-1 text-white hover:bg-blue-700">Edit</a>
                <a href="/deleteAnggota/{{ $data->id }}"
                  class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600">Hapus</a>
              </td>
            @endif
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
    </section>

    <!-- Anggota Penuh (Column) -->
    <section class="bg-white rounded shadow p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Anggota Penuh</h2>
        <!-- <button onclick="toggleModal('modalPenuh')"
          class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">+ Tambah</button> -->
      </div>
      <div class="overflow-x-auto">
  <table class="w-full text-sm min-w-[700px]">
    <thead class="bg-gray-100 text-left">
      <tr>
        <th class="py-2 text-center">No</th>
        <th class="py-2 text-center">Nama</th>
        <th class="py-2 text-center">NIM</th>
        <th class="py-2 text-center">Jurusan</th>
        <th class="py-2 text-center">No. Anggota</th>
        <th class="py-2 text-center">Status</th>
        @if (Auth::user() != null)
          <th class="text-center">Aksi</th>
        @endif
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($dataAnggota as $data)
        @if ($data->keterangan == 'anggota_penuh')
          <tr class="border-b">
            <td class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $data->nama }}</td>
            <td class="text-center">{{ $data->nim }}</td>
            <td class="text-center">{{$data->jurusan}}</td>
            <td class="text-center">{{ $data->no_anggota }}</td>
            <td class="text-center">{{ $data->status }}</td>
            @if (Auth::user() != null)
              <td class="p-3 text-center">
                <a href="/editAnggota/{{ $data->id }}" class="bg-blue-600 rounded-md px-2 py-1 text-white hover:bg-blue-700">Edit</a>
                <a href="/deleteAnggota/{{ $data->id }}" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600">Hapus</a>
              </td>
            @endif
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
    </section>

    <!-- Anggota Penuh (Column) -->
    <section class="bg-white rounded shadow p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Alumni</h2>
        <!-- <button onclick="toggleModal('modalPenuh')"
          class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">+ Tambah</button> -->
      </div>
      <div class="overflow-x-auto">
  <table class="w-full text-sm min-w-[700px]">
    <thead class="bg-gray-100 text-left">
      <tr>
        <th class="py-2 text-center">No</th>
        <th class="py-2 text-center">Nama</th>
        <th class="py-2 text-center">NIM</th>
        <th class="py-2 text-center">Jurusan</th>
        <th class="py-2 text-center">No. Anggota</th>
        <th class="py-2 text-center">Status</th>
        @if (Auth::user() != null)
          <th class="text-center">Aksi</th>
        @endif
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($dataAnggota as $data)
        @if ($data->keterangan == 'alumni')
          <tr class="border-b">
            <td class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $data->nama }}</td>
            <td class="text-center">{{ $data->nim }}</td>
            <td class="text-center">{{ $data->jurusan }}</td>
            <td class="text-center">{{ $data->no_anggota }}</td>
            <td class="text-center">{{ $data->status }}</td>
            @if (Auth::user() != null)
              <td class="p-3 text-center">
                <a href="/editAnggota/{{ $data->id }}" class="bg-blue-600 rounded-md px-2 py-1 text-white hover:bg-blue-700">Edit</a>
                <a href="/deleteAnggota/{{ $data->id }}" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600">Hapus</a>
              </td>
            @endif
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
    </section>
  </main>
 <script>
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
</body>

</html>