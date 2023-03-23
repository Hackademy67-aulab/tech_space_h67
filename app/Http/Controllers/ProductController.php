<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){

        $products=Product::all();//select * from products
        
        // $products=Product::where('price', '>' , 200)->get();//prendimeli tutti
        // $products=Product::where('price', '>' , 200)->first();//prendimi solo il primo
        // $products=Product::where('price', '>' , 200)->orderBy('price', 'DESC')->get();
        // $products=Product::where('price', '>' , 200)->orderBy('price', 'DESC')->first();
        // NEL NOSTRO CASO NON FUNZIONA PERCHÉ I PREZZI SONO STRINGHE E NON RIESCE A FARE LA CONVERSIONE CORRETTAMENTE
        // NEI CASI PRECEDENTI HA FUNZIONATO PERCHÉ DOPO LA WHERE VENIVANO TRADOTTI IN NUMERI
        // LA SINTASSI DELL'ORDER BY PERÓ É CORRETTA
        // $products=Product::orderBy('price', 'DESC')->get();
        // dd($products);

        return view('product.index', compact('products'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductRequest $request){
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
            'description'=>$request->description,
            // 'image'=>$request->file('image')->store('public/image')
            // 'image'=>$request->has('image') ? $request->file('image')->store('public/image') : 'public/image/default.jpg'
            'image'=>$request->has('image') ? $request->file('image')->store('public/image') : null
        ]);

        return redirect(route('homePage'))->with('message','Hai memorizzato correttamente il prodotto!');

    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }
}
