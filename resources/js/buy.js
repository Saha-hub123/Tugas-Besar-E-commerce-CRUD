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