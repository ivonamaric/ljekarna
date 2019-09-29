<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        $brands = Brand::pluck('name', 'id')->all();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);

            $input['file'] = $name;

        }

        $user->products()->create($input);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->all();
        $brands = Brand::pluck('name', 'id')->all();

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        //

        $product = Product::findOrFail($id);

        $input = request()->except(['_token', '_method']);

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
            $oldFile = $product->getOriginal('file');

            if (($name != $oldFile) && (Product::where('file', $oldFile)->where('id', '!=', $product->id)->count() == 0)) {
                $oldFile = $product->file;
                unlink(public_path() . $oldFile);
            }

            $product->update(['file' => $name]);

            $input = request()->except(['_token', '_method', 'file']);
        }

        Product::find($id)->update($input);

        return redirect()->route('products.edit', $id);

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
        Product::find($id)->delete();

        return redirect()->route('products.index');
    }

    public function showDeletedProducts()
    {
        $products = Product::onlyTrashed()->get();

        return view('admin.products.deleted', compact('products'));
    }

    public function deleteProductPermanent($id)
    {
        Product::withTrashed()->find($id)->forceDelete();

        return redirect()->route('products.deleted');
    }

    public function restoreProduct($id)
    {
        Product::withTrashed()->find($id)->restore();

        return redirect()->route('products.deleted');
    }

    public function details($id)
    {
        $product = Product::find($id);

        return view('home.details', compact('product'));
    }

    public function getProductByCategory($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('category_id', $id)->get();

        return view('admin.products.index', compact('categories', 'brands', 'products'));
    }

    public function getProductByBrand($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->get();

        return view('admin.products.index', compact('categories', 'brands', 'products'));
    }
}
