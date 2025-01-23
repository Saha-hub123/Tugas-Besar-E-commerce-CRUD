<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('user') }}">
                        <img src="https://raw.githubusercontent.com/Saha-hub123/Asset/refs/heads/main/logo.png" alt="" class="block h-9 w-auto fill-current text-gray-800">
                        <!-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link> -->
                    <x-nav-link :href="route('user')" :active="request()->routeIs('user')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative">

    <!-- kategori dropdown -->
    <button id="dropdownButton" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
      Kategori
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-1" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11.414l3.293-3.707a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
        <a href="{{ route('user.kategori', ['kategori' => 'motherboard']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Motherboard</a>
        <a href="{{ route('user.kategori', ['kategori' => 'ram']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Ram</a>
        <a href="{{ route('user.kategori', ['kategori' => 'processor']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Prossesor</a>
        <a href="{{ route('user.kategori', ['kategori' => 'vga']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Graphic Card</a>
        <a href="{{ route('user.kategori', ['kategori' => 'psu']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Power Supply</a>
        <a href="{{ route('user.kategori', ['kategori' => 'casing']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Case</a>
        <a href="{{ route('user.kategori', ['kategori' => 'cooler']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cooler</a>
    </div>
  </div>
  <script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown if clicked outside
    window.addEventListener('click', (event) => {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
    <!-- kategori dropdown -->
            </div>
                </div>
            </div>
            
            <!-- search -->
            <form action="{{ route('products.search') }}" method="GET">
                <div class="flex items-center gap-2 border-2 rounded-xl mt-2">
                <svg class="w-6 h-6 text-gray-400 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m2.65-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                  </svg>
                <input class="px-32 text-center border-none bg-transparent" type="text" name="query" placeholder="Cari produk..." required>
            </div>
            </form>
            <!-- search end-->
        
        <div class="flex items-center">
            <!-- keranjang -->
            <div class="relative">
                <!-- Icon Keranjang -->
                <a href="#" id="cartDropdownToggle">
                    <img src="https://cdn-icons-png.flaticon.com/128/3144/3144456.png" 
                        alt="Keranjang" class="block h-6 w-auto text-gray-800">
                </a>

                <!-- Dropdown Menu -->
                <div id="cartDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border rounded-lg shadow-lg">
                    <ul class="py-2 px-4">
                        <!-- Contoh Item -->
                        @if (session('cart') && count(session('cart')) > 0)
                        @foreach (session('cart') as $id => $item)
                        <li class="flex items-center justify-between py-1">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset($item['gambar']) }}" 
                                    alt="{{ $item['nama_produk'] }}" class="w-10 h-10 object-cover rounded">
                                <div>
                                    <p class="text-sm font-medium">{{ $item['nama_produk'] }}</p>
                                    <small class="text-gray-500">Rp. {{ number_format($item['harga'], 2, ',', '.') }}</small>
                                </div>
                            </div>
                            <form action="{{ route('removeFromCart', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus</button>
                            </form>
                        </li>
                        @endforeach
                        <hr class="my-2">
                        <!-- Tombol Checkout -->
                        <li class="text-center">
                            <a href="{{ route('user.checkout') }}" 
                            class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                            Checkout
                            </a>
                        </li>
                        @else
                            <li class="dropdown-item text-center">Keranjang kosong</li>
                        @endif
                    </ul>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toggle = document.getElementById('cartDropdownToggle');
                    const dropdown = document.getElementById('cartDropdown');

                    toggle.addEventListener('click', function (e) {
                        e.preventDefault();
                        dropdown.classList.toggle('hidden'); // Tampilkan/sembunyikan dropdown
                    });

                    // Sembunyikan dropdown jika klik di luar
                    document.addEventListener('click', function (e) {
                        if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                });
            </script>
            <!-- keranjang end-->

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            @if(auth()->user()->role == 'admin')
                            <x-dropdown-link :href="route('products.index')">
                                {{ __('Admin') }}
                            </x-dropdown-link>
                            @endif
                            

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
        </div>

            <!-- Hamburger -->
            <div class="-me-2  sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link> -->

            <x-responsive-nav-link :href="route('user')" :active="request()->routeIs('user')">
                {{ __('Products') }}
            </x-responsive-nav-link>
            @php
                $kategori = ['ram', 'motherboard', 'processor']; // Replace with dynamic data if available
            @endphp

            @foreach ($kategori as $ktgr)
                <x-responsive-nav-link :href="route('user.kategori', $kategori)">
                    {{ ucfirst($ktgr) }}
                </x-responsive-nav-link>
            @endforeach

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if(auth()->user()->role == 'admin')
                <x-responsive-nav-link :href="route('products.index')">
                    {{ __('Admin') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
