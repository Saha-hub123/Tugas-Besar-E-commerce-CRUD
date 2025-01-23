<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user(){
        {
            $products = Product::paginate(12);
    
            return view('user', compact('products'));
        }
    }

    public function dashboard(){
        {
            $products = Product::paginate(12);
    
            return view('dashboard', compact('products'));
        }
    }

    public function beli($id)
        {   
            $products = product::where( "id", $id)->first();
            return view('beli', compact('products'));
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
    
    public function addToCart($id)
        {
            // Periksa apakah pengguna sudah login
            // if (!Auth::check()) {
            //     return redirect()->route('login')->with('message', 'Silakan login untuk menambahkan produk ke keranjang.');
            // }
    
            // Cari produk berdasarkan ID
            $product = Product::find($id);
    
            if (!$product) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan!');
            }
    
            // Ambil keranjang dari session atau buat array kosong jika belum ada
            $cart = session()->get('cart', []);
    
            // Jika produk sudah ada di keranjang, tambahkan jumlahnya
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                // Jika produk belum ada di keranjang, tambahkan dengan quantity 1
                $cart[$id] = [
                    'nama_produk' => $product->nama_produk,
                    'harga' => $product->harga,
                    'gambar' => $product->gambar,
                    'quantity' => 1, // Tambahkan key quantity
                ];
            }
            // Simpan kembali keranjang ke session
            session()->put('cart', $cart);
            // Tambahkan pesan flash untuk sukses
            session()->flash('success', 'Produk berhasil ditambahkan ke keranjang.');
            // Arahkan kembali ke halaman sebelumnya
            return redirect()->back();
        }

    public function removeFromCart($id)
        {
            // Cek apakah ada produk dalam keranjang
            if (session()->has('cart')) {
                $cart = session('cart');
                
                // Hapus produk dari keranjang
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                    return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
                }
            }
            
            return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang');
        }

    
        public function processCheckout(Request $request)
        {
            // Validasi input pengisian formulir
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:1000',
            ]);
        
            // Ambil produk yang dipilih dari keranjang
            $selectedProducts = $request->input('selected_products');
        
            if (!$selectedProducts) {
                return redirect()->route('checkout')->with('error', 'Tidak ada produk yang dipilih!');
            }
        
            $cart = session('cart');
            $checkoutProducts = [];
        
            // Simpan produk yang dipilih
            foreach ($selectedProducts as $productId) {
                if (isset($cart[$productId])) {
                    $checkoutProducts[$productId] = $cart[$productId];
        
                    // Tandai produk sebagai sudah dibeli di sesi
                    session(['purchased_product_' . $productId => true]);
                    session(['purchase_date_' . $productId => now()->format('Y-m-d H:i:s')]);
                }
            }
        
            // Hapus produk yang dibeli dari keranjang
            foreach ($checkoutProducts as $productId => $product) {
                unset($cart[$productId]);
            }
        
            // Perbarui sesi keranjang dengan produk yang tersisa
            session(['cart' => $cart]);
        
            // Simpan informasi pengiriman dan pembayaran (misalnya ke database) jika perlu
            // Anda bisa menyimpan data seperti $validatedData['name'], $validatedData['email'], dsb.
        
            // Redirect ke halaman histori (atau halaman sukses)
            return redirect()->route('history')->with('success', 'Pembayaran berhasil! Produk yang dibeli dapat dilihat di histori.');
        }
        
    public function checkout()
        {
            // Cek apakah ada keranjang belanja
            if (!session()->has('cart') || count(session('cart')) == 0) {
                return redirect()->route('index')->with('error', 'Keranjang kosong!');
            }
    
            // Kirimkan data keranjang ke view checkout
            return view('checkout');
        }
}
