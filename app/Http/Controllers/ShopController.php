<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $brands = Brand::all();
        $query = Product::orderBy('created_at', 'desc');
        if ($request->keyword) {
            // This will only execute if you received any keyword
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }
        if ($request->brands ) {
            // This will only execute if you received any keyword
            $query = $query->whereIn('brand_id',$request->brands );
        }
        if ($request->categories) {
            // This will only execute if you received any keyword
            $query = $query->whereIN('category_id', $request->categories);
        }
        if ($request->min_price && $request->max_price) {
            // This will only execute if you received any price
            // Make you you validated the min and max price properly
            $query = $query->where('price', '>=', $request->min_price);
            $query = $query->where('price', '<=', $request->max_price);
        }
        $products = $query->paginate(9);

        return view('shop', [
            'products' => $products, 'categories' => $categories, 'brands' => $brands
        ]);
    }
}
