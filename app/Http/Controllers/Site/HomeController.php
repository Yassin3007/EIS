<?php

namespace App\Http\Controllers\Site;

use App\Chat;
use App\Http\Resources\LocationResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\TestimonialResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Models\Testimonial;
use Throwable;
use App\Office;
use App\Channel;
use App\Models\ContactUs;
use App\LifeStyle;
use App\NewCareer;
use App\Department;
use App\Models\FAQ;
use App\Models\News;
use App\SalesCenter;
use App\Models\Image;
use App\Models\Phone;
use App\Models\Policy;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Statics;
use App\Models\Facility;
use App\Models\Subscribe;
use App\Models\Subscriber;
use App\Models\TeamMember;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\ChannelResource;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\LifeStyleResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\ProjectBigResource;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\SalesCenterResource;
use App\Http\Resources\ProjectSmallResource;
use App\Http\Controllers\Site\BaseController;
use SEO\Seo;

class HomeController extends ApiBaseController
{

    public function index()
    {
        $childCategories = Category::where('parent_id', '!=',null)->with('products')->get();
        $banners = Banner::all();
        $bestSellingProducts = Product::where('best_selling', 1)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->limit(8)->get();
        return view('site.index',compact('childCategories','banners','bestSellingProducts','latestProducts'));
    }
    public function homepage()
    {
         return redirect('/dashboard');
//        return 'hello';
        // $Sliderprojects      = Project::where('inhome',1)->latest()->take(5)->get();
        // $partnerImages = Image::query()->where('type',Image::TYPE_PARTNER_IMAGES)->get();
//        $projects = Project::latest()->take(4)->get();
//        $blogs =Article::latest()->take(3)->get();

        // return view('site.pages.home',compact('Sliderprojects','partnerImages'));
    }

    public function mainPage()
    {



        try{

            $HomePageSlider = Image::query()->where('type',Image::TYPE_Slider_IMAGES)->get();
            $sliderTitle = Statics::getWithCurrentLang('slider_title') ;
            $sliderDescription = Statics::getWithCurrentLang('slider_description') ;
            $about_deco = array('home_about_section'=>Statics::getWithCurrentLang('home_about_section'),'image'=>Image::query()->where('type','about_cover')->latest()->first(),

            );

            $services = Service::with('images')->orderBy('created_at','desc')->get();
            $services = ServiceResource::collection($services);

            $HomePageVideo = Image::query()->where('type',Image::TYPE_HomePage_Video_COVER)->get()->last();
            $video_thumbnail = Image::query()->where('type',Image::TYPE_VIDEO_THUMBNAIL)->get()->last();

            $news = News::query()->orderBy('date','desc')->get();
            $news = NewsResource::collection($news);

            $intresting_facts = Statics::getWithCurrentLang('intresting_facts');

            $location_data = array('location_count'=>Statics::getWithCurrentLang('location'),'count_text_1'=>Statics::getWithCurrentLang('count_text_1'));
            $employees_data = array('employees_count'=>Statics::getWithCurrentLang('employees'),'count_text_1'=>Statics::getWithCurrentLang('count_text_2'));
            $clients_data = array('clients_count'=>Statics::getWithCurrentLang('clients'),'count_text_1'=>Statics::getWithCurrentLang('count_text_3'));
            $awards_data = array('awards_count'=>Statics::getWithCurrentLang('awards'),'count_text_1'=>Statics::getWithCurrentLang('count_text_4'));
            $map_iframe = Statics::getWithCurrentLang('map_iframe');
            $testimonials = Testimonial::all();
            $testimonials = TestimonialResource::collection($testimonials);
            $locations = Location::all();
            $locations = LocationResource::collection($locations) ;
            $data = array(
            'HomePageSlider'=>$HomePageSlider ,
            'sliderTitle'=>$sliderTitle ,
            'sliderDescription'=>$sliderDescription ,
            'about_deco'=>$about_deco,
            'services'=>array('service_description'=>Statics::getWithCurrentLang('service_description'),'services'=>$services),
            'blogs_data'=>array('blog_title'=>Statics::getWithCurrentLang('blog_title'),'blog_description'=>Statics::getWithCurrentLang('blog_description')),
            'home_video_cover'=>$HomePageVideo ,
            'news'=>$news,
            'intresting_facts'=>$intresting_facts,
            'location_data'=>$location_data,

            'employees_data'=>$employees_data,
            'clients_data'=>$clients_data,
            'awards_data'=>$awards_data,
            'map_iframe'=>$map_iframe,
            'testimonials'=>$testimonials,
            'locations'=>$locations,
            'video_thumbnail'=>$video_thumbnail ,
            'locations_description'=>Statics::getWithCurrentLang('location_description')

            );
            // return response()->json($data);
           return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }
        return response()->json($data);
    }

