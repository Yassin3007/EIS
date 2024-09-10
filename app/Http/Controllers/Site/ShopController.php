<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::orderBy('created_at','desc')->paginate(20);
        return view('site.shop',compact('products'));
    }
    public function category_products($id)
    {
        $products = Product::where('category_id',$id)->orderBy('created_at','desc')->paginate(20);
        return view('site.shop',compact('products'));
    }
}
