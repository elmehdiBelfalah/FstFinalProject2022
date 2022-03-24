<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $trending = Product::orderBy('rate' , 'DESC')->limit(8)->get();
        $carousel = Product::all()->random(6);
        $secondCarousel = Product::all()->random(5);
        return view('welcome', [
            'trending' => $trending,
            'carousel' => $carousel,
            'secondCarousel' => $secondCarousel,
        ]);
    }
}
