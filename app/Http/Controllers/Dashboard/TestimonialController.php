<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.pages.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial = new Testimonial();
        return view('admin.pages.testimonial.form',compact('testimonial'));

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
        ]);
        $testimonial = new Testimonial();
        $testimonial->name_en=$request->name_en;
        $testimonial->name_ar=$request->name_ar;
        $testimonial->description_en=$request->description_en;
        $testimonial->description_ar=$request->description_ar;
        $testimonial->save();

        return redirect(route('testimonial.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonial.form',compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
        ]);
        $testimonial->name_en=$request->name_en;
        $testimonial->name_ar=$request->name_ar;
        $testimonial->description_en=$request->description_en;
        $testimonial->description_ar=$request->description_ar;
        $testimonial->update();

        return redirect(route('testimonial.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return response()->json(['message'=>'success']);

    }
}
