<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<h1>Berikut hasil pencarian anta untuk: "{{ $query }}"</h1>

    @if ($products->isEmpty())
        <p>Tidak ada produk yang ditemukan.</p>
    @else
        <ul>
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
        </ul>
    @endif
</x-app-layout>