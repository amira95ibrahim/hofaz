<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;


class CartController extends BaseController
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
//         dd($cartItems);
       $categories = Category::active()->take(7)->get();

        return view('front.cart', compact('cartItems','categories'));
    }


    public function addToCart(Request $request)
    {

        if($item = Cart::get($request->id)){
            Cart::update($request->id, array(
                'price' => $item->price + $request->price
            ));
            return true;
        }

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => (int) $request->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $request->image,
                'model' => $request->model,
                'model_id' => $request->model_id,
            )
        ]);

        return true;
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);

        return true;
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
