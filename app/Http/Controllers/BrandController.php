<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandCreateRequest;
use App\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateRequest $request)
    {
        //
        Brand::create($request->all());

        return redirect()->route('brands.index');
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
        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandCreateRequest $request, $id)
    {
        //
        $brand = Brand::findOrFail($id);

        $brand->update($request->all());

        return redirect()->route('brands.index');
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
        $products = Product::where('brand_id', $id)->count();

        if ($products == 0) {
            Brand::find($id)->delete();
        } else {
            session()->put('error', 'Products of this brand exists.Can\'t delete.');
            return redirect()->back();
        }

        return redirect()->route('brands.index');
    }

    public function showDeletedBrands()
    {
        $brands = Brand::onlyTrashed()->get();

        return view('admin.brands.deleted', compact('brands'));
    }

    public function deleteBrandPermanent($id)
    {
        Brand::withTrashed()->find($id)->forceDelete();

        return redirect()->route('brands.deleted');
    }

    public function restoreBrand($id)
    {
        Brand::withTrashed()->find($id)->restore();

        return redirect()->route('brands.deleted');
    }
}
