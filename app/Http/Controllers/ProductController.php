<?php

namespace App\Http\Controllers;

use App\Models\Shop;
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

        $shops=Shop::all();

        return view('product.create', compact('shops'));
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
            'description'=>$request->description,
            // 'image'=>$request->file('image')->store('public/image')
            // 'image'=>$request->has('image') ? $request->file('image')->store('public/image') : 'public/image/default.jpg'
            'image'=>$request->has('image') ? $request->file('image')->store('public/image') : null
        ]);

        //l'attach come funzione dei models é capace di gestire uno o piú dati contemporaneamente
        $product->shops()->attach($request->shops);

        return redirect(route('homePage'))->with('message','Hai memorizzato correttamente il prodotto!');

    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $shops=Shop::all();

        return view('product.edit', compact('product', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //dd($request->all(), $product);

        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$request->has('image') ? $request->file('image')->store('public/image') : null
        ]);

        $product->shops()->attach($request->shops);

        return redirect(route('homePage'))->with('message','Azione sul prodotto avvenuta correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        foreach ($product->shops as $shop) {
            //Prendiamo tutti i prodotti venduti nel negozio, ma di quei prodotti sgancio solo li'id del prodotto che voglio cancellare
            //lasciando in pace tutti gli altri
            $shop->products()->detach($product->id);
        }

        $product->delete();

        return redirect(route('homePage'))->with('message','Prodotto cancellato correttamente!');
    }
}
