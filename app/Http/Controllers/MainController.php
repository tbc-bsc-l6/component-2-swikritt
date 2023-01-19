<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $min_price = null;
        $max_price = null;
        $name = null;
        $sorting = null;

        $products = Product::available();
        if ($request->min_price){
            $products->where('price','>=', $request->min_price);
            $min_price = $request->min_price;
        }
        if ($request->max_price){
            $products->where('price','<=', $request->max_price);
            $max_price = $request->max_price;
        }
        if ($request->name){
            $products->where('title', 'LIKE', '%'.$request->name.'%');
            $name = $request->name;
        }
        if ($request->sorting){
            if ($request->sorting == "asc"){
                $products->orderBy('id','asc');
            }
            if ($request->sorting == "desc"){
                $products->orderBy('id','desc');
            }
            $sorting = $request->sorting;
        }
        $products = $products->paginate(10);
        return view('welcome')->with([
            'products' => $products,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'name' => $name,
            'sorting' => $sorting,
        ]) ;
    }
}
