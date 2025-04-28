<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Front.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('Front.products.show', compact('product'));
    }
}