<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    // Halaman utama untuk menampilkan produk
    public function user()
    {
        $products = Product::paginate(12);
        return view('user', compact('products'));
    }

    // Dashboard admin (opsional)
    public function dashboard()
    {
        $products = Product::paginate(12);
        return view('dashboard', compact('products'));
    }

    // Detail produk (halaman pembelian)
    public function beli($id)
    {
        $products = Product::find($id);

        if (!$products) {
            return redirect()->route('user')->with('error', 'Produk tidak ditemukan.');
        }

        return view('beli', compact('products'));
    }

    // Pencarian produk
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        return view('products.search-results', compact('products', 'query'));
    }

    // Produk berdasarkan kategori
    public function kategori($kategori)
    {
        $products = Product::where('kategori', $kategori)->get();
        return view('products.kategori', compact('products'));
    }

    // Tambah produk ke keranjang
    public function addToCart($id)
    {
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
                'nama_produk' => $product->name, // Gunakan 'name' sesuai dengan database
                'harga' => $product->harga,
                'gambar' => $product->gambar,
                'quantity' => 1,
            ];
        }

        // Simpan kembali keranjang ke session
        session()->put('cart', $cart);

        // Tambahkan pesan flash untuk sukses
        session()->flash('success', 'Produk berhasil ditambahkan ke keranjang.');
        return redirect()->back();
    }

    // Hapus produk dari keranjang
    public function removeFromCart($id)
    {
        if (session()->has('cart')) {
            $cart = session('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
            }
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang.');
    }

    // Proses checkout dan arahkan ke WhatsApp
    public function processCheckout(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:1000',
        ]);

        // Ambil keranjang dari session
        $cart = session('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->route('user.checkout')->with('error', 'Keranjang kosong!');
        }

        // Buat pesan untuk WhatsApp
        $message = "*Checkout Pesanan*\n\n";
        $message .= "*Nama*: " . $validatedData['name'] . "\n";
        $message .= "*Email*: " . $validatedData['email'] . "\n";
        $message .= "*Nomor Telepon*: " . $validatedData['phone'] . "\n";
        $message .= "*Alamat*: " . $validatedData['address'] . "\n\n";

        $message .= "*Detail Produk:*\n";

        $totalHarga = 0;

        foreach ($cart as $item) {
            $message .= "- " . $item['nama_produk'] . " (x" . $item['quantity'] . ") - Rp. " . number_format($item['harga'] * $item['quantity'], 2, ',', '.') . "\n";
            $totalHarga += $item['harga'] * $item['quantity'];
        }

        $message .= "\n*Total Harga*: Rp. " . number_format($totalHarga, 2, ',', '.');

        // Kosongkan keranjang
        session()->forget('cart');

        // Encode pesan ke URL format
        $whatsappNumber = '6285158354600'; // Ganti dengan nomor WhatsApp tujuan
        $whatsappLink = "https://wa.me/$whatsappNumber?text=" . urlencode($message);

        // Redirect ke WhatsApp
        return redirect($whatsappLink);
    }

    // Menampilkan halaman checkout
    public function checkout()
    {
        if (!session()->has('cart') || count(session('cart')) == 0) {
            return redirect()->route('user')->with('error', 'Keranjang kosong!');
        }

        return view('checkout');
    }
}
