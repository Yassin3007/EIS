<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Image;
use App\Models\Project;
use App\Models\Service;
use App\Models\PropertyType;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

class ProjectController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::latest()->paginate(10);
        // return  $projects;
        return view('admin.pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project=new Project();
        return view('admin.pages.project.form',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'name_en'=> 'required',
            'description_en'=> 'required'
            ]);
            $project= new Project();

            $project->iframe = $request->iframe;

            $project->name_en = $request->name_en;
            $project->name_ar = $request->name_ar;

            $project->description_en = $request->description_en;
            $project->description_ar = $request->description_ar;

        $project->count_1 = $request->count_1;
        $project->count_text_1_en = $request->count_text_1_en;
        $project->count_text_1_ar = $request->count_text_1_ar;
        $project->count_2 = $request->count_2;
        $project->count_text_2_en = $request->count_text_2_en;
        $project->count_text_2_ar = $request->count_text_2_ar;
        $project->count_3 = $request->count_3;
        $project->count_text_3_en = $request->count_text_3_en;
        $project->count_text_3_ar = $request->count_text_3_ar;

        $project->view_form = $request->view_form ?? 0;

            // $project->d_c_description_en = $request->d_c_description_en;
            // $project->d_c_description_ar = $request->d_c_description_ar;

            // $project->right_figure_details_ar  = $request->right_figure_details_ar;
            // $project->right_figure_details_en  = $request->right_figure_details_en;

            // $project->center_figure_details_ar = $request->center_figure_details_ar;
            // $project->center_figure_details_en = $request->center_figure_details_en;
            $project->save();
            // $project->unitTypes()->sync($request->property_types);
            // dd($project);
            $project->create_slug($project->name_en,$project->name_ar);
            // dd($request->service );
            // $project->service()->attach($request->service);
            // $project->update();
            if ($request->images) {
                foreach($request->images as $image_id){
                    $image = Image::find($image_id);
                    // dd($image_id);
                    $image->type = 'image';
                    $image->alt_en=$request->project_alt_en;
                    $image->alt_ar=$request->project_alt_ar;
                    $image->imageable_type = Project::class;
                    $image->imageable_id = $project->id;
                    $image->project_position='project';
                    $image->update();

                }
            }
        if ($request->icon) {
            $icon = Image::find($request->icon);
            $icon->type = 'icon';
            $icon->alt_en=$request->icon_alt_en;
            $icon->alt_ar=$request->icon_alt_ar;
            $icon->imageable_type = Project::class;
            $icon->imageable_id = $project->id;
            $icon->project_position='icon';
            $icon->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        if ($request->icon_ar) {
            $icon = Image::find($request->icon_ar);
            $icon->type = 'icon_ar';
            $icon->alt_en=$request->icon_alt_en;
            $icon->alt_ar=$request->icon_alt_ar;
            $icon->imageable_type = Project::class;
            $icon->imageable_id = $project->id;
            $icon->project_position='icon_ar';
            $icon->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        if ($request->main_video) {
            $main_video = Image::find($request->main_video);
            $main_video->type = 'main_video';
            $main_video->alt_en=$request->main_video_alt_en;
            $main_video->alt_ar=$request->main_video_alt_ar;
            $main_video->imageable_type = Project::class;
            $main_video->imageable_id = $project->id;
            $main_video->project_position='main_video';
            $main_video->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        if ($request->location_video) {
            $location_video = Image::find($request->location_video);
            $location_video->type = 'location_video';
            $location_video->alt_en=$request->location_video_alt_en;
            $location_video->alt_ar=$request->location_video_alt_ar;
            $location_video->imageable_type = Project::class;
            $location_video->imageable_id = $project->id;
            $location_video->project_position='location_video';
            $location_video->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        if ($request->file) {
            $file = Image::find($request->file);
            $file->type = 'file';
            $file->alt_en=$request->file_alt_en;
            $file->alt_ar=$request->file_alt_ar;
            $file->imageable_type = Project::class;
            $file->imageable_id = $project->id;
            $file->project_position='file';
            $file->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        if ($request->main_image) {
            $main_image = Image::find($request->main_image);
            $main_image->type = 'main_image';
            $main_image->alt_en=$request->main_image_alt_en;
            $main_image->alt_ar=$request->main_image_alt_ar;
            $main_image->imageable_type = Project::class;
            $main_image->imageable_id = $project->id;
            $main_image->project_position='main_image';
            $main_image->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }



        if ($request->slider_image) {
            $slider_image = Image::find($request->slider_image);
            $slider_image->type = 'slider_image';
            $slider_image->alt_en=$request->slider_image_alt_en;
            $slider_image->alt_ar=$request->slider_image_alt_ar;
            $slider_image->imageable_type = Project::class;
            $slider_image->imageable_id = $project->id;
            $slider_image->project_position='slider_image';
            $slider_image->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }


        if ($request->form_image) {
            $form_image = Image::find($request->form_image);
            $form_image->type = 'form_image';
            $form_image->alt_en=$request->form_image_alt_en;
            $form_image->alt_ar=$request->form_image_alt_ar;
            $form_image->imageable_type = Project::class;
            $form_image->imageable_id = $project->id;
            $form_image->project_position='form_image';
            $form_image->update();
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }


        $url ="https://founders.com.eg//projects/".$project->id;

        if ($project->save()) {
            \SEO\Seo::save($project, $url, [
                'title' => $project->name_en,
                'images' => [
                    $project->images->first() ? $project->images->first()->full_url : ''
                ]
            ]);
        }


        // if ($project->save()) {
        //     \SEO\Seo::save($project, route('single.project', $project->slugs->first()->slug_en), [
        //         'title' => $project->name_en,
        //          'images' => [
        //             $project->images->first()->full_url
        //         ]
        //     ]);
        //     \SEO\Seo::save($project, route('single.project', $project->slugs->first()->slug_ar), [
        //         'title' => $project->name_ar,
        //          'images' => [
        //             $project->images->first()->full_url
        //         ]
        //     ]);
        // }


        return redirect(route('project.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // $services = Service::get();
        // $property_types = PropertyType::all();
        // $districts = District::all();
        // dd($services);
        return view('admin.pages.project.form',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // return $request->all();
        // return $url ="https://web.st.fabrica.com.eg/founders/projects/".$project->id;

//        if (!count($project->projectImages('project'))&&!count($project->projectImages('main_video'))) {
//        $validated = $request->validate([
//            'images'=> 'required',
//            'main_video'=> 'required'
//        ]);
//        }else if (!count($project->projectImages('project'))) {
//              $validated = $request->validate([
//            'images'=> 'required',
//        ]);
//        }else if(!count($project->projectImages('main_video'))){
//               $validated = $request->validate([
//               'main_video'=> 'required'
//             ]);
//        }

        $validated = $request->validate([
            'name_en'=> 'required',
            'description_en'=> 'required'
        ]);
        $project->iframe = $request->iframe;

        $project->name_en = $request->name_en;
        $project->name_ar = $request->name_ar;

        $project->description_en = $request->description_en;
        $project->description_ar = $request->description_ar;

        $project->count_1 = $request->count_1;
        $project->count_text_1_en = $request->count_text_1_en;
        $project->count_text_1_ar = $request->count_text_1_ar;
        $project->count_2 = $request->count_2;
        $project->count_text_2_en = $request->count_text_2_en;
        $project->count_text_2_ar = $request->count_text_2_ar;
        $project->count_3 = $request->count_3;
        $project->count_text_3_en = $request->count_text_3_en;
        $project->count_text_3_ar = $request->count_text_3_ar;

        $project->view_form = $request->view_form ?? 0;
        // $project->d_c_description_en = $request->d_c_description_en;
        // $project->d_c_description_ar = $request->d_c_description_ar;

        // $project->right_figure_details_ar  = $request->right_figure_details_ar;
        // $project->right_figure_details_en  = $request->right_figure_details_en;

        // $project->center_figure_details_ar = $request->center_figure_details_ar;
        // $project->center_figure_details_en = $request->center_figure_details_en;
        $project->save();
        // $project->unitTypes()->sync($request->property_types);
        // dd($project);
      $project->create_slug($project->name_en,$project->name_ar);
        // dd($request->service );
        // $project->service()->attach($request->service);
        // $project->update();
        if ($request->images) {
            foreach($request->images as $image_id){
                $image = Image::find($image_id);
                // dd($image_id);
                $image->type = 'image';
                $image->alt_en=$request->project_alt_en;
                $image->alt_ar=$request->project_alt_ar;
                $image->imageable_type = Project::class;
                $image->imageable_id = $project->id;
                $image->project_position='project';
                $image->update();

            }
        }
    if ($request->icon) {
        $icon = Image::find($request->icon);
        $icon->type = 'icon';
        $icon->alt_en=$request->icon_alt_en;
        $icon->alt_ar=$request->icon_alt_ar;
        $icon->imageable_type = Project::class;
        $icon->imageable_id = $project->id;
        $icon->project_position='icon';
        $icon->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    if ($request->icon_ar) {
        $icon = Image::find($request->icon_ar);
        $icon->type = 'icon_ar';
        $icon->alt_en=$request->icon_alt_en;
        $icon->alt_ar=$request->icon_alt_ar;
        $icon->imageable_type = Project::class;
        $icon->imageable_id = $project->id;
        $icon->project_position='icon_ar';
        $icon->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    if ($request->main_video) {
        $main_video = Image::find($request->main_video);
        $main_video->type = 'main_video';
        $main_video->alt_en=$request->main_video_alt_en;
        $main_video->alt_ar=$request->main_video_alt_ar;
        $main_video->imageable_type = Project::class;
        $main_video->imageable_id = $project->id;
        $main_video->project_position='main_video';
        $main_video->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    if ($request->location_video) {
        $location_video = Image::find($request->location_video);
        $location_video->type = 'location_video';
        $location_video->alt_en=$request->location_video_alt_en;
        $location_video->alt_ar=$request->location_video_alt_ar;
        $location_video->imageable_type = Project::class;
        $location_video->imageable_id = $project->id;
        $location_video->project_position='location_video';
        $location_video->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    if ($request->file) {
        $file = Image::find($request->file);
        $file->type = 'file';
        $file->alt_en=$request->file_alt_en;
        $file->alt_ar=$request->file_alt_ar;
        $file->imageable_type = Project::class;
        $file->imageable_id = $project->id;
        $file->project_position='file';
        $file->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    if ($request->main_image) {
        $main_image = Image::find($request->main_image);
        $main_image->type = 'main_image';
        $main_image->alt_en=$request->main_image_alt_en;
        $main_image->alt_ar=$request->main_image_alt_ar;
        $main_image->imageable_type = Project::class;
        $main_image->imageable_id = $project->id;
        $main_image->project_position='main_image';
        $main_image->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }


    if ($request->slider_image) {
        $slider_image = Image::find($request->slider_image);
        $slider_image->type = 'slider_image';
        $slider_image->alt_en=$request->slider_image_alt_en;
        $slider_image->alt_ar=$request->slider_image_alt_ar;
        $slider_image->imageable_type = Project::class;
        $slider_image->imageable_id = $project->id;
        $slider_image->project_position='slider_image';
        $slider_image->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }



    if ($request->form_image) {
        $form_image = Image::find($request->form_image);
        $form_image->type = 'form_image';
        $form_image->alt_en=$request->form_image_alt_en;
        $form_image->alt_ar=$request->form_image_alt_ar;
        $form_image->imageable_type = Project::class;
        $form_image->imageable_id = $project->id;
        $form_image->project_position='form_image';
        $form_image->update();
    // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
    }

    $url ="https://founders.com.eg//projects/".$project->id;

        if ($project->save()) {
            \SEO\Seo::save($project, $url, $request->name_en, [
                'title' => $project->name_en,
                'images' => [
                    $project->images->first() ? $project->images->first()->full_url : ''
                ]
            ]);
        }


    // if ($project->save()) {
    //     \SEO\Seo::save($project, route('single.project', $project->name_en), [
    //         'title' => $project->name_en,
    //          'images' => [
    //             $project->images->first()->full_url
    //         ]
    //     ]);
    //     \SEO\Seo::save($project, route('single.project', $project->slugs->first()->slug_ar), [
    //         'title' => $project->name_,
    //          'images' => [
    //             $project->images->first()->full_url
    //         ]
    //     ]);
    // }

        return redirect(route('project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
        return response()->json(['message'=>'Success']);
    }
    public function deleteImage($id)
    {
        $image=Image::find($id);
        $image->delete();
        return response()->json(['message'=>'Success']);
    }
    public function inhome(Request $request , $id)
    {
        $project=Project::find($id);
        $project->inhome = $request->onscreen ;
        $project->save();
        // dd($project->inhome );
        return response()->json(['done']);
    }


    public function changeIndex(Request $request , $id)
    {
        $project=Project::find($id);
        $project->index = $request->index ;
        $project->save();
        return response()->json(['done']);
    }
}
