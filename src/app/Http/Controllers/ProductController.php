<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
    return view('product', compact('products'));
    }


}
