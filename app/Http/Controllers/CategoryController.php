<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
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
    public function store(CategoryCreateRequest $request)
    {
        //
        Category::create($request->all());

        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('categories.index');
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
        $products = Product::where('category_id', $id)->count();

        if ($products == 0) {
            Category::find($id)->delete();
        } else {
            session()->put('error', 'Products of this category exists.Can\'t delete.');
            return redirect()->back();
        }

        return redirect()->route('categories.index');
    }

    public function showDeletedCategories()
    {
        $categories = Category::onlyTrashed()->get();

        return view('admin.categories.deleted', compact('categories'));
    }

    public function deleteCategoryPermanent($id)
    {
        Category::withTrashed()->find($id)->forceDelete();

        return redirect()->route('categories.deleted');
    }

    public function restoreCategory($id)
    {
        Category::withTrashed()->find($id)->restore();

        return redirect()->route('categories.deleted');
    }
}
