<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ImageController extends Controller
{
    public function index($id){
    	$product = Product::find($id);
    	$images = $product->images;
    	return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request, $id){
    	// guardar la imagen en nuestro proyecto
        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $filename = uniqid().$file->getClientOriginalName();
        $file->move($path, $filename);
        
        //crear un registro en la tabla product_images
        $productImage = new ProductImage();
        $productImage->image = $filename;
        //$productImage->featured = false;
        $productImage->product_id = $id;
        $productImage->save();

        return back();
    }

    public function destroy(){
    	
    }
}
