<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        // dd($user);
        if($user->role=='user'){
             abort(404);
        }
    }
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
            'kategori' => 'required|string|in:ram,motherboard,processor',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('', $gambar->hashName());
    
       Product::create([
        'name' => $request->name,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar->hashName(),
        'detail' => $request->detail,
        'kategori' => $request->kategori,
       ]);

       return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan!');

    }

        public function edit(Product $product)
        {
            return view('products.edit', compact('product'));
        }   

        public function update(Request $request, Product $product)
        {
            // Validate the incoming data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'deskripsi' => 'required|string',
                'detail' => 'required|string',
                'kategori' => 'required|string|in:ram,motherboard,processor',
            ]);
        
            // Update the product with the validated data
            $product->name = $request->name;
            $product->harga = $request->harga;
            $product->deskripsi = $request->deskripsi;
            $product->detail = $request->detail;
            $product->kategori = $request->kategori; // Fixed this line
        
            // If a new image is uploaded, handle the image storage
            if ($request->file('gambar')) {
                // Delete the old image if it exists
                if ($product->gambar) {
                    Storage::disk('public')->delete('images/' . $product->gambar); // Ensure the path is correct
                }
        
                // Store the new image
                $gambar = $request->file('gambar');
                $gambarPath = $gambar->storeAs('images', $gambar->hashName(), 'public'); // Store the image in 'public/images/'
        
                // Update the product's image field with the new image path
                $product->gambar = $gambar->hashName();
            }
        
            // Save the updated product
            $product->save(); // Save the changes to the product
        
            // Redirect to the products index with a success message
            return redirect()->route('products.index')->with('success', 'Produk Berhasil Diedit!');
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
    
    public function kategori($kategori)
        {
            $products = Product::where( "kategori", $kategori)->get();
            //dd($products);
            return view('products.kategori', compact('products'));
        } 
}
