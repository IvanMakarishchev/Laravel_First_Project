<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::find(1);
        dump($products->title);
        dump($products->content);
        dump($products->image);
        dump($products->likes);
        dump($products->is_published);
    }
}
