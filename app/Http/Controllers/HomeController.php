<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product_result = Product::select('id', 'name', 'price', 'discount_percentage', 'image', 'description')
                    ->where('status', '=', 1)
                    ->orderBy("id", "DESC")
                    ->paginate(5);
        return view('home', ['products' => $product_result]);
    }
}
