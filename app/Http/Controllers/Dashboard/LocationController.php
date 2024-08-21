<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::paginate(10);
        return view('admin.pages.location.index',compact('locations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = new Location();
        return view('admin.pages.location.form',compact('location'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'long'=>'required',
            'lat'=>'required',

        ]);
        $location = new Location();
        $location->name_en=$request->name_en;
        $location->name_ar=$request->name_ar;
        $location->description_en=$request->description_en;
        $location->description_ar=$request->description_ar;
        $location->long=$request->long;
        $location->lat=$request->lat;
        $location->save();
        return redirect(route('location.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.pages.location.form',compact('location'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
        ]);
        $location->name_en=$request->name_en;
        $location->name_ar=$request->name_ar;
        $location->description_en=$request->description_en;
        $location->description_ar=$request->description_ar;
        $location->long=$request->long;
        $location->lat=$request->lat;
        $location->update();
        return redirect(route('location.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(['message'=>'success']);
    }
}
