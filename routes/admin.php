<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::group(['prefix' => 'admin'], function()
{
	// Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::get('/login', 'App\Http\Controllers\Admin\AuthController@login');
	Route::get('/register', 'App\Http\Controllers\Admin\AuthController@register');
	Route::post('/register', 'App\Http\Controllers\Admin\Auth\RegisterController@register');
	Route::get('/logout', 'App\Http\Controllers\Admin\Auth\LoginController@logout');
    Route::post('/login', 'App\Http\Controllers\Admin\Auth\LoginController@login');

	Route::group(['middleware' => ['admin']], function () {
		Route::middleware(['auth.admin'])->group(function () {
			Route::get('/', function () {
			    return view('admin.index');
			});
			
			Route::get("/list", 'App\Http\Controllers\Admin\AdminUserController@list');

			Route::get("/product/list", 'App\Http\Controllers\Admin\ProductController@list');
			Route::get("/product/add", 'App\Http\Controllers\Admin\ProductController@add');
			Route::post("/product/save", 'App\Http\Controllers\Admin\ProductController@save');
			Route::get('/product/{product}/edit', 'App\Http\Controllers\Admin\ProductController@show');
			Route::post('/product/{product}/update', 'App\Http\Controllers\Admin\ProductController@update');
		    Route::post('/product/{product}/status', 'App\Http\Controllers\Admin\ProductController@status');
		    Route::post('/product/{product}/delete', 'App\Http\Controllers\Admin\ProductController@delete');
			
			Route::get("/customer/list", 'App\Http\Controllers\Admin\CustomerController@list');
		});
	});
});