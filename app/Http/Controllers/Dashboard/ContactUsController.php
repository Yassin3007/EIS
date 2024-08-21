<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_us=ContactUs::latest()->paginate(10);
        // return  $projects;
        return view('admin.pages.contact_us.index', compact('contact_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact_us=new ContactUs();
        return view('admin.pages.contact_us.form',compact('contact_us'));
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
            'name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'message'=> 'required',
            // 'content'=> 'required',
            // 'pref'=>'required',
            ]);
            $contact_us= new ContactUs();

            $contact_us->name = $request->name;
            $contact_us->phone = $request->phone;
            $contact_us->email = $request->email;
            $contact_us->message = $request->message;
            // $contact_us->pref = $request->pref;
            // $contact_us->content = $request->content;
            // $contact_us->date = $request->date;

            $contact_us->save();
        // if ($request->image) {
        //     $image = Image::find($request->image);
        //     $image->type = 'image';
        //     $image->alt_en=$request->image_alt_en;
        //     $image->alt_ar=$request->image_alt_ar;
        //     $image->imageable_type = ContactUs::class;
        //     $image->imageable_id = $contact_us->id;
        //     $image->project_position='image';
        //     $image->update();
        //     $contact_us->update(['image' => $image->url,]);
        // // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        // }

        return redirect(route('contact_us.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contact_us)
    {
        return view('admin.pages.contact_us.form',compact('contact_us'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contact_us)
    {
        // $contact_us = ContactUs::find($id);
        return view('admin.pages.contact_us.form',compact('contact_us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contact_us)
    {
        $validated = $request->validate([
            'name'=> 'required',
            // 'content'=> 'required',
            // 'pref'=> 'required'
            ]);

            $contact_us->name = $request->name;
            // $contact_us->pref = $request->pref;
            // $contact_us->content = $request->content;
            // $contact_us->date = $request->date;

            $contact_us->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en=$request->image_alt_en;
            $image->alt_ar=$request->image_alt_ar;
            $image->imageable_type = ContactUs::class;
            $image->imageable_id = $contact_us->id;
            $image->project_position='image';
            $image->update();
            $contact_us->update(['image' => $image->url,]);
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }
        return redirect(route('contact_us.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_us = ContactUs::find($id);
        $contact_us->delete();
        return response()->json(['message'=>'Success']);
    }
}
