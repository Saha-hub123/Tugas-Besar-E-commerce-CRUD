<x-app-layout>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-28 mt-32">
    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Gambar Produk -->
      <div class="flex justify-center">
        <img
          src="{{ url('storage/' . $products->gambar) }}"
          alt="Gambar Produk"
          class="w-[460px] h-[460px] object-cover rounded-xl shadow-xl"
        />
      </div>

      <!-- Detail Produk -->
      <div class="flex-1">
        <h1 class="text-6xl font-bold text-gray-800">
          {{ $products->name }}
        </h1>
        <h1 class="text-xl font-semibold mt-4">Mulai Dari</h1>
        <p class="text-gray-800 text-xl sm:text-2xl font-bold">
          Rp. {{ number_format($products->harga) }}
        </p>
        <div class="mb-2"></div>
        <div class="w-3/4">
          <p>{{ $products->deskripsi}}</p>
          <h1 class="text-lg sm:text-2xl font-semibold text-gray-800 mt-8">Detail Produk</h1>
          <h1 class="">{{ $products->detail }}</h1>
        </div>
        <!-- Button to trigger pop-up -->
        <an class="flex items-center gap-4 mt-4">
        <button id="buyNowBtn" class="w-1/3 bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg font-semibold">
          Buy Now
        </button>
        <!-- Form Tombol Keranjang -->
        <form action="{{ route('addToCart', $products->id) }}" method="POST" class="w-1/6">
            @csrf
            <button type="submit"
              class="w-full bg-white border border-gray-600 hover:bg-gray-300  px-4 py-2 rounded-lg font-semibold flex items-center justify-center">
              <img src="https://cdn-icons-png.flaticon.com/128/3144/3144456.png" class="block h-6 w-auto"
                alt="Keranjang">
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Pop-up Modal for Confirmation -->
    <div id="popupModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
      <div class="bg-white rounded-lg shadow-xl p-6 w-3/4 max-w-2xl relative">
        <button id="closeBtn" class="absolute top-4 right-4 text-2xl font-bold">&times;</button>
        <h2 class="text-3xl font-semibold text-gray-800">Konfirmasi Pembelian</h2>
        <div class="mt-4 flex gap-6">
          <img id="productImage" class="w-32 h-32 object-cover rounded-xl shadow-md" alt="Product Image" />
          <div class="flex-1">
            <p class="text-xl font-semibold" id="productName"></p>
            <p class="text-md text-gray-600" id="productDescription"></p>
            <p class="text-lg text-gray-800 font-bold" id="productPrice"></p>
            <input type="text" id="productAddress" placeholder="Alamat Pengiriman" class="w-full p-2 border border-gray-300 rounded-lg mt-4" required />
          </div>
        </div>
        <button id="confirmBuyBtn" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg mt-4 font-semibold">
          Konfirmasi Pembelian
        </button>
      </div>
    </div>
  </main>

  <script>
    // Ambil elemen-elemen penting
    const buyNowBtn = document.getElementById('buyNowBtn');
    const popupModal = document.getElementById('popupModal');
    const closeBtn = document.getElementById('closeBtn');
    const productImage = document.getElementById('productImage');
    const productName = document.getElementById('productName');
    const productDescription = document.getElementById('productDescription');
    const productPrice = document.getElementById('productPrice');
    const productAddress = document.getElementById('productAddress');
    const confirmBuyBtn = document.getElementById('confirmBuyBtn');

    // Tampilkan pop-up ketika tombol "Buy Now" diklik
    buyNowBtn.addEventListener('click', function() {
      // Set data produk di modal
      productImage.src = "{{ url('storage/' . $products->gambar) }}";
      productName.textContent = "{{ $products->name }}";
      productDescription.textContent = "{{ $products->deskripsi }}";
      productPrice.textContent = "Rp. {{ number_format($products->harga) }}";

      // Tampilkan modal
      popupModal.classList.remove('hidden');
    });

    // Tutup pop-up ketika tombol close diklik
    closeBtn.addEventListener('click', function() {
      popupModal.classList.add('hidden');
    });

    // Kirim WhatsApp setelah konfirmasi pembelian
    confirmBuyBtn.addEventListener('click', function() {
      const address = productAddress.value;

      if (!address) {
        alert("Alamat pengiriman harus diisi!");
        return;
      }

      // Menyusun pesan WhatsApp
      const message = `Hi, saya ingin membeli produk berikut:\n\nProduk: ${productName.textContent}\nDeskripsi: ${productDescription.textContent}\nHarga: ${productPrice.textContent}\nAlamat: ${address}`;

      // Encode pesan dan buka WhatsApp
      const encodedMessage = encodeURIComponent(message);
      window.open(`https://wa.me/6285158354600?text=${encodedMessage}`, "_blank");

      // Tutup modal setelah mengirim pesan
      popupModal.classList.add('hidden');
    });
  </script>
</x-app-layout>
