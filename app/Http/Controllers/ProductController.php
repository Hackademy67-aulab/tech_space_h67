<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products=Product::all();//select * from products

        //dd($products);

        return view('product.index', compact('products'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        //dd($request->all());

        // $product= new Product();
        // $product->name=$request->name;
        // $product->price=$request->price;
        // $product->description=$request->description;
        // $product->ciccia="Ma che cos e' la scoteca!??";

        // //Si ma dove li stai memorizzando nel db?
        // $product->save();//qua

        //Mass Assignment
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description
        ]);

        return redirect(route('homePage'))->with('message','Hai memorizzato correttamente il prodotto!');

    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }
}
