<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function allLocations(){
        $locations = Location::all();
        $locations = LocationResource::collection($locations);
        $data = array('data'=>$locations);
        return apiResponse('api.success_operation', $data);
    }
    public function location($id){
        $location = Location::findOrFail($id);
        $location = new LocationResource($location);
        return response()->json($location);
    }
}
