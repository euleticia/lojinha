<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductController extends Controller
{
    public function index(){

        $search = request('search');

        if($search) {
            
            $products = Products::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $products = Products::all();

        }
                
        return view('welcome',['products' => $products, 'search' => $search]);
           
    }

    public function store(Request $request){
        
        $product = new Products;
        
        $user = auth()->user();

       $product->user_id = $user->id;

       $product->save();

       return redirect('/carrinho')->with('msg', 'Produto adicicionado ao carrinho!');

    }

    

    public function show($id){

        $product = Products::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }

    public function addCart($id){

        $user = auth()->user();
        
        // $user->productToCar()->attach($id);

        $product = Products::findOrFail($id);

        return redirect('/carrinho')->with('msg', 'Produto adicionado ao carrinho' . $product->nome);

    }
}
