<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Checkout</h1>
        
        @if (session('cart') && count(session('cart')) > 0)
        <form action="{{ route('processCheckout') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Ringkasan Pesanan -->
                <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Ringkasan Pesanan</h2>
                    <ul class="space-y-4">
                        @php $totalHarga = 0; @endphp
                        @foreach (session('cart') as $id => $item)
                        <li class="flex justify-between items-center border-b pb-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama_produk'] }}" class="w-20 h-20 object-cover rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $item['nama_produk'] }}</p>
                                    <small class="text-gray-500">Rp. {{ number_format($item['harga'], 2, ',', '.') }}</small>
                                </div>
                            </div>
                            <p class="font-medium text-gray-800">x{{ $item['quantity'] }}</p>
                            @php $totalHarga += $item['harga'] * $item['quantity']; @endphp
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-6 border-t pt-4">
                        <div class="flex justify-between items-center">
                            <p class="font-medium text-gray-800">Subtotal</p>
                            <p class="font-medium text-gray-800">Rp. {{ number_format($totalHarga, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Formulir Pengisian -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Informasi Pengiriman</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required class="w-full border-gray-300 rounded-lg mt-1 p-2">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" required class="w-full border-gray-300 rounded-lg mt-1 p-2">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" required class="w-full border-gray-300 rounded-lg mt-1 p-2">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea id="address" name="address" required rows="3" class="w-full border-gray-300 rounded-lg mt-1 p-2"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg font-semibold">Lanjutkan Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @else
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <p class="text-gray-500">Keranjang Anda kosong.</p>
            <a href="{{ route('index') }}" class="text-indigo-600 hover:underline">Kembali Belanja</a>
        </div>
        @endif
    </div>
    </x-app-layout>
    