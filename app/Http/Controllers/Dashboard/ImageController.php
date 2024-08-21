<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file)
        {

            $new_file_extention=$request->file->getClientOriginalName();
            $word=array('mp4','ogx','oga','ogv','ogg','webm');
            // return '1';
            foreach( $word as $wor )
            {
                if(strpos($new_file_extention, $wor) !== false){
                    $validated = $request->validate([
                        'file'=> 'required|max:20480',
                    ]);
                        if(!Storage::disk('public')->exists('videos'))
                        {
                            Storage::disk('public')->makeDirectory('videos');
                        }
                        $image=$request->file;
                        $filename = uniqid().'.'.File::extension($image->getClientOriginalName());
                        $path ="videos";
                        $storagePath = public_path("storage/$path");
                        $image->move($storagePath,$filename);
                        $storedImage = new Image();
                        $storedImage->url = "public/$path/$filename" ;
                        $storedImage->save();
                        $id = $storedImage->id;
                        return response($id);
                } else{
                        $validated = $request->validate([
                            'file'=> 'required|max:5120',

                        ]);
                        // $image = 'https://host-in.s3.amazonaws.com'.$new_file_extention;
                        if(!Storage::disk('public')->exists('images'))
                        {
                            Storage::disk('public')->makeDirectory('images');
                        }
                        $image=$request->file;
                        $filename = uniqid().'.'.File::extension($image->getClientOriginalName());
                        $path ="images/$filename";
                        $storagePath = public_path("storage/$path");


                        // $image->move($storagePath,$filename);


                        $optimizerChain = OptimizerChainFactory::create();
                        $optimizerChain->optimize($image);

                        $img =InterventionImage::make($image);
                        // $img =Webp::make($img);
                        // dd( $img);
                        $img->encode('webp', 90)
                        ->resize(1920,1080, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->save($storagePath);


                        $storedImage = new Image();

                        $storedImage->url = "public/$path" ;
                        $storedImage->save();
                        $id = $storedImage->id;
                        // dd($id);
                        return response($id);
                }
            }
        }
        else
            return response(10);


    }

    public function storeVideos(Request $request)
    {
        if(!Storage::disk('public')->exists('videos'))
        {
            Storage::disk('public')->makeDirectory('videos');
        }
        $image=$request->file;
        $filename = uniqid().'.'.File::extension($image->getClientOriginalName());
        $path ="videos";
        $storagePath = public_path("storage/$path");
        $image->move($storagePath,$filename);
        // $optimizerChain = OptimizerChainFactory::create();
        // $optimizerChain->optimize($image);
        // $img =InterventionImage::make($image);

        // dd( $img);
        // $img->resize(1920,1080, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // })->save($storagePath);

        // $img->save($storagePath);


        $storedImage = new Image();

        $storedImage->url = "public/$path/$filename" ;
        $storedImage->save();
        $id = $storedImage->id;
        // dd($id);
        return response($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $image=Image::find($id);
            $image->delete();
            return response()->json(['message'=>'Success']);
    }
    public function storeStatic(Request $request)
    {
        $image=$request->file;

        $filename = uniqid().'.'.File::extension($image->getClientOriginalName());
        $path ="article/$filename";
        $storagePath = public_path("storage/$path");

        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($image);
        $img =InterventionImage::make($image);
        // $img->resize(1920,1080, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // })->save($storagePath);

        return response("public/$path");
    }
}
