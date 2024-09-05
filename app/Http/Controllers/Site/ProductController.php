<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_details($id){
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->where('id','!=',$product->id)->limit(8)->get();
        return view('site.product_details',compact('product','related_products'));
    }
}
