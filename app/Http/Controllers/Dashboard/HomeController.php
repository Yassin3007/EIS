<?php

namespace App\Http\Controllers\Dashboard;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Model\ToDoList;
use App\Models\Album;
use App\Models\Applicant;
use App\Models\Article;
use App\Models\Career;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\ContactUs as ModelsContactUs;
use App\Models\ContactusMessage;
use App\Models\Event;
use App\Models\Image;
use App\Models\JobQuestion;
use App\Models\JoinUs;
use App\Models\Message;
use App\Models\News;
use App\Models\Product;
use App\Models\Project;
use App\Models\RequestInfo;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Visitor;
use App\NewCareer;
use Carbon\Carbon;
use Carbon\Doctrine\CarbonType;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;
// use Weboap\Visitor\Visitor;
// use Visitor;


class HomeController extends Controller
{

    //

    public function homepage()
    {
        return view('admin.dashboard.home.statics');
    }
    public function aboutpage()
    {

        return view('admin.dashboard.about.statics');
    }
    public function footer()
    {
        return view('admin.dashboard.footer.index');
    }
    public function static()
    {
        $sliderImages = Image::query()->where('type', Image::TYPE_Slider_IMAGES)->get();
        $home_video = Image::query()->where('type', Image::TYPE_HomePage_Video_COVER)->latest()->first();
        $video_thumbnail = Image::query()->where('type', Image::TYPE_VIDEO_THUMBNAIL)->latest()->first();
        $aboutImages = Image::query()->where('type', Image::TYPE_AboutUS_IMAGES)->get();
        $aboutImage = Image::query()->where('type', 'about_cover')->latest()->first();
        $our_mission_image = Image::query()->where('type', 'our_mission_image')->latest()->first();
        $our_vision_image = Image::query()->where('type', 'our_vision_image')->latest()->first();
        $our_people_section_image = Image::query()->where('type', 'our_people_section_image')->latest()->first();
        //        $our_people_section_image_2 = Image::query()->where('type','our_people_section_image_2')->latest()->first();
        $careers_page_cover = Image::query()->where('type', 'careers_page_cover')->latest()->first();
        $favicon = Image::query()->where('type', 'favicon')->latest()->first();

        return view('admin.pages.home.form', compact(
            'aboutImages',
            'aboutImage',
            'our_people_section_image',
            'our_vision_image',
            'our_mission_image',
            'careers_page_cover',
            'favicon' ,'sliderImages', 'home_video' ,'video_thumbnail'
        ));

        // $sliderImages = Image::query()->where('type', Image::TYPE_Slider_IMAGES)->get();
        // $home_video = Image::query()->where('type', Image::TYPE_HomePage_Video_COVER)->latest()->first();

        // return view('admin.pages.home.form', compact('sliderImages', 'home_video'));
    }

    public function storePartners(Request $request)
    {
        $validated = $request->validate([
            'slider_images' => 'required',
        ]);
        $imageIds = $request->slider_images;
        Image::query()->whereIn('id', $imageIds)->update(['type' => Image::TYPE_Slider_IMAGES]);
        return back();
    }

    // public function about()
    // {
    //     $sliderImages = Image::query()->where('type',Image::TYPE_Slider_IMAGES)->get();
    //     return view('admin.pages.statics.form',compact('sliderImages'));
    // }

    public function storeAboutUs(Request $request)
    {
        $validated = $request->validate([
            // 'about_us_images'=> 'required',
            // 'about_us_image'=> 'required',
        ]);
        $imageIds = $request->about_us_images;
        $imageId = $request->about_us_image;
        if ($imageIds) {
            Image::query()->whereIn('id', $imageIds)->update(['type' => Image::TYPE_AboutUS_IMAGES]);
        }
        if ($imageId) {
            Image::query()->where('id', $imageId)->update(['type' => Image::TYPE_AboutUS_IMAGE]);
        }
        return back();
    }

    public function dashboard()
    {
        // $applicants = Applicant::count();
        // $events = Event::count();
        // $requestINfo = RequestInfo::count();
        // $chats = Chat::count();
        // $careers = NewCareer::count();
        $categories_count = Category::count();
        $products = Product::count();
        $contact_us = ModelsContactUs::count();
//        $news = News::where('type', null)->count();
//        $construction_updates = News::where('type', 'construction_update')->count();
        // $construction_updates = New::where('type','construction_update')->count();
        // $activeCareers = Career::where('is_active',1)->count();
        // $news = Article::count();
        // $newcomments = Comment::whereDate('created_at',now())->count();
        $visitors = Visitor::count();
        $news = News::count();
//        $services = Service::count();
//        $albums = Album::count();
        // $clicks = Visitor::clicks();
        $month_ago = [];
        $lastmonth = Carbon::now()->subDays(30);
        $today = Carbon::now();
        for ($date = $lastmonth; $date->lte($today); $date->addDay()) {
            $month_ago[] = $date->format('Y-m-d');
        }
        $visitorsBerMonth = [];
        foreach ($month_ago as $day) {
            $todayVisitors = Visitor::where('date', $day)->count();
            $visitorsBerMonth[] = $todayVisitors;
        }
        //  DD($visitorsBerMonth);
        // $notes = ToDoList::get();

        return view(
            'admin.pages.dashboard.index',
            compact(
                'visitorsBerMonth',
                'visitors',
                'month_ago',
                'visitorsBerMonth',
                'contact_us',
                'categories_count',
                'products',
                'news'
            )
        );
    }
    public function Joinus()
    {
        return view('dashboard.dashboard.seekers.index');
    }

    public function distroyJoinUs($id)
    {

        return back();
    }
    /**
     * @SWG\Get(
     *      tags={"Site-Dashboard"},
     *      path="/website/subscribers",
     *      summary="list all subscribers paginated",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="Object"),
     *      @SWG\Response(response=401, description="Not Authorized"),
     * )
     */
    // public function subscribers(){
    //     $subscribers = Subscriber::latest()->paginate();
    //     return response()->json($subscribers);
    // }

    // /**
    //  * @SWG\Get(
    //  *      tags={"Site-Dashboard"},
    //  *      path="/website/contactusMessages",
    //  *      summary="list all contact us messages paginated",
    //  *      security={
    //  *          {"jwt": {}}
    //  *      },
    //  *      @SWG\Response(response=200, description="Object"),
    //  *      @SWG\Response(response=401, description="Not Authorized"),
    //  * )
    //  */
    // public function contactusMessages(){
    //     $messages = ContactusMessage::latest()->paginate();
    //     return response()->json($messages);
    // }
    // public function show()
    // {
    //     return view('dashboard.dashboard.home.aboutstatic');
    // }
    // public function contact()
    // {
    //     return view('dashboard.dashboard.contact.index');
    // }

    public function career()
    {
        return view('admin.pages.career.formstatec');
    }
}
