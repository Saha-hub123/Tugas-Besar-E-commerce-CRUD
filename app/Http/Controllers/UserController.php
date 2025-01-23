<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
