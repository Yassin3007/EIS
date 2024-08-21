<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::latest()->paginate(10);
        return view('admin.pages.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        return view('admin.pages.service.form',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
                'name_en'=>  'required',
                'name_ar'=>  'required',
                'description_en'=>  'required',
                'description_ar'=>  'required',
                'metal_title_en'=>  'required',
                'metal_title_ar'=>  'required',
                'metal_description_en'=>  'required',
                'metal_description_ar'=>  'required',
                'image'=>  'required',
                'cover'=>  'required',
            ]);
            $service = new Service();
            $service->name_en=$request->name_en;
            $service->name_ar=$request->name_ar;
            $service->description_en=$request->description_en;
            $service->description_ar=$request->description_ar;
            $service->metal_title_en=$request->metal_title_en;
            $service->metal_title_ar=$request->metal_title_ar;
            $service->metal_description_en=$request->metal_description_en;
            $service->metal_description_ar=$request->metal_description_ar;
            $service->save();

            if ($request->image) {

                $image = Image::find($request->image);
                $image->type = 'image';
                $image->alt_en = $request->image_alt_en;
                $image->alt_ar = $request->image_alt_ar;
                $image->imageable_type = service::class;
                $image->imageable_id = $service->id;
                $image->project_position = 'service_icon';
                $image->update();
                $service->update(['image' => $image->url,]);
            }
        if ($request->cover) {

            $image = Image::find($request->cover);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = service::class;
            $image->imageable_id = $service->id;
            $image->project_position = 'cover';
            $image->update();
            $service->update(['image' => $image->url,]);
        }
            // if ($request->icon) {
            //     $imageFile = $request->icon->store('/public/service');
            //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $service, 'image', 'service_icon');
            // }
            return redirect(route('service.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.pages.service.form',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name_en'=>  'required',
            'name_ar'=>  'required',
            'description_en'=>  'required',
            'description_ar'=>  'required',
            'metal_title_en'=>  'required',
            'metal_title_ar'=>  'required',
            'metal_description_en'=>  'required',
            'metal_description_ar'=>  'required',

        ]);
        $service->name_en=$request->name_en;
        $service->name_ar=$request->name_ar;
        $service->description_en=$request->description_en;
        $service->description_ar=$request->description_ar;
        $service->metal_title_en=$request->metal_title_en;
        $service->metal_title_ar=$request->metal_title_ar;
        $service->metal_description_en=$request->metal_description_en;
        $service->metal_description_ar=$request->metal_description_ar;
        $service->update();

        if ($request->image) {
            if ($service->projectImages('service_icon')->last()) {
                $service->projectImages('service_icon')->last()->delete();
            }
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = service::class;
            $image->imageable_id = $service->id;
            $image->project_position = 'service_icon';
            $image->update();
            $service->update(['image' => $image->url,]);
        }
        if ($request->cover) {
            if ($service->projectImages('cover')->last()) {
                $service->projectImages('cover')->last()->delete();
            }
            $image = Image::find($request->cover);
            $image->type = 'image';
            $image->alt_en = $request->image_alt_en;
            $image->alt_ar = $request->image_alt_ar;
            $image->imageable_type = service::class;
            $image->imageable_id = $service->id;
            $image->project_position = 'cover';
            $image->update();
            $service->update(['image' => $image->url,]);
        }
        // if ($request->icon) {
        //     if (count($service->images)) {
        //         $service->projectImages('service_icon')->first()->delete();
        //     }
        //     $imageFile = $request->icon->store('/public/service');
        //     $this->saveImageModel($imageFile, $request->alt, $request->alt, $service, 'image', 'service_icon');
        //     }
        return redirect(route('service.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->images()->delete();
        $service->delete();
        return response()->json(['message'=>'success']);
    }
}
