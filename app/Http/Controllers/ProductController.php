<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store()
    {
    //  $product = Product::create([
    //   'title' => request()->title,
    //   'description' =>request()->description,
    //   'price' => request()->price,
    //   'stock' => request()->stock,
    //   'status' => request()->status,
    //  ]); 
     $rules = [
        'title' => ['required','max:255'],
        'description' => ['required','max:1000'],
        'stock' => ['required','min:1'],
        'price' => ['required','min:0'],
        'status' => ['required','in:available,unavailable'],
        ];

        request()->validate($rules);
    

    if (request()->stock == 0 && request()-> status == 'available'){

    return redirect()
       ->back()
       ->withInput(request()->all())
       ->withErrors('If avilable must have stock');
    }
 
    $product =Product::create(request()->all());

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

    public function update(Product $product)
    {
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'stock' => ['required','min:1'],
            'price' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
            ];
    
            request()->validate($rules);

        $product->update(request()->all());

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
