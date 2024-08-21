<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Image;
use App\Models\Statics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticsController extends Controller
{
    /**
     * return array of form names
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutImages = Image::query()->where('type',Image::TYPE_AboutUS_IMAGES)->get();
        $aboutImage = Image::query()->where('type','about_cover')->latest()->first();
        $our_mission_image = Image::query()->where('type','our_mission_image')->latest()->first();
        $our_vision_image = Image::query()->where('type','our_vision_image')->latest()->first();
        $our_people_section_image = Image::query()->where('type','our_people_section_image')->latest()->first();
//        $our_people_section_image_2 = Image::query()->where('type','our_people_section_image_2')->latest()->first();
        $careers_page_cover = Image::query()->where('type','careers_page_cover')->latest()->first();
        $favicon = Image::query()->where('type','favicon')->latest()->first();

        return view('admin.pages.statics.form',compact('aboutImages','aboutImage',
            'our_people_section_image','our_vision_image','our_mission_image',
            'careers_page_cover','favicon'));

    }
    public function seo()
    {
        return view('admin.pages.SEO.form');

    }

    /**
     * @SWG\Get(
     *      tags={"Statics"},
     *      path="/getFormInputs?form=",
     *      summary="retrieves a form inputs array depending on form key
     *      form keys : homepage,insurances,media_center,about_us,careers,contact_us",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="form",
     *         in="query",
     *         required=false,
     *         type="string",
     *      ),
     *      @SWG\Response(response=200, description="inputs"),
     *      @SWG\Response(response=401, description="Not Authorized"),
     * )
     */
    /**
     * return form inputs array
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormInputs(Request $request)
    {
        $formName = $request->form;
        $form = \config('statics.'.$formName);
        // dd($form);
        foreach($form['sections'] as &$section)
        {
            foreach($section['inputs'] as &$input)
            {
                $key = $input['key'];
                $lang = null;
                if(str_contains($key,'_en'))
                {
                    $key = substr($key,0,strpos($key,'_en'));
                    $lang = 'en';
                    // $value = Statics::get($key,'en');
                }
                elseif(str_contains($key,'_ar'))
                {
                    $key = substr($key,0,strpos($key,'_ar'));
                    $lang = 'ar';
                    // $value = Statics::get($key,'ar');
                }
                $value = Statics::get($key,$lang);
                $input['value'] = $value;
                // dd($input);
            }
        }
        return \response()->json($form);
    }


    /**
     * @SWG\Post(
     *      tags={"Statics"},
     *      path="/updateStatics",
     *      summary="Updates Statics",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="inputs"),
     *      @SWG\Response(response=401, description="Not Authorized"),
     * )
     */
    /**
     *store homepage statics
     *
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $sections = $request->all();
    //     $inputsArr = array();
    //     foreach($sections as $section)
    //     {
    //         foreach($section['inputs'] as $key=>$value)
    //         {
    //             $inputsArr[$key] = $value;
    //         }
    //     }
    //     Statics::updateStatics($inputsArr);
    //     return back();
    // }
    /**
     *store homepage statics
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request ;
        Statics::updateStatics($request->except('_token'));

        if ($request->slider_images) {
            foreach($request->slider_images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'slider';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='slider_image';
                $image->update();

            }
        }

        if ($request->video_thumbnail) {
            // foreach($request->about_us_images as $request->about_cover){
                $image = Image::find($request->video_thumbnail);
                // dd($image_id);
                $image->type = 'video_thumbnail';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='video_thumbnail';
                $image->update();

            // }
        }
        if ($request->about_cover) {
            // foreach($request->about_us_images as $request->about_cover){
            $image = Image::find($request->about_cover);
            // dd($image_id);
            $image->type = 'about_cover';
            $image->alt_en=$request->project_alt_en;
            $image->alt_ar=$request->project_alt_ar;
            $image->imageable_type = Statics::class;
            $image->imageable_id = 0;
            $image->project_position='about_cover';
            $image->update();

            // }
        }
        if ($request->about_us_slider_images) {
            foreach($request->about_us_slider_images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'about_us_slider_images';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='about_us_slider_images';
                $image->update();

            }
        }

        if ($request->about_us_values_images) {
            foreach($request->about_us_values_images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'about_us_values_images';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='about_us_values_images';
                $image->update();

            }
        }

        if ($request->about_values_images) {
            foreach($request->about_values_images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'about_values_images';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='about_values_images';
                $image->update();

            }
        }




        if ($request->our_people_section_image) {
            // foreach($request->about_us_images as $request->our_people_section_image){
                $image = Image::find($request->our_people_section_image);
                // dd($image_id);
                $image->type = 'our_people_section_image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='our_people_section_image';
                $image->update();

            // }
        }


//        if ($request->our_people_section_image_2) {
//            // foreach($request->about_us_images as $request->our_people_section_image){
//                $image = Image::find($request->our_people_section_image_2);
//                // dd($image_id);
//                $image->type = 'our_people_section_image_2';
//                $image->alt_en=$request->project_alt_en;
//                $image->alt_ar=$request->project_alt_ar;
//                $image->imageable_type = Statics::class;
//                $image->imageable_id = 0;
//                $image->project_position='our_people_section_image';
//                $image->update();
//
//            // }
//        }

        if ($request->favicon) {
            $image = Image::find($request->favicon);
            $image->type = 'favicon';
            $image->alt_en=$request->project_alt_en;
            $image->alt_ar=$request->project_alt_ar;
            $image->imageable_type = Statics::class;
            $image->imageable_id = 0;
            $image->project_position='favicon';
            $image->update();
        }


        if ($request->home_video) {
            // foreach($request->about_us_images as $request->home_video){
                $image = Image::find($request->home_video);
                // dd($image_id);
                $image->type = 'home_video';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='home_video';
                $image->update();

            // }
        }
        // our_vision_image

        if ($request->our_vision_image) {
            // foreach($request->about_us_images as $request->our_vision_image){
                $image = Image::find($request->our_vision_image);
                // dd($image_id);
                $image->type = 'our_vision_image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='our_vision_image';
                $image->update();

            // }
        }


        if ($request->our_mission_image) {
            // foreach($request->about_us_images as $request->our_mission_image){
                $image = Image::find($request->our_mission_image);
                // dd($image_id);
                $image->type = 'our_mission_image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Statics::class;
                $image->imageable_id = 0;
                $image->project_position='our_mission_image';
                $image->update();

            // }
        }

        if ($request->careers_page_cover) {
            $image = Image::find($request->careers_page_cover);
            $image->type = 'careers_page_cover';
            $image->alt_en=$request->project_alt_en;
            $image->alt_ar=$request->project_alt_ar;
            $image->imageable_type = Statics::class;
            $image->imageable_id = 0;
            $image->project_position='careers_page_cover';
            $image->update();
        }



        return back()->withSuccess('success');
    }

    public function contactUs()
    {
        return view('admin.pages.contactUs.form');
    }
}
