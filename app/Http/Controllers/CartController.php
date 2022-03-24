<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        Cart::add( ['id' => $product->id, 'name' => $product->name, 'qty' => $request->qty??1, 'price' =>$product->price  ,'options' => ['size' => $request->size??'m'] ]);
        return redirect()->back()->withSuccess('Product added to cart successfully ');

    }
    public function removeProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->back()->withSuccess('Product removed from cart successfully');


    }
}
