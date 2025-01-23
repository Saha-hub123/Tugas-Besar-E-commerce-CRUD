<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="alert alert-success mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <span class="text-green-500">&times;</span>
            </button>
        </div>
    </div>
        @endif

<!-- Hero Section -->
<div class="mt-16 sm:mt-24 px-4 flex flex-col-reverse lg:flex-row items-center gap-6 justify-between">
    <!-- Bagian Teks -->
    <div class="mt-4 text-left sm:text-center lg:text-left lg:w-1/2" style="text-align: justify;">
        <h1 class="font-semibold text-3xl sm:text-4xl md:text-5xl leading-tight font-inter">
            Lengkapi dan bangun pc <br />   
            Pertamamu disini!
        </h1>
        <p class="text-base sm:text-lg mt-4">
            Dapatkan part pc dengan kualitas terbaik <br />
            hanya di Isrcomp!
        </p>
    </div>
    
    <!-- Bagian Gambar -->
    <div class="w-full lg:w-1/2 flex justify-center">
        <img class="w-[300px] sm:w-[400px] md:w-[500px]" src="{{ url('storage/rogmobo.png') }}" alt="Motherboard">
    </div>
</div>


>

        <!-- Carousel Section -->
        <div class="bg-indigo-600 text-white py-16 rounded-xl mt-36">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl sm:text-4xl font-semibold mb-4">Produk Terpopuler</h1>
                <p class="text-lg mb-8">Beberapa produk kita yang populer terjual</p>
        
                <div x-data="carousel()" x-init="startAutoScroll()" class="relative">
                    <!-- Carousel Wrapper -->
                    <div class="relative h-56 sm:h-96 overflow-hidden rounded-lg">
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
                    <div class="absolute z-30 flex space-x-2 bottom-5 left-1/2 transform -translate-x-1/2">
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

        {{-- Kategori --}}
        <div class="mt-36">
            <h1 class="text-4xl font-semibold">Kategori Produk</h1>
            <p class="text-lg mb-8">Berikut beberapa kategori produk yang kami jual!</p> 
            <div class="flex">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <a href="{{ route('user.kategori', ['kategori' => 'motherboard']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/mobo.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">Motherboard</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
                <!-- Card 2 -->
                <a href="{{ route('user.kategori', ['kategori' => 'vga']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/vga.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">Graphic Card</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
                <!-- Card 3 -->
                <a href="{{ route('user.kategori', ['kategori' => 'psu']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/psu.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">Power Supply</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
                <!-- Card 4 -->
                <a href="{{ route('user.kategori', ['kategori' => 'ram']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/ram.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">Ram</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
                <!-- Card 5 -->
                <a href="{{ route('user.kategori', ['kategori' => 'processor']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/processor.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">Processor</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
                <!-- Card 6 -->
                <a href="{{ route('user.kategori', ['kategori' => 'cooler']) }}" class="group relative block bg-black rounded-xl">
                  <img
                    alt=""
                    src="{{ url('storage/cpucooler.png') }}"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-xl"
                  />
              
                  <div class="relative p-4 sm:p-6 lg:p-8">
                    <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Kategori</p>
              
                    <p class="text-xl font-bold text-white sm:text-2xl">CPU Cooler</p>
              
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                      <div
                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                      >
                        <p class="text-sm text-white">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis hic asperiores
                          quibusdam quidem voluptates doloremque reiciendis nostrum harum. Repudiandae?
                        </p>
                      </div>
                    </div>
                  </div>
                </a>

              </div>              
            </div>
        </div>

        <!-- Product List Section -->
        <div class="max-w-7xl mx-auto my-36">
            <h1 class="text-3xl sm:text-4xl font-semibold">Mau nyari apa?</h1>
            <p class="text-lg mb-8">Berikut list produk yang kami jual di toko kami!</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                  <img
                  class="w-full h-60 object-cover md:w-96 md:h-96 lg:w-96 lg:h-96"
                  src="{{ url('storage/' . $product->gambar) }}"
                  alt="{{ $product->name }}"
              /> 

                <div class="p-4">
                    <p class="text-lg font-medium">{{ $product->name }}</p>
                    <p class="text-gray-500 font-semibold mt-1">Rp. {{ number_format($product->harga) }}</p>

                    <!-- Container untuk Tombol -->
                    <div class="flex space-x-2 mt-4">
                        <!-- Tombol "Buy Now" -->
                        <a href="{{ route('beli', $product) }}" class="w-4/5">
                            <button class="w-full bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg font-semibold">
                                Buy Now
                            </button>
                        </a>

                        <!-- Tombol "Keranjang" -->
                        <form action="{{ route('addToCart', $product->id) }}" method="POST" class="w-1/5">
                            @csrf
                            <button type="submit" class="w-full bg-white border border-gray-600 hover:bg-gray-300  px-4 py-2 rounded-lg font-semibold flex items-center justify-center">
                                <img src="https://cdn-icons-png.flaticon.com/128/3144/3144456.png" 
                                    class="block h-6 w-auto" 
                                    alt="Keranjang">
                            </button>
                        </form>

                    </div>
                </div>


                </div>
                @endforeach
            </div>
            </div>
            

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
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
</x-app-layout>
