<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="alert alert-success mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <span class="text-green-500">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="mt-48 px-2 flex justify-between">
        <h1 class="font-semibold text-5xl font-inter">
          Lengkapi dan bangun pc <br />
          Pertamamu disni! <span class="text-base block font-normal mt-2">dapatkan part pc dengan kualitas terbaik <br />hanya di Isrcomp!</span>
        </h1>
        <div class="-mt-14 sm:flex">
          <svg width="506" height="507" viewBox="0 0 506 507" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g filter="url(#filter0_d_35_17)">
              <rect width="482" height="493" fill="url(#pattern0_35_17)" shape-rendering="crispEdges" />
            </g>
            <defs>
              <filter id="filter0_d_35_17" x="0" y="0" width="506" height="507" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                <feOffset dx="20" dy="10" />
                <feGaussianBlur stdDeviation="2" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_35_17" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_35_17" result="shape" />
              </filter>
              <pattern id="pattern0_35_17" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_35_17" transform="matrix(0.00127853 0 0 0.00125 -0.0114108 0)" />
              </pattern>
              <image
                id="image0_35_17"
                width="800"
                height="800"
                href="https://dlcdnwebimgs.asus.com/gain/16d8a2b2-3c4f-419d-a933-911575f7bb75/w800"
              />
            </defs>
          </svg>
        </div>
      </div>
</div>
      <!-- Carosel -->
      <div class="px-2 bg-indigo-500 text-white pt-24 pb-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-4xl font-semibold">Produk Terpopuler</h1>
        <p class="font-normal pb-10">Beberapa produk kita yang populer terjual</p>
    
        <div x-data="carousel()" class="relative w-full">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Slide 1 -->
                <div x-show="activeSlide === 0" x-transition:enter="transition-all duration-500 ease-in-out" x-transition:leave="transition-all duration-500 ease-in-out">
                    <img
                        src="https://raw.githubusercontent.com/rdityaa/ditsa-prjt.github.io/refs/heads/main/source/gamercomp-YQf19uMsRgY-unsplash.jpg"
                        class="absolute block object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        width=""
                        height="600"
                        alt="Gaming Setup"
                    />
                </div>
                <!-- Slide 2 -->
                <div x-show="activeSlide === 1" x-transition:enter="transition-all duration-500 ease-in-out" x-transition:leave="transition-all duration-500 ease-in-out">
                    <img
                        src="https://images.unsplash.com/photo-1662037592536-45692eed7ab0?q=80&w=1971&auto=format&fit=crop"
                        class="absolute block object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        width=""
                        height="600"
                        alt="Slide 2"
                    />
                </div>
                <!-- Slide 3 -->
                <div x-show="activeSlide === 2" x-transition:enter="transition-all duration-500 ease-in-out" x-transition:leave="transition-all duration-500 ease-in-out">
                    <img
                        src="https://images.unsplash.com/photo-1616877562265-d4ffd9d6f47f?q=80&w=2069&auto=format&fit=crop"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slide 3"
                    />
                </div>
                <!-- Slide 4 -->
                <div x-show="activeSlide === 3" x-transition:enter="transition-all duration-500 ease-in-out" x-transition:leave="transition-all duration-500 ease-in-out">
                    <img
                        src="https://images.unsplash.com/photo-1642627537186-58756324967f?q=80&w=1887&auto=format&fit=crop"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slide 4"
                    />
                </div>
                <!-- Slide 5 -->
                <div x-show="activeSlide === 4" x-transition:enter="transition-all duration-500 ease-in-out" x-transition:leave="transition-all duration-500 ease-in-out">
                    <img
                        src="https://images.unsplash.com/photo-1601153211050-ae2e1fa428d7?q=80&w=2070&auto=format&fit=crop"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="Slide 5"
                    />
                </div>
            </div>
    
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white" :class="{'bg-white': activeSlide === 0}" @click="activeSlide = 0" aria-label="Slide 1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" :class="{'bg-white': activeSlide === 1}" @click="activeSlide = 1" aria-label="Slide 2"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" :class="{'bg-white': activeSlide === 2}" @click="activeSlide = 2" aria-label="Slide 3"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" :class="{'bg-white': activeSlide === 3}" @click="activeSlide = 3" aria-label="Slide 4"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" :class="{'bg-white': activeSlide === 4}" @click="activeSlide = 4" aria-label="Slide 5"></button>
            </div>
    
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="prev">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="next">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    </div>
    
    {{-- List Product --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-28 mb-28">
        <h1 class="text-4xl font-inter font-semibold">Mau nyari apa?</h1>
        <div class="justify-between flex">
        <p class="text-xl">Berikut list produk yang kami jual di toko kami!</p>
        
        </div>

        {{-- Card Produk --}}
        <div class="grid md:grid-cols-3 mt-4 gap-5 sm:grid-cols-1">
            @foreach ($products as $product)
                <div class="mt-2">
                    <img class="w-96 h-96 object-cover rounded-xl" src="{{ url('storage/' . $product->gambar) }}" alt="">
                    <div class="mt-2">
                      <p class="text-xl font-light">{{ $product->name }}</p>
                      <p class="font-semibold text-gray-400">Rp. {{ number_format($product->harga) }}</p>
                    </div>
                    <a href="{{ route('beli', $product->id)}}">
                    <button class="bg-gray-100 px-10 py-2 rounded-lg mt-2 w-full font-semibold">Buy Now</button>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
          {{ $products->links() }}
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
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
    };
}
</script>
      
  
</x-app-layout>
