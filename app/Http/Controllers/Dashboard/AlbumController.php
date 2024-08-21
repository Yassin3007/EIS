<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Album;
use App\Models\Statics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\FileUploader;

class AlbumController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->paginate(10);

        return view('admin.pages.album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $album = new Album();
        $albumImages = $album->images;

        return view('admin.pages.album.form',compact('album','albumImages'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
//            'images'=>  'required|max:2048',
            'name_ar'=>'required',
            'name_en'=>'required',
        ]);
        $album = new Album();
        $album->name_en=$request->name_en;
        $album->name_ar=$request->name_ar;
        $album->save();
//        foreach($request->images as $image){
//            $imageFile = $image->store('/public/album');
//            $this->saveImageModel($imageFile, $request->alt, $request->alt, $album, 'image', 'material_image');
//        }

        if ($request->images) {
            foreach($request->images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'album_images';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Album::class;
                $image->imageable_id = $album->id;
                $image->project_position='album_images';
                $image->update();

            }
        }

        return redirect(route('album.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {

        $albumImages = $album->images;
        return view('admin.pages.album.form',compact('album','albumImages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'name_ar'=>'required',
            'name_en'=>'required',
        ]);

        $album->name_en=$request->name_en;
        $album->name_ar=$request->name_ar;

        $album->update();
//        if ($request->images) {
//            $album->images()->delete();
//
//            foreach($request->images as $image){
//                $imageFile = $image->store('/public/album');
//                $this->saveImageModel($imageFile, $request->alt, $request->alt, $album, 'image', 'material_image');
//            }
//
//            }

        if ($request->images) {
//            Image::query()->where('type', Image::TYPE_ALBUM_IMAGES)->delete();
            foreach($request->images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'album_images';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Album::class;
                $image->imageable_id = $album->id;
                $image->project_position='album_images';
                $image->update();

            }
        }
        return redirect(route('album.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->images()->delete();
        $album->delete();
        return response()->json(['message'=>'success']);
    }
}
