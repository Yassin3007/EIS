<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends ApiBaseController
{
    public function allTestimonials(){
        $testimonials = Testimonial::all();
        $testimonials = TestimonialResource::collection($testimonials);
        $data = array('data'=>$testimonials);
        return apiResponse('api.success_operation', $data);
    }
    public function testimonial($id){
        $testimonial = Testimonial::findOrFail($id);
        $testimonial = new TestimonialResource($testimonial);
        return response()->json($testimonial);
    }
}
