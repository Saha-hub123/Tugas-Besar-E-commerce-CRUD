<x-app-layout>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-28 mt-8">
    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Gambar Produk -->
      <div class="flex justify-center">
        <img
          src="{{ url('storage/' . $products->gambar) }}"
          alt="Gambar Produk"
          class="w-full max-w-[460px] h-auto object-cover rounded-2xl shadow-lg"
          id="gambar"
          name="gambar"
          required
        />
      </div>

      <!-- Detail Produk -->
      <div class="flex-1">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4" id="name" name="name" required>
          {{ $products->name }}
        </h2>
        <p class="text-gray-600 mb-4" id="deskripsi" name="deskripsi" required>
          {{ $products->deskripsi }}
        </p>
        <p class="text-gray-800 text-xl sm:text-2xl font-bold mb-6" id="harga" name="harga" required>
          Rp. {{ number_format($products->harga) }}
        </p>
        <p class="text-gray-600 mb-6" id="detail" name="detail" required>
          {{ $products->detail }}
        </p>
        <div class="mb-8">
          <button
            class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 focus:outline-none"
          >
            Tambahkan ke Keranjang
          </button>
        </div>
        <div>
          <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Detail Produk:</h3>
          <ul class="list-disc list-inside text-gray-600 mt-2">
            <li>Fitur Utama 1</li>
            <li>Fitur Utama 2</li>
            <li>Fitur Utama 3</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Ulasan Produk -->
    <section class="bg-white mt-16">
      <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <h2
          class="text-center text-2xl sm:text-3xl font-bold tracking-tight text-gray-900 mb-8"
        >
          Read trusted reviews from our customers
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <blockquote
            class="rounded-lg bg-gray-50 p-6 shadow-sm flex flex-col justify-between"
          >
            <div class="flex items-center gap-4 mb-4">
              <img
                alt="Customer"
                src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                class="w-14 h-14 rounded-full object-cover"
              />
              <div>
                <div class="flex gap-0.5 text-green-500">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <!-- Tambahkan lebih banyak ikon bintang jika diperlukan -->
                </div>
                <p class="text-gray-900 font-medium">Paul Starr</p>
              </div>
            </div>
            <p class="text-gray-700">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt,
              a consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius
              accusamus error officiis atque voluptates magnam!
            </p>
          </blockquote>

          <!-- Tambahkan lebih banyak ulasan dengan struktur yang sama -->
        </div>
      </div>
    </section>
  </main>
</x-app-layout>
