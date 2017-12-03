<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     p*
     * @return \Illuminate\Http\Response
     */

    public function store(Request $requests){

        $produk=new Product();
        $produk->name=$requests->nama_barang;
        $produk->slug=$requests->slug;
        $produk->description=$requests->description;
        $produk->price=$requests->price;
        $produk->category_id=$requests->category;

        $file=$requests->file('file_gambar');
        $filename=$file->getClientOriginalName();
        $requests->file('file_gambar')->move("img/", $filename);

        $produk->image=$filename;
        $produk->save();

        $products=Product::all();
        return view('product_details')->with('products',$products);
    }

    public function index()
    {
        //
        $products=Product::all();
        return view('shop')->with('products',$products);
    }

    public function show($slug)
    {
        //pro
        $product=Product::where('slug',$slug)->firstOrFail();
        $interested=Product::where('slug','!=',$slug)->get()->random(4);

        return view('product')->with(['product'=>$product, 'interested'=>$interested]);

    }

    public function food(){

        $products=Product::all()->where('category_id',1);
        return view('shop')->with('products',$products);

    }

    public function beverage(){

        $products=Product::all()->where('category_id',2);
        return view('shop')->with('products',$products);

    }

    public function merchandise(){

        $products=Product::all()->where('category_id',3);
        return view('shop')->with('products',$products);

    }

    public function subscriptionBox(){

        $products=Product::all()->where('category_id',4);
        return view('shop')->with('products',$products);

    }

    public function indexProductAdmin(){
        $products=Product::all();
        return view('product_details')->with('products',$products);
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        $products=Product::all();
        return view('product_details')->with('products',$products);
    }

}
