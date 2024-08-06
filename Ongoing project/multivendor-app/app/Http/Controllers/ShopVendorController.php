<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShopVendorController extends Controller
{
    public function index()
    {
        $vendors = User::where('role', 'vendor')->orderBy('name', 'ASC')->paginate(16);
        return view('frontend.vendor.vendor_list', compact('vendors'));
    }

    public function vendorStore(User $user)
    {
        $vendor = $user;
        $products = Product::where('vendor_id', $user->id)->latest()->paginate(30);
        return view('frontend.vendor.vendor_product', compact('vendor', 'products'));
    }
}
