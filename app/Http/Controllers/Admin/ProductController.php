<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use Redirect;

class ProductController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $product_result = Product::select('id', 'name', 'price', 'discount_percentage', 'image', 'description', 'status')
                    ->where('status', '<>', 2)
                    ->orderBy("created_at", "DESC")
                    ->paginate(5);
        
        return view('admin.product_list', ['products' => $product_result]);
    }

    public function show($product_id)
    {
        $product_result = Product::select('id', 'name', 'price', 'discount_percentage', 'image', 'description', 'status')
                    ->where('id', $product_id)->firstOrFail();
        
        return view('admin.edit_product', ['product' => $product_result]);
    }

    public function add()
    {
        return view('admin.add_product');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'prod_name' => 'required',
                'prod_price' => 'required|numeric',
                'prod_description' => 'required',
                'prod_image' => 'required|image|mimes:jpeg,jpg,png,bmp|max:2048|min:20'
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $filename = '';

        if ($request->hasFile('prod_image')) {
            $image = $request->file('prod_image');
            $filename = 'prod_'.time().'.'.$image->getClientOriginalExtension();
            $fileSize = $image->getSize(); //get size of image file

            if($fileSize > 33000){ //Image size is greater than 33 KB.
                $image_resize = Image::make($image->getRealPath());
                $height = $image_resize->height()/4; //get 1/4th of image height

                $width = $image_resize->width()/4; //get 1/4th of image width

                $image_resize->resize(200, 200);
                // $image_resize->resize($width, $height);
                $image_resize->save(public_path('product_images/' .$filename));
            } else {
                $destinationPath = public_path('/product_images');
                $image->move($destinationPath, $filename);
            }
        }

        $product = new Product;
        $product->name = $request->prod_name;
        $product->price = $request->prod_price;
        $product->discount_percentage = $request->prod_discount_percentage;
        $product->description = $request->prod_description;
        $product->image = $filename;
        $product->status = 1;
        $product->save();

        return redirect('admin/product/list')->with('status', 'Product has been added successfully');
    }

    public function update(Request $request, $product_id)
    {
        $validator = Validator::make($request->all(), [
                'prod_name' => 'required',
                'prod_price' => 'required|numeric',
                'prod_description' => 'required',
                'prod_image' => 'image|mimes:jpeg,jpg,png,bmp|max:2048|min:20'
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $post_data = [
            'name' => $request->prod_name,
            'price' => $request->prod_price,
            'discount_percentage' => $request->prod_discount_percentage,
            'description' => $request->prod_description
        ];

        if ($request->hasFile('prod_image')) {
            $image = $request->file('prod_image');
            $filename = 'prod_'.time().'.'.$image->getClientOriginalExtension();
            $fileSize = $image->getSize(); //get size of image file

            if($fileSize > 33000){ //Image size is greater than 33 KB.
                $image_resize = Image::make($image->getRealPath());
                $height = $image_resize->height()/4; //get 1/4th of image height

                $width = $image_resize->width()/4; //get 1/4th of image width

                $image_resize->resize(200, 200);
                // $image_resize->resize($width, $height);
                $image_resize->save(public_path('product_images/' .$filename));
            } else {
                $destinationPath = public_path('/product_images');
                $image->move($destinationPath, $filename);
            }

            $post_data['image'] = $filename;
        }

        $product = Product::where('id', $product_id)->firstOrFail();
        $product->update($post_data);

        return redirect('admin/product/list')->with('status', 'Product has been updated successfully');
    }

    public function status($product_id)
    {
        $product = Product::where('id', $product_id)->firstOrFail();
        $product->update(['status' => request("product_status_".$product_id)]);
        
        return redirect('admin/product/list')->with('status', 'Product status has been updated successfully');
    }

    public function delete($product_id)
    {
        $product = Product::where('id', $product_id)->firstOrFail();
        $product->update(['status' => 2]);
        
        return redirect('admin/product/list')->with('status', 'Product has been deleted successfully');
    }
}
