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
        
        ;

        return view ('products.index');
    }

    public function create()
    {
        return 'A form to create a product'; 
    }

    public function store()
    {
     //   return 'A form to create a product'; 
    }

    public function show($product)
    {
        //$product = DB::table('products')->where('id',$product)->get();
       // $product = DB::table('products')->where('id',$product)->first();
        $product = Product::findorFail($product);

        
        dd($product);


        return view ('products.show');
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
