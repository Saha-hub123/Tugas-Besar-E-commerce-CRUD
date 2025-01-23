<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

  </head>
  <body class="font-sans antialiased">
    <!-- Navbar -->
    <nav class="flex flex-wrap justify-between items-center shadow-xl px-4 sm:px-6 lg:px-24 py-4 gap-2" x-data="{ menuOpen: false }">
      <!-- Logo -->
      <a href="{{ url('/') }}">
        <img class="h-10 sm:h-12" src="https://raw.githubusercontent.com/rdityaa/ditsa-prjt.github.io/refs/heads/main/source/logo.png" alt="logo" />
      </a>
    
      <!-- Search Bar -->
      <form action="{{ route('products.search') }}" method="GET" class="flex-grow max-w-md mt-3 sm:mt-0">
        <input
          class="w-full border border-gray-300 text-center px-3 py-2 rounded-lg"
          type="text"
          name="query"
          placeholder="Cari Item Disini!"
          required
        />
      </form>
    
      <!-- Navigation Buttons -->
      <ul class="hidden md:flex gap-3 mt-3 sm:mt-0">
        @auth
          <li>
            <a
              href="{{ url('/user') }}"
              class="py-2 px-4 sm:py-3 sm:px-7 rounded-lg font-semibold bg-indigo-600 text-white hover:bg-indigo-700"
            >
              Product
            </a>
          </li>
        @else
          <li>
            <a
              href="{{ route('login') }}"
              class="py-2 px-4 sm:py-3 sm:px-7 rounded-lg font-semibold bg-indigo-600 text-white hover:bg-indigo-700"
            >
              Login
            </a>
          </li>
          @if (Route::has('register'))
            <li>
              <a
                href="{{ route('register') }}"
                class="py-2 px-4 sm:py-3 sm:px-5 rounded-lg font-semibold bg-indigo-600 text-white hover:bg-indigo-700"
              >
                Sign Up
              </a>
            </li>
          @endif
        @endauth
      </ul>
    
      <!-- Hamburger Menu Button -->
      <button
        @click="menuOpen = !menuOpen"
        class="md:hidden py-2 px-3 rounded-lg text-indigo-600 hover:text-white hover:bg-indigo-600"
        aria-label="Toggle menu"
      >
        ☰
      </button>
    
      <!-- Dropdown Menu for Hamburger -->
      <div
        x-show="menuOpen"
        @click.outside="menuOpen = false"
        class="absolute right-4 top-16 bg-white shadow-lg rounded-lg py-4 px-6 w-48 z-50"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        style="display: none;"
      >
        <ul>
          @auth
            <li>
              <a
                href="{{ url('/user') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                Product
              </a>
            </li>
          @else
            <li>
              <a
                href="{{ route('login') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                Login
              </a>
            </li>
            @if (Route::has('register'))
              <li>
                <a
                  href="{{ route('register') }}"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
                >
                  Sign Up
                </a>
              </li>
            @endif
          @endauth
        </ul>
      </div>
    </nav>
    
      <!-- Dropdown Menu -->
      <div
        x-show="menuOpen"
        @click.outside="menuOpen = false"
        class="absolute right-4 top-16 w-48 bg-white shadow-lg rounded-lg py-2"
        style="display: none;"
      >
        <ul>
          @auth
            <li>
              <a
                href="{{ url('/user') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                Product
              </a>
            </li>
          @else
            <li>
              <a
                href="{{ route('login') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                Login
              </a>
            </li>
            @if (Route::has('register'))
              <li>
                <a
                  href="{{ route('register') }}"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
                >
                  Sign Up
                </a>
              </li>
            @endif
          @endauth
        </ul>
      </div>
    </nav>
    

    <!-- Hero -->
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 mt-24 flex flex-col-reverse lg:flex-row items-center gap-6">
      <div class="mt-16 lg:w-1/2">
          <h1 class="font-semibold text-3xl sm:text-4xl lg:text-5xl leading-tight font-inter text-center lg:text-left">
              Lengkapi dan bangun pc <br />   
              Pertamamu disini!
          </h1>
          <p class="text-base sm:text-lg mt-4 text-center lg:text-left">
              Dapatkan part pc dengan kualitas terbaik <br />
              hanya di Isrcomp!
          </p>
      </div>
      <div class="lg:w-1/2 flex justify-center">
          <img class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg" src="{{ url('storage/rogmobo.png') }}" alt="Motherboard">            
      </div>
    </div>

    <!-- Carousel -->
    <div class="bg-indigo-600 text-white py-10 sm:py-16 rounded-xl mt-16 sm:mt-24 px-4 sm:px-12 lg:px-24">
      <div class="max-w-7xl mx-auto">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-semibold mb-4">Produk Terpopuler</h1>
        <p class="text-base sm:text-lg mb-8">Beberapa produk kita yang populer terjual</p>

        <div x-data="carousel()" x-init="startAutoScroll()" class="relative">
          <!-- Carousel Wrapper -->
          <div class="relative h-48 sm:h-72 lg:h-96 overflow-hidden rounded-lg">
            <!-- Slides -->
            <template x-for="(slide, index) in slides" :key="index">
              <div
                x-show="activeSlide === index"
                x-transition:enter="transform transition duration-700 ease-in-out"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition duration-700 ease-in-out"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="absolute inset-0"
              >
                <img :src="slide.image" :alt="slide.alt" class="w-full h-full object-cover" />
              </div>
            </template>
          </div>

          <!-- Slider Indicators -->
          <div class="absolute z-30 flex space-x-2 bottom-3 left-1/2 transform -translate-x-1/2">
            <template x-for="(slide, index) in slides" :key="index">
              <button
                :class="{'bg-white': activeSlide === index, 'bg-gray-300': activeSlide !== index}"
                class="w-3 h-3 rounded-full"
                @click="activeSlide = index"
              ></button>
            </template>
          </div>

          <!-- Slider Controls -->
          <button @click="prev" class="absolute top-0 left-0 h-full w-12 flex items-center justify-center">
            <span class="text-white">&lt;</span>
          </button>
          <button @click="next" class="absolute top-0 right-0 h-full w-12 flex items-center justify-center">
            <span class="text-white">&gt;</span>
          </button>
        </div>
      </div>
    </div>

    <script>
      function carousel() {
          return {
              slides: [
                  { image: 'https://raw.githubusercontent.com/rdityaa/ditsa-prjt.github.io/refs/heads/main/source/gamercomp-YQf19uMsRgY-unsplash.jpg', alt: 'Gaming Setup' },
                  { image: 'https://images.unsplash.com/photo-1662037592536-45692eed7ab0?q=80&w=1971&auto=format&fit=crop', alt: 'Slide 2' },
                  { image: 'https://images.unsplash.com/photo-1616877562265-d4ffd9d6f47f?q=80&w=2069&auto=format&fit=crop', alt: 'Slide 3' },
                  { image: 'https://images.unsplash.com/photo-1642627537186-58756324967f?q=80&w=1887&auto=format&fit=crop', alt: 'Slide 4' },
                  { image: 'https://images.unsplash.com/photo-1601153211050-ae2e1fa428d7?q=80&w=2070&auto=format&fit=crop', alt: 'Slide 5' },
              ],
              activeSlide: 0,
              interval: null,
              next() {
                  this.activeSlide = (this.activeSlide + 1) % this.slides.length;
              },
              prev() {
                  this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
              },
              startAutoScroll() {
                  this.interval = setInterval(() => {
                      this.next();
                  }, 5000); // Ganti 5000 dengan interval waktu (ms) yang diinginkan
              },
              stopAutoScroll() {
                  clearInterval(this.interval);
              }
          };
      }
  </script>
  </body>
</html>
