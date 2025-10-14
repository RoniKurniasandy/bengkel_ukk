<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar - Bengkel Mobil Sejahtera</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>


    /* Overlay hitam transparan di atas background */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5); /* Sesuaikan gelap/terangnya */
      z-index: 0;
    }

    body {
      background-image: url('{{ asset("image/bg_bengkel.jpg") }}');
      background-size: cover;
      background-position: center;
    }

    /* Pastikan konten berada di atas overlay */
    body > * {
      position: relative;
      z-index: 10;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-black bg-opacity-60">



<div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">Daftar</h1>

    @if ($errors->any())
      <div class="mb-4 text-sm text-red-600">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
               class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required
               class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required
               class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required
               class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
              class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
        Daftar
      </button>
    </form>
    

    <div class="mt-6 text-center text-sm">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
    </div>
  </div>

</body>
</html>
