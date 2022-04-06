<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ProductModel;
use App\CartModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function index(Request $request)
    {
        //Auth::id();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartModel($oldCart);
        return view('cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'totalQty' => $cart->totalQty
        ]);
    }

    public function getAddToCart(Request $request)
    {
        $id = $request->input('id');
        $product = ProductModel::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartModel($oldCart);
        $cart->add($product, $product->id);
        //return dd($cart);
        Session::put('cart', $cart);
        return redirect('/');
    }

    public function increaseByOne($id)
    {
        $cart = new CartModel(Session::get('cart'));
        $cart->increaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@index');
    }

    public function decreaseByOne($id)
    {
        $cart = new CartModel(Session::get('cart'));
        $cart->decreaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@index');
    }

    public function removeItem($id)
    {
        $cart = new CartModel(Session::get('cart'));
        $cart->removeItem($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@index');
    }

    public function clearCart()
    {
        if (session()->has('cart')) {
            session()->forget('cart');
        }
        return redirect('/');
    }
}
