<x-app-layout>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    @if ($products->isEmpty())
        <p class="mt-7">Mohon maaf, Produk belum tersedia !</p>
    @else
        <ul>
       
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
            <h1 class="text-3xl sm:text-4xl font-semibold">Kategori {{ ucfirst($products->first()->kategori) }}</h1> <!-- Get the category from the first product -->
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
                        <a href="{{ route('beli', $product) }}">
                            <button
                                class="w-full bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg mt-4 font-semibold"
                            >
                                Buy Now
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
            
        
        </ul>
    @endif

</x-app-layout>
