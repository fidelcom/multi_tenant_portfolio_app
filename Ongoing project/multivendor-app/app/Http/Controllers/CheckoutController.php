<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            if (Cart::total() > 0)
            {
                $cart = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $cartSubtotal = Cart::subtotal();
                $tax = Cart::tax();
                $divisions = State::orderBy('name', 'ASC')->get();
                return view('frontend.cart.checkout', compact('cart', 'cartQty', 'cartTotal', 'tax', 'cartSubtotal', 'divisions'));
            }
            else
            {
                return redirect()->back()->with([
                    'message' => 'Shop at least one product',
                    'alert-type' => 'error'
                ]);
            }
        }
        else
        {
            return redirect()->route('login')->with([
                'message' => 'You need to login first!',
                'alert-type' => 'error'
            ]);
        }
//        return view('frontend.cart.checkout');
    }

    public function Checkout()
    {

    }
}
