<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'detail' => 'required|string',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('', $gambar->hashName());
    
       Product::create([
        'name' => $request->name,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar->hashName(),
        'detail' => $request->detail,
       ]);

       return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan!');

    }

        public function edit(Product $product)
        {
            return view('products.edit', compact('product'));
        }   

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'detail' => 'required|string',
        ]);

        $product->name = $request->name;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->detail = $request->detail;

        if($request->file('gambar'))
        {
            Storage::disk('local')->delete('public/', $product->gambar);
            $gambar = $request->file('gambar');
            $gambar->storeAs('', $gambar->hashName());
            $product->gambar = $gambar->hashName();


        $product->update();

        return redirect()->route('products.index')->with('success', 'Produk Berhasil Diedt!');
        }
    }

    public function destroy(Product $product)
    {
        // Hapus gambar dari storage jika ada
        if ($product->gambar) {
            Storage::delete('' . $product->gambar);
        }
    
        // Hapus produk dari database
        $product->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function search(Request $request)
    {
        // Ambil query pencarian dari input pengguna
        $query = $request->input('query');

        // Cari produk berdasarkan nama atau deskripsi
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        // Tampilkan hasil ke view
        return view('products.search-results', compact('products', 'query'));
    }
       
}