    public function servicePage()
    {



        try{

            $materialTitle = Statics::getWithCurrentLang('material') ;
            $materialDescription = Statics::getWithCurrentLang('material_description') ;
            $data = array('materialTitle'=>$materialTitle,'materialDescription'=>$materialDescription);


            // return response()->json($data);
           return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }
        return response()->json($data);
    }


    public function storeContactUS(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=> 'required',
            'phone'=> 'required|numeric',
            'email'=>'required|string|email',
            'subject'=>'required',
            'message'=>'required',
        ]);

        if ($validated->fails())
        {
            return apiResponse("api.validation_error",$validated->errors()->toArray(),422,422);
        }

            $contact_us= new ContactUs();

            $contact_us->name = $request->name;
            $contact_us->phone = $request->phone;
            $contact_us->email = $request->email;
            $contact_us->subject = $request->subject;

            $contact_us->message = $request->message;

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
        return $this->sendSuccessMessage();
        return response()->json('success');
    }


    public function contactInfo()
    {
        try{
            $data = array(
            'email'=>Statics::getWithCurrentLang('email'),
            'address'=>Statics::getWithCurrentLang('address'),
            // 'location_eg'=>Statics::getWithCurrentLang('location_eg'),
            'hotline'=>Statics::getWithCurrentLang('hotline'),
            'fax'=>Statics::getWithCurrentLang('fax'),
            // 'head_office'=>Statics::getWithCurrentLang('head_office_1_location_text'),
            'facebook_link'=>Statics::getWithCurrentLang('facebook_link'),
            'instagram_link'=>Statics::getWithCurrentLang('instagram_link'), 'threads_link'=>Statics::getWithCurrentLang('threads_link'),
            'whatsapp_number'=>Statics::getWithCurrentLang('whatsapp_number'),
            'twitter_link'=>Statics::getWithCurrentLang('twitter_link'), 'linkedin_link'=>Statics::getWithCurrentLang('linkedin_link'),
            'youtube_link'=>Statics::getWithCurrentLang('youtube_link'),
            // map_iframe
            'map_iframe'=>Statics::getWithCurrentLang('map_iframe'),

        );
            return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }

    }

    public function allNews()
    {
        try{
            $news = News::where('type',null)->orderBy('created_at','desc')->get();
            $news = NewsResource::collection($news);
            $data = array('image_cover'=> Image::query()->where('type',Image::TYPE_News_COVER)->get()->last(),'data'=>$news);
            return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }

    }

    // constructionUpdates



    public function singleNews($id)
    {
        $news = News::find($id);
        $news = new NewsResource($news);

        return response()->json($news);

    }



    // projectsDropdown






    public function policy() {
        try{
            $data = array('policy'=>Statics::getWithCurrentLang('policy'));
            return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }
    }



    public function offices()
    {
        $projects = Project::orderBy('index','DESC')->get();
        $projects = ProjectSmallResource::collection($projects);
        return response()->json($projects);

    }








    // storeSubscribe


    // careersCover







    public function contacts()
    {
        $about_founder = array('head_office_1_location_text'=>Statics::getWithCurrentLang('head_office_1_location_text'),'sales_center_1_location_text'=>Statics::getWithCurrentLang('sales_center_1_location_text'),
        'email'=>Statics::getWithCurrentLang('email'),'phone'=>Statics::getWithCurrentLang('hotline'),
        'facebook_link'=>Statics::getWithCurrentLang('facebook_link'),'instagram_link'=>Statics::getWithCurrentLang('instagram_link'),'whatsapp_number'=>Statics::getWithCurrentLang('whatsapp_number'),'twitter_link'=>Statics::getWithCurrentLang('twitter_link')
        ,'youtube_link'=>Statics::getWithCurrentLang('youtube_link'),'linkedin_link'=>Statics::getWithCurrentLang('linkedin_link'));
        return response()->json($about_founder);

    }

    // aboutUs
    public function aboutUs()
    {
        try{
            $about_founder = array(
            // 'about_title'=>Statics::getWithCurrentLang('about_title'),'about_pref'=>Statics::getWithCurrentLang('about_pref'),
            'about_small_section'=>Statics::getWithCurrentLang('about_small_section'),
            'about_big_section'=>Statics::getWithCurrentLang('about_big_section'),
            'our_vision'=>Statics::getWithCurrentLang('our_vision'),
            'our_vision_image'=> Image::query()->where('type','our_vision_image')->get()->last(),
            'our_mission'=>Statics::getWithCurrentLang('our_mission'),
            'our_mission_image'=> Image::query()->where('type','our_mission_image')->get()->last(),
            'our_value'=>Statics::getWithCurrentLang('our_value'),
            'value_text_1'=>Statics::getWithCurrentLang('value_text_1'),
            'value_text_2'=>Statics::getWithCurrentLang('value_text_2'),
            'value_text_3'=>Statics::getWithCurrentLang('value_text_3'),
            'value_text_4'=>Statics::getWithCurrentLang('value_text_4'),
            'value_text_5'=>Statics::getWithCurrentLang('value_text_5'),
            'value_text_6'=>Statics::getWithCurrentLang('value_text_6'),
            'value_text_7'=>Statics::getWithCurrentLang('value_text_7'),
            'our_people_section_image'=> Image::query()->where('type','our_people_section_image')->get()->last(),
//            'our_people_section_image_2'=> Image::query()->where('type','our_people_section_image_2')->get()->last(),
            'image_cover'=> Image::query()->where('type',Image::TYPE_AboutUS_COVER)->get()->last(),
            'our_people_title'=>Statics::getWithCurrentLang('our_people_title'),
            'our_people_description'=>Statics::getWithCurrentLang('our_people_description')

            );
            return apiResponse('api.success_operation', $about_founder);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }

    }

    public function favicon()
    {
        try{

            $favicon = Image::query()->where('type','favicon')->get()->last();

            $data = array('favicon'=> $favicon);

            return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }

    }

    public function contactUs()
    {
        $sales_centers = SalesCenter::all();
        // SalesCenterResource::
        $sales_centers = SalesCenterResource::collection($sales_centers);
        $about_founder = array('head_office'=>array('address'=>Statics::getWithCurrentLang('head_office_1_location_text'),'telephone'=>Statics::getWithCurrentLang('whatsapp_number'),'email'=>Statics::getWithCurrentLang('email'),'fax'=>Statics::getWithCurrentLang('fax')),
        'sales_center'=>$sales_centers,
        'image_cover'=> Image::query()->where('type',Image::TYPE_Contact_COVER)->get()->last(),);
        return response()->json($about_founder);

    }


    public function downloadProjectFile($id,Request $request){
         $project=Project::find($id);
        //  return url(Storage::url($project->projectImages('file')->last()->url));
        $filename = 'borchure';
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy(url(Storage::url($project->projectImages('file')->last()->url)), $tempImage);

        return response()->download($tempImage, $filename);
    }

    public function insurances()
    {
        return view('website.pages.insurances');
    }

    public function about()
    {
        return view('site.pages.about_us');
    }

    public function services()
    {
        $services = Service::query()->latest()->get();
        $services = ServiceResource::collection($services);
        $data = array('data'=>$services,'services_title'=>Statics::getWithCurrentLang('services_title'),'services_description'=>Statics::getWithCurrentLang('services_description'));

        return apiResponse('api.success_operation', $data);
    }

    public function changeLang($lang)
    {
        if (in_array($lang,['ar','en']))
        {
            session()->put('lang',$lang);
            return redirect()->back();
        }
        return abort(404);
    }

    public function contact()
    {
        return view('site.pages.contact-us');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
            'phone'   => 'required',
        ]);

        $message = new Message();
        $message->name      = $request->name;
        $message->email     = $request->email;
        $message->phone     = $request->phone;
        $message->job_title = $request->job_title;
        $message->message   = $request->message;
        $message->save();
        Session::flash('message', 'done');
        try {
            // Validate the value...
            $details = [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'job_title'=>$request->job_title,
                'message'=>$request->message,
            ];
            Mail::to(Statics::getWithCurrentLang('the_recever_email'))->cc(Statics::getWithCurrentLang('the_recever_email2'))->send(new ContactUsMail($details));
        } catch (Throwable $e) {
            return back();
        }
        return back();
    }

    public function ourTeam()
    {
        $teamMembers = TeamMember::query()->latest()->get();
        return view('site.pages.our-team',compact('teamMembers'));
    }

    // public function storeSubscribe(Request $request)
    // {
    //     Subscriber::create($request->all());
    //     return back()->withSuccess(__('site.subscribtion_success'));
    // }


    public function project($slug)
    {
        $project = Project::get_project($slug);
        if (!$project) {
            $project= Project::find($slug);
        }
        if(!$project)
            abort(404);
        return view('site.pages.single-project',compact('project'));
    }


    public function faq()
    {
        $faqs = FAQ::latest()->paginate(10);
        return view('site.pages.faq.index',compact('faqs'));
    }

    public function policies()
    {
        $policies = Policy::query()->latest()->get();
        return view('site.pages.our-policy',compact('policies'));
    }
}
