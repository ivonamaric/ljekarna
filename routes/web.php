<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home.index');
})->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::resource('admin/products', 'ProductController');
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('admin/categories', 'CategoryController');
    Route::resource('admin/brands', 'BrandController');

    Route::get('admin/deleted/users', 'AdminUserController@showDeletedUsers')->name('users.deleted');
    Route::get('admin/delete/user/{id}', 'AdminUserController@deleteUserPermanent')->name('user.permanent');
    Route::get('admin/restore/user/{id}', 'AdminUserController@restoreUser')->name('user.restore');

    Route::get('admin/deleted/products', 'ProductController@showDeletedProducts')->name('products.deleted');
    Route::get('admin/delete/product/{id}', 'ProductController@deleteProductPermanent')->name('product.permanent');
    Route::get('admin/restore/product/{id}', 'ProductController@restoreProduct')->name('product.restore');

    Route::get('admin/deleted/categories', 'CategoryController@showDeletedCategories')->name('categories.deleted');
    Route::get('admin/delete/category/{id}', 'CategoryController@deleteCategoryPermanent')->name('category.permanent');
    Route::get('admin/restore/category/{id}', 'CategoryController@restoreCategory')->name('category.restore');

    Route::get('admin/deleted/brands', 'BrandController@showDeletedBrands')->name('brands.deleted');
    Route::get('admin/delete/brand/{id}', 'BrandController@deleteBrandPermanent')->name('brand.permanent');
    Route::get('admin/restore/brand/{id}', 'BrandController@restoreBrand')->name('brand.restore');

    Route::get('admin/category/{id}', 'ProductController@getProductByCategory')->name('admin_category');
    Route::get('admin/brand/{id}', 'ProductController@getProductByBrand')->name('admin_brand');
});

Route::get('category/{id}', 'HomeController@getProductByCategory')->name('category');
Route::get('brand/{id}', 'HomeController@getProductByBrand')->name('brand');

//details
Route::get('details/{id}', 'ProductController@details')->name('details');

Route::group(['middleware' => 'auth'], function () {

    //Cart

    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('cart/add/{id}', 'CartController@addToCart')->name('add_cart');
    Route::get('cart/delete/{id}', 'CartController@deleteFromCart')->name('delete_cart');
    Route::post('cart/update/{id}', 'CartController@updateCart')->name('update_cart');
    Route::get('buy', 'CartController@buyProducts')->name('buy');

//Bought items
    Route::get('transactions', 'TransactionController@index')->name('transaction');
    Route::get('order/{id}', 'TransactionController@getOrder')->name('order');

    Route::resource('account', 'AccountController');
});
