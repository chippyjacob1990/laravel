<?php

namespace App\Http\Controllers\SampleProducts;

use App\Http\Controllers\Controller;

class SampleProductController extends Controller
{

    public function view() {
        $text = "<h5>Sample Products</h5>";
        $products = ["Soap", "Toothpaste"];
        $app_name = config('app.name');
        return view('productlist', compact('products', 'text', 'app_name'));
    }
    public function index() {
        return view('products');
    }

    public function list($userid) {
        return view('users', $userid);
    }
}
