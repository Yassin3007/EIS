<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Label;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::latest()->paginate(10);
        return view('admin.pages.label.index',compact('labels'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        $services = Service::all();
        return view('admin.pages.label.form',compact('label','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'image'=>  'image|max:2048',
            'service_id'=>'required|exists:services,id'
        ]);
        $label = new Label();
        $label->name_en=$request->name_en;
        $label->name_ar=$request->name_ar;
        $label->description_en=$request->description_en;
        $label->description_ar=$request->description_ar;
        $label->service_id=$request->service_id;
        $label->save();

        if ($request->image) {

            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Label::class;
            $image->imageable_id = $label->id;
            $image->project_position = 'label_image';
            $image->update();
            $label->update(['image' => $image->url,]);
        }

        // if ($request->image) {
        //     $imageFile = $request->image->store('/public/label');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $label, 'image', 'label_image');
        // }
        return redirect(route('label.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        $services = Service::all();
        return view('admin.pages.label.form',compact('label','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        $validated = $request->validate([
            // 'image'=>  'image|max:2048',
            'service_id'=>'required|exists:services,id'
        ]);
        $label->name_en=$request->name_en;
        $label->name_ar=$request->name_ar;
        $label->description_en=$request->description_en;
        $label->description_ar=$request->description_ar;
        $label->update();

        if ($request->image) {
            if (count($label->images)) {
                $label->projectImages('label_image')->first()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = Label::class;
            $image->imageable_id = $label->id;
            $image->project_position = 'label_image';
            $image->update();
            $label->update(['image' => $image->url,]);
        }
        // if ($request->image) {
        //     if (count($label->images)) {
        //         $label->projectImages('label_image')->first()->delete();
        //     }
        //     $imageFile = $request->image->store('/public/label');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $label, 'image', 'label_image');
        //     }
        return redirect(route('label.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        $label->images()->delete();
        $label ->delete();
        return response()->json(['message'=>'success']);

    }
}
