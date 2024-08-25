<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = new Banner();
        return view('admin.pages.banner.form',compact('banner'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'image'=>  'max:2048',
//            'alt' => 'required'
        ]);
        $banner = new Banner();
//        $banner->status  = $request->status ;
        $banner->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Banner::class;
            $image->imageable_id = $banner->id;
            $image->project_position = 'banner_image';
            $image->update();
//            $banner->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/material');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $banner, 'image', 'material_image');
        // }
        return redirect(route('banner.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.form', compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            // 'image' =>  'image|max:2048',
//            'service_id' => 'required|exists:services,id'
        ]);


        if ($request->image) {
            if (count($banner->images)) {
                $banner->projectImages('banner_image')->first()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Banner::class;
            $image->imageable_id = $banner->id;
            $image->project_position = 'banner_image';
            $image->update();
//            $banner->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     if (count($banner->images)) {
        //         $banner->projectImages('material_image')->first()->delete();
        //     }
        //     $imageFile = $request->image->store('/public/material');
        // $this->saveImageModel($imageFile, $request->alt, $request->alt, $banner, 'image', 'material_image');
        // }


        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->images()->delete();
        $banner->delete();
        return response()->json(['message' => 'success']);
    }
}
