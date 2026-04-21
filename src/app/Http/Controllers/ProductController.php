<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 商品一覧
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

    //商品詳細
    public function show($productID)
    {
        $product = Product::with('seasons')->findOrFail($productID);
        $seasons = Season::all();

        return view('detail', compact('product', 'seasons'));
    }

    // 商品の更新
    public function update(Request $request, $id)
    {
        return redirect()->route('products.index');
    }

    // 商品の削除
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }


}



