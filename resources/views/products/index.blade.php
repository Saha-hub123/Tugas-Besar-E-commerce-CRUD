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
      @endif

      <!-- Header Admin Panel -->
      <div class="mt-12 mb-8">
          <h1 class="text-3xl sm:text-4xl font-semibold">Admin Panel</h1>
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-2">
              <p class="text-lg sm:text-xl text-gray-700">Halaman list produk dan <span class="font-bold">CRUD</span> Edit Produk, Tambah, dan Hapus</p>
              <a href="{{ route('products.create') }}">
                  <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold">
                      Tambah Produk
                  </button>
              </a>
          </div>
      </div>

      <!-- List Produk -->
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
                  <a href="{{ route('products.edit', $product) }}">
                      <button
                          class="w-full bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg mt-4 font-semibold"
                      >
                          Edit
                      </button>
                  </a>
              </div>
          </div>
          @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-8">
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
