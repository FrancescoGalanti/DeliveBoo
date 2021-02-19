<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;


class CartController extends Controller
{
    public function add(Dish $dish){

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $dish->id => [
                    'name' => $dish->name,
                    'quantity' => 1,
                    'price' => $dish->price,                  
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        if(isset($cart[$dish->id])){
            $cart[$dish->id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        $cart[$dish->id] = [
            'name' => $dish->name,
            'quantity' => 1,
            'price' => $dish->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', "added to cart");
    }


        // dd($dish);
        // \Cart::session($sessionKey);

        // add the product to cart
        // \Cart::session($dish)->add(array(
        //     'id' => uniqid($dish->id),
        //     'name' => $dish->name,
        //     'price' => $dish->price,
        //     'quantity' => 4,
        //     'attributes' => array(),
        //     'associatedModel' => $dish
        // ));

        // return redirect()->route('cart.index');

        public function remove($id){
            $cart = session()->get('cart');

            if(isset($cart[$id])){
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', "added to cart");
        }
        
        
        public function index(){
            return view('cart.index');
        }
}

