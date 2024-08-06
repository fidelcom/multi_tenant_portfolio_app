<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        $tax = Cart::tax();
//        dd($cart);
        return view('frontend.cart.cart_products', compact('cart', 'cartTotal', 'cartSubtotal', 'tax', 'cartQty'));
    }
    public function addToCart(Request $request, $id)
    {
        if (Session::has('coupon'))
        {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount == NULL)
        {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight' => $product->weight,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Item added to cart successfully!']);
        }
        else
        {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Item added to cart successfully!']);
        }
    }

    public function addToCartDetails(Request $request, $id)
    {
        if (Session::has('coupon'))
        {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount == NULL)
        {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Item added to cart successfully!']);
        }
        else
        {
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                ]
            ]);
            return response()->json(['success' => 'Item added to cart successfully!']);
        }
    }

    public function miniCart()
    {
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $tax = Cart::tax();
        return response()->json(array(
            'cart' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'tax' => $tax
        ));
    }

    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product removed from cart successfully!!']);
    }

    public function myCart()
    {
        return view('frontend.shop.mycart.view_cart');
    }

    public function getCartProduct()
    {
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        $tax = Cart::tax();
        return response()->json(array(
            'cart' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'tax' => $tax,
            'cartSubtotal' => $cartSubtotal
        ));
    }

    public function removeCartProduct($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon'))
        {
            $coupon_name =Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round((Cart::total() * $coupon->coupon_discount) / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100),
            ]);
        }
        return response()->json(['success' => 'Product removed from cart successfully!!']);
    }

    public function decrementCartProduct($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);
        if (Session::has('coupon'))
        {
            $coupon_name =Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round((Cart::total() * $coupon->coupon_discount) / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100),
            ]);
        }
        return response()->json(['success' => 'Product quantity decremented in cart successfully!!']);
    }

    public function incrementCartProduct($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);
//        {
//            $coupon_name =Session::get('coupon')['coupon_name'];
//            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
//            Session::put('coupon', [
//                'coupon_name' => $coupon->coupon_name,
//                'coupon_discount' => $coupon->coupon_discount,
//                'discount_amount' => round((Cart::total() * $coupon->coupon_discount) / 100),
//                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100),
//            ]);
//        }
        return response()->json(['success' => 'Product quantity incremented in cart successfully!!']);
    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();
        if ($coupon)
        {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round((Cart::total() * $coupon->coupon_discount) / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100),
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon applied successfully',
            ));
        }
        else
        {
            return response()->json([
                'error' => 'Invalid Coupon',
            ]);
        }
    }

    public function couponCalculation()
    {
        if (Session::has('coupon'))
        {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
                'tax' => Cart::tax()
            ));
        }
        else
        {
            return response()->json(array(
                'total' => Cart::total(),
                'subtotal' => Cart::subtotal(),
                'tax' => Cart::tax(),
            ));
        }
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json([
            'success' => 'Coupon remove successfully!'
        ]);
    }
}
