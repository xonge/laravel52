<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products',['products' => $products]);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/admin/products');
    }

    public function newProduct()
    {
        return view('admin.new');
    }

    public function add(Request $request)
    {
        $file = $request->file;
        // $extension = $file->getClientOriginalExtension();
        // Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        //
        // $entry = new \App\File();
        // $entry->mime = $file->getClientMimeType();
        // $entry->original_filename = $file->getClientOriginalName();
        // $entry->filename = $file->getFilename().'.'.$extension;
        //
        // $entry->save();

        $product  = new Product();
        // $product->file_id=$entry->id;
        $product->name =$request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->imageurl = $request->imageurl;

        $product->save();

        return redirect('/admin/products');
    }
}
