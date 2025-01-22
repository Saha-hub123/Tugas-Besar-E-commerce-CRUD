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
}
