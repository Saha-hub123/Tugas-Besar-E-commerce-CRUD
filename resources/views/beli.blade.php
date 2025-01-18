<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-gray-50">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex-1 md:flex md:items-center md:gap-12">
          <a class="block text-teal-600" href="#">
            <span class="sr-only">Home</span>
            <img src="https://raw.githubusercontent.com/Saha-hub123/Asset/refs/heads/main/logo.png" alt="" width="60px" height="60px">
          </a>
        </div>

        <div class="md:flex md:items-center md:gap-12">
          <nav aria-label="Global" class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm pr-8">
              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> About </a>
              </li>

              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Product </a>
              </li>

              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="flex items-center gap-4">
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
        @auth
      <a href="{{ url('/admin') }}"
      class="rounded-md bg-indigo-500 px-5 py-2.5 text-sm font-medium text-white shadow">
        Admin
      </a>
      <form action="{{route('logout')}}" method="post">
        @csrf
      
        <form action="{{route('logout')}}" method="post">
        @csrf
          <button type="submit" class="rounded-md bg-indigo-500 px-5 py-2.5 text-sm font-medium text-white shadow">LogOut</button>
      </form>
            </div>
      </form>
    @else
    <a href="{{ route('login') }}"
      class="rounded-md bg-indigo-500 px-5 py-2.5 text-sm font-medium text-white shadow">
      Log in
    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
      class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600">
      Register
    </a>
  @endif
  @endauth
        </nav>
      @endif          

          </div>
          

          <div class="block md:hidden">
            <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="container mx-auto px-6 py-10" action="{{route("beli", $products->id)}}">
  @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <!-- Gambar Produk -->
      <div class="pl-24 pt-10 ">
        <img src="{{$products->gambar}}" alt="Gambar Produk" class="h-80 w-auto rounded-lg shadow-lg " id="gambar" name="gambar" required>
      </div>
      <!-- Detail Produk -->
      <div>
        <h2 class="text-3xl font-bold text-gray-800" id="name" name="name" required>{{$products->name}}</h2>
        <p class="text-gray-600 mt-4" id="deskripsi" name="deskripsi" required>{{$products->deskripsi}}</p>
        <p class="text-gray-800 text-2xl font-bold mt-6" id="harga" name="harga" required>Rp. {{$products->harga}}</p>
        <div class="mt-6">
          <button class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none">Tambahkan ke Keranjang</button>
        </div>
        <div class="mt-8">
          <h3 class="text-xl font-semibold text-gray-800">Detail Produk:</h3>
          <ul class="list-disc list-inside text-gray-600 mt-2">
            <li>Fitur Utama 1</li>
            <li>Fitur Utama 2</li>
            <li>Fitur Utama 3</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Ulasan Produk -->
    <section class="mt-16">
      <h3 class="text-2xl font-bold text-gray-800">Ulasan Produk</h3>
      <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center font-bold text-gray-600">A</div>
          <div class="ml-4">
            <p class="font-bold text-gray-800">Alex</p>
            <p class="text-sm text-gray-600">"Produk ini sangat bagus dan kualitasnya luar biasa!"</p>
          </div>
        </div>
        <div class="flex items-center mt-6">
          <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center font-bold text-gray-600">B</div>
          <div class="ml-4">
            <p class="font-bold text-gray-800">Budi</p>
            <p class="text-sm text-gray-600">"Pengiriman cepat dan sesuai dengan deskripsi."</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-gray-800 text-white mt-16">
    <div class="container mx-auto px-6 py-4 text-center">
      <p>&copy; 2025 TokoKu. Semua Hak Dilindungi.</p>
    </div>
  </footer>
</body>
</html>
