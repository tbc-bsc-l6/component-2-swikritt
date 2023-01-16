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
     dd( 'In store');
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
        return "Showing the form to edit the product  {$product}";

    }

    public function update($product)
    {
     //   return 'A form to create a product'; 
    }

    public function destroy($product)
    {
     //   return 'A form to create a product'; 
    }
}
