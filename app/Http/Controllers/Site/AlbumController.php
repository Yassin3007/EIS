<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Statics;
class AlbumController extends ApiBaseController
{
    public function allAlbums(){
        $albums = Album::with('images')->get();
        $albums = AlbumResource::collection($albums);
        $data = array('data'=>$albums) ;
        return apiResponse('api.success_operation', $data);
    }

    public function singleAlbum($id){
        $album = Album::with('images')->find($id);
        $album = new AlbumResource($album);
        return response()->json($album);
    }
}
