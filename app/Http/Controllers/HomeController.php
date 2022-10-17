<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function katalog()
    {
        return view('pages.katalog', [
            'products' => Product::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('pages.detail', [
            'products' => $product
        ]);
    }
}
