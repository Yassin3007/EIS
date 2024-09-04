<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::where('parent_id','!=', null)->get();
        return view('admin.pages.product.form',compact('product','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request ;
        $validated = $request->validate([
            //'image'=>  'max:2048',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',

        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->best_selling){
            $product->best_selling = 1 ;
        }
        $product->category_id = $request->category_id;
        $product->save();
        if ($request->images) {
            foreach($request->images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Product::class;
                $image->imageable_id = $product->id;
                $image->project_position='product_images';
                $image->update();

            }
        }
        if ($request->image) {
            $icon = Image::find($request->image);
            $icon->type = 'image';
            $icon->alt_en=$request->icon_alt_en;
            $icon->alt_ar=$request->icon_alt_ar;
            $icon->imageable_type = Product::class;
            $icon->imageable_id = $product->id;
            $icon->project_position='image';
            $icon->update();
            // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }
        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/category');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $product, 'image', 'category_image');
        // }
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('parent_id','!=', null)->get();
        return view('admin.pages.product.form', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
//        return $request;
        $validated = $request->validate([
            //'image'=>  'max:2048',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',

        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->best_selling){
            $product->best_selling = 1 ;
        }else {
            $product->best_selling = 0;
        }
        $product->category_id = $request->category_id;
        $product->update();
        if ($request->images) {
//            $product->projectImages('image')->delete();
            foreach($request->images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Product::class;
                $image->imageable_id = $product->id;
                $image->project_position='product_images';
                $image->update();

            }
        }
        if ($request->image) {
            $product->projectImages('image')->first()->delete();
            $icon = Image::find($request->image);
            $icon->type = 'image';
            $icon->alt_en=$request->icon_alt_en;
            $icon->alt_ar=$request->icon_alt_ar;
            $icon->imageable_type = Product::class;
            $icon->imageable_id = $product->id;
            $icon->project_position='image';
            $icon->update();
            // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }
        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/category');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $product, 'image', 'category_image');
        // }
        return redirect(route('product.index'));




        $validated = $request->validate([
            // 'image' =>  'image|max:2048',
            'name' => 'required'
        ]);
        $product->name = $request->name;
        $product->parent_id = $request->parent_id;
        $product->update();

        if ($request->image) {
            if (count($product->images)) {
                $product->projectImages('category_image')->first()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Category::class;
            $image->imageable_id = $product->id;
            $image->project_position = 'category_image';
            $image->update();
//            $product->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     if (count($product->images)) {
        //         $product->projectImages('category_image')->first()->delete();
        //     }
        //     $imageFile = $request->image->store('/public/category');
        // $this->saveImageModel($imageFile, $request->alt, $request->alt, $product, 'image', 'category_image');
        // }


        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->images()->delete();
        $product->delete();
        return response()->json(['message' => 'success']);
    }
}
