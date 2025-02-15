<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-28 mt-8">
        <h1 class="text-4xl font-inter font-semibold">Tambah Produk</h1>
        <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form class="flex gap-5" method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                @csrf
                <div class="w-1/2 ">
                    <img :src="imageUrl">
                </div>
                <div class="w-1/2">
                    <!-- Gambar -->
                    <div class="w-full">
                        <div class="mt-4">
                            <x-input-label for="gambar" :value="__('Foto')" />
                            <x-text-input accept="image/*" id="gambar" class="block mt-1 w-full border p-2" type="file" name="gambar" :value="old('gambar')" required @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Nama Barang -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Barang')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Harga -->
                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea id="deskripsi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <!-- Detail -->
                    <div class="mt-4">
                        <x-input-label for="detail" :value="__('Detail')" />
                        <textarea id="detail" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="detail" required>{{ old('detail') }}</textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>

                    <!-- Kategori Dropdown -->
                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <select id="kategori" name="kategori" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="processor" {{ old('kategori') == 'processor' ? 'selected' : '' }}>Processor</option>
                            <option value="ram" {{ old('kategori') == 'ram' ? 'selected' : '' }}>RAM</option>
                            <option value="motherboard" {{ old('kategori') == 'motherboard' ? 'selected' : '' }}>Motherboard</option>
                            <option value="cooler" {{ old('kategori') == 'cooler' ? 'selected' : '' }}>Cooler</option>
                            <option value="psu" {{ old('kategori') == 'psu' ? 'selected' : '' }}>Power Supply</option>
                            <option value="vga" {{ old('kategori') == 'vga' ? 'selected' : '' }}>Graphic Card</option>
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
