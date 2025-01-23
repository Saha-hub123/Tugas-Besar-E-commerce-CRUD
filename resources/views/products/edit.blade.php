<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-28 mt-8">
        <h1 class="text-4xl font-inter font-semibold">Edit Produk</h1>
        @include('products.partials.delete-product')
        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->gambar }}' }">
            <form class="flex gap-5" method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl">
                </div>

                <div class="w-1/2">
                    <!-- Gambar -->
                    <div class="w-full">
                        <div class="mt-4">
                            <x-input-label for="gambar" :value="__('Foto')" />
                            <x-text-input accept="image/*" id="gambar" class="block mt-1 w-full border p-2" type="file" name="gambar" :value="old('gambar')" @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Nama Barang -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Barang')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Harga -->
                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="$product->harga" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea id="deskripsi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="deskripsi" required>{{ $product->deskripsi }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <!-- Detail -->
                    <div class="mt-4">
                        <x-input-label for="detail" :value="__('Detail Produk')" />
                        <textarea id="detail" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="detail" required>{{ $product->detail }}</textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>

                    <!-- Kategori Dropdown -->
                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <select id="kategori" name="kategori" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="ram" {{ $product->kategori == 'ram' ? 'selected' : '' }}>RAM</option>
                            <option value="motherboard" {{ $product->kategori == 'motherboard' ? 'selected' : '' }}>Motherboard</option>
                            <option value="processor" {{ $product->kategori == 'processor' ? 'selected' : '' }}>Processor</option>
                        </select>
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <!-- Tombol Submit -->
                    <x-primary-button class="justify-center w-full mt-4 bg-indigo-600">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>

    <!-- Flash Message Alert -->
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
</x-app-layout>
