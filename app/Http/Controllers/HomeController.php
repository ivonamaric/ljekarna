<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all()->where('quantity', '>', 0);

        if (!$products->isEmpty()) {
            if (count($products) > 9) {
                $products = $products->random(9);
            }
        }

        return view('home.index', compact('categories', 'brands', 'products'));
    }

    public function getProductByCategory($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('category_id', $id)->where('quantity', '>', 0)->get();

        return view('home.index', compact('categories', 'brands', 'products'));
    }

    public function getProductByBrand($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->where('quantity', '>', 0)->get();

        return view('home.index', compact('categories', 'brands', 'products'));
    }
}
