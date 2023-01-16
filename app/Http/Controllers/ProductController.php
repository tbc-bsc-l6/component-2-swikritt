<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        

        return view ('products.index')->with([
        'products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create'); 
    }

    public function store()
    {
    //  $product = Product::create([
    //   'title' => request()->title,
    //   'description' =>request()->description,
    //   'price' => request()->price,
    //   'stock' => request()->stock,
    //   'status' => request()->status,
    //  ]); 

     $product =Product::create(request()->all());

    return $product;
    }

    public function show($product)
    {
        //$product = DB::table('products')->where('id',$product)->get();
       // $product = DB::table('products')->where('id',$product)->first();
        $product = Product::findorFail($product);


        return view ('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit($product)
    {
     return view('products.edit')->with([
    'product' => Product::FindOrFail($product),
    ]);
    }

    public function update($product)
    {
        $product = Product::findorFail($product);

        $product->update(request()->all());

        return $product;
    }

    public function destroy($product)
    {
     //   return 'A form to create a product'; 
    }
}
