<section class="space-y-6">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Product') }}</x-danger-button>

    <x-modal name="Konfirmasi Hapus Produk">
        <form method="post" action="{{ route('products.destroy', $product) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah kamu yakin ingin menghapus Produk ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Jika produkmu dihapus, Semua data yang produk itu akan terhapus') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus Produk') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
