<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $categories = Category::where('parent_id', null)->get();
        return view('admin.pages.category.form',compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'image'=>  'max:2048',
            'name' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Category::class;
            $image->imageable_id = $category->id;
            $image->project_position = 'category_image';
            $image->update();
//            $category->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/category');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $category, 'image', 'category_image');
        // }
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', null)->where('id','!=',$category->id)->get();
        return view('admin.pages.category.form', compact('category', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            // 'image' =>  'image|max:2048',
            'name' => 'required'
        ]);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->update();

        if ($request->image) {
            if (count($category->images)) {
                $category->projectImages('category_image')->first()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Category::class;
            $image->imageable_id = $category->id;
            $image->project_position = 'category_image';
            $image->update();
//            $category->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     if (count($category->images)) {
        //         $category->projectImages('category_image')->first()->delete();
        //     }
        //     $imageFile = $request->image->store('/public/category');
        // $this->saveImageModel($imageFile, $request->alt, $request->alt, $category, 'image', 'category_image');
        // }


        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->images()->delete();
        $category->delete();
        return response()->json(['message' => 'success']);
    }
}
