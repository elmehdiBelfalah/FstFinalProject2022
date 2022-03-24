<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Faker\Generator;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $faker= new Generator();
        
        $order = Auth::user()->orders()->create([
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'total' => Cart::subtotal()
        ]);
      dd($order);
        $order->update(['reference' => rand(11111111111 , 999999999)]);
        foreach (Cart::content() as $product) {
            $order->products()->attach([$product->id => ['quantity' => $product->qty, 'price' => $product->price]]);
        }
        Cart::destroy();
        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('checkout.index', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //    $order-   
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payed(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 2;
        $order->save();
        return view('checkout.index', [
            'order' => $order
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reviewd(Request $request)
    {

        $order = Order::find($request->id);
        $order->status = 3;
        $order->save();
        return view('checkout.index', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
