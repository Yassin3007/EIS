<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::latest()->paginate();
        return view('admin.pages.offer.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offer = new Offer();
        $products = Product::get();
        return view('admin.pages.offer.form',compact('offer','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from'=>'required|date',
            'to'=>'required|date',
            'products_ids'=>'required|array',
            'type'=>'required|in:amount,percentage',
            'value'=>'required|numeric'

        ]);

        $offer = Offer::create([
            'from'=>$request->from,
            'to'=>$request->to,
            'type'=>$request->type,
            'value'=>$request->value,
        ]);

        $offer->products()->attach($request->products_ids);
        return redirect(route('offer.index'));


    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $products = Product::get();
        return view('admin.pages.offer.form',compact('offer','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
//        return $request ;
        $request->validate([
            'from'=>'required|date',
            'to'=>'required|date',
            'products_ids'=>'required|array',
            'type'=>'required|in:amount,percentage',
            'value'=>'required|numeric'

        ]);

        $offer ->update([
            'from'=>$request->from,
            'to'=>$request->to,
            'type'=>$request->type,
            'value'=>$request->value,
        ]);

        $offer->products()->sync($request->products_ids);
        return redirect(route('offer.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->products()->detach();
        $offer->delete();
        return response()->json(['message' => 'success']);
    }
}
