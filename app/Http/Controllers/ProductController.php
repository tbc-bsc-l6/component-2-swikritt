<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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

    public function store(ProductRequest $request)
    {
  
   
    $product =Product::create($request->validated());

     return redirect()
     ->route('products.index')
     ->withSuccess("New product with id {$product->id } was created ");
     
    }

    public function show(Product $product)
    {
        //$product = DB::table('products')->where('id',$product)->get();
       // $product = DB::table('products')->where('id',$product)->first();

        return view (' products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit($product)
    {
     return view('products.edit')->with([
    'product' => Product::FindOrFail($product),
    ]);
    }

    public function update(ProductRequest $request,Product $product)
    {
 
        $product->update($request->validated());

        return redirect()
        ->route('products.index')
        ->withSuccess("The product with id {$product->id } was updated ");

    }

    public function destroy(Product $product)
    {
            
        $product->delete();

        return redirect()
        ->route('products.index')
        ->withSuccess("The product with id {$product->id } was removed ");


    }
}
