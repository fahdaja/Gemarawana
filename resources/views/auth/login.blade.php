

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen">
  <!-- Navbar -->
 <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <img src="images/logo GR.png" alt="Logo MAPALA GEMARAWANA" class="w-12 h-12" />
      <nav>
        <ul class="flex space-x-6 font-semibold text-gray-700">
          <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
          <li><a href="/rangkaiankegiatan" class="hover:text-blue-600 transition">Rangkaian Kegiatan</a></li>
          <li><a href="/galerikegiatan" class="hover:text-blue-600 ">Galeri</a></li>
          <li><a href="/artikelkegiatan" class="hover:text-blue-600 transition">Artikel</a></li>
          <li><a href="/keanggotaan" class="hover:text-blue-600 transition">Keanggotaan</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Login Form -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-blue-100">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Admin</h2>
    
    <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()" class="space-y-5">
      @csrf
      <!-- Username -->
       @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
      <div>
        <label for="username" class="block mb-1 text-sm font-semibold text-gray-700">Username</label>
        <div class="flex items-center border border-gray-300 rounded-md px-3 focus-within:ring focus-within:ring-blue-300 focus-within:border-blue-300">
          <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A8 8 0 1112 20v0a8 8 0 01-6.879-2.196z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <input
            type="text"
            id="username"
            name="username"
            autocomplete="username"
            placeholder="Masukkan username"
            class="w-full py-2 outline-none bg-transparent"
            required
          />
        </div>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
        <div class="flex items-center border border-gray-300 rounded-md px-3 focus-within:ring focus-within:ring-blue-300 focus-within:border-blue-300">
          <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2v1h4v-1zM6 11v2a2 2 0 002 2h4a2 2 0 002-2v-2m-6 0V7a4 4 0 018 0v4" />
          </svg>
          <input
            type="password"
            id="password"
            name="password"
            autocomplete="new-password"
            placeholder="Masukkan password"
            class="w-full py-2 outline-none bg-transparent"
            required
          />
        </div>
      </div>

      <!-- Submit -->
      <div>
        <button
          type="submit"
          class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-md transition duration-200 font-semibold"
        >
          Login
        </button>
      </div>
    </form>

    <script src="{{ asset('js/login.js') }}"></script>
  </div>
</div>
