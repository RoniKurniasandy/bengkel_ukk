<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

  <nav class="bg-blue-600 text-white p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">Bengkel Mobil Pak Joko</h1>
      <div class="flex items-center gap-4">
        <span>Halo, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">
            Logout
          </button>
        </form>
      </div>
    </div>
  </nav>

  <main class="container mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded shadow">
      <h2 class="text-2xl font-semibold mb-4">Selamat Datang di Dashboard</h2>
      <p class="text-gray-700">Ini adalah halaman dashboard setelah login. Di sini kamu bisa melihat informasi akun, status kendaraan, atau fitur lainnya.</p>

      <!-- Contoh kotak info -->
      <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-blue-100 p-4 rounded">
          <h3 class="text-lg font-medium">Riwayat Servis</h3>
          <p class="text-sm text-gray-600">Lihat histori kendaraan kamu.</p>
        </div>
        <div class="bg-green-100 p-4 rounded">
          <h3 class="text-lg font-medium">Jadwal Booking</h3>
          <p class="text-sm text-gray-600">Cek jadwal servis yang akan datang.</p>
        </div>
      </div>
    </div>
  </main>

</body>
</html>
