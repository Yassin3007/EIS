<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Material;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::latest()->paginate(10);
        return view('admin.pages.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $material = new Material();
        $services = Service::all();
        return view('admin.pages.material.form', compact('material', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'image'=>  'max:2048',
            'service_id' => 'required|exists:services,id'
        ]);
        $material = new Material();
        $material->name_en = $request->name_en;
        $material->name_ar = $request->name_ar;
        $material->description_en = $request->description_en;
        $material->description_ar = $request->description_ar;
        $material->service_id = $request->service_id;
        $material->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Material::class;
            $image->imageable_id = $material->id;
            $image->project_position = 'material_image';
            $image->update();
            $material->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/material');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $material, 'image', 'material_image');
        // }
        return redirect(route('material.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $services = Service::all();
        return view('admin.pages.material.form', compact('material', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            // 'image' =>  'image|max:2048',
            'service_id' => 'required|exists:services,id'
        ]);
        $material->name_en = $request->name_en;
        $material->name_ar = $request->name_ar;
        $material->description_en = $request->description_en;
        $material->description_ar = $request->description_ar;
        $material->update();

        if ($request->image) {
            if (count($material->images)) {
                $material->projectImages('material_image')->first()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Material::class;
            $image->imageable_id = $material->id;
            $image->project_position = 'material_image';
            $image->update();
            $material->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     if (count($material->images)) {
        //         $material->projectImages('material_image')->first()->delete();
        //     }
        //     $imageFile = $request->image->store('/public/material');
            // $this->saveImageModel($imageFile, $request->alt, $request->alt, $material, 'image', 'material_image');
        // }


        return redirect(route('material.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->images()->delete();
        $material->delete();
        return response()->json(['message' => 'success']);
    }
}
