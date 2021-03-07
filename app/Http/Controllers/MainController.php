<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


/**
 * Главный контроллер для открытия страниц
 */
class MainController extends Controller
{
    public function index()
    {
        $products = Product::where('count', '>', 0)->orderBy('price')->get();
        return view('welcome', compact('products'));

    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));

    }

    public function product($code = null, $code_product)
    {
        $category = Category::where('code', $code)->first();
        $product = Product::where('code', $code_product)->first();
        return view('view', compact(['product','category']));
    }

}
