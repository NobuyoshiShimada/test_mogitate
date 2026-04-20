<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
         $sort = $request->input('sort');

         $query = Product::query();

         if(!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

                if ($sort === 'price_low') {
            $query->orderBy('price', 'asc');
            } elseif ($sort === 'price_high') {
                $query->orderBy('price', 'desc');
            } else{
                $query->latest();
            }

            $products = $query->paginate(6);

            return view('product',compact('products', 'keyword', 'sort'));

         $products = Product::paginate(6);
        return view('product', compact('products'));

    }



}



