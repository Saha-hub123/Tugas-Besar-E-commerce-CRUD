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
    
    <!-- <div class="mt-48 px-2 flex justify-between">
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
</div> -->
      <!-- Carosel -->
      
    
    {{-- List Product --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-28 mb-28">
        <h1 class="text-4xl font-inter font-semibold">Admin Panel</h1>
        <div class="justify-between flex">
        <p class="text-xl">Halaman list product dan <span class="font-bold">CRUD</span> Edit Produk, Tambah dan Hapus</p>
        <a href="{{ route('products.create') }}"><button class="bg-gray-100 px-10 py-2 rounded-lg  font-semibold">Tambah</button></a>
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
                    <a href="{{ route('products.edit' , $product) }}">
                    <button class="bg-gray-100 px-10 py-2 rounded-lg mt-2 w-full font-semibold">Edit</button>
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
