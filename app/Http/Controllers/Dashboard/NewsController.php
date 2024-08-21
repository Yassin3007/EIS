<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use App\Models\News;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $news=News::where('type',null)->latest()->paginate(10);
        // return  $projects;
        return view('admin.pages.news.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news=new News();
        return view('admin.pages.news.form',compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en'=> 'required',
            'content_en'=> 'required',
            'image'=> 'required',

            ]);
            $news= new News();

            $news->title_en = $request->title_en;
            $news->title_ar = $request->title_ar;
            $news->pref_en = $request->pref_en;
            $news->pref_ar = $request->pref_ar;
            $news->content_en = $request->content_en;
            $news->content_ar = $request->content_ar;

            $news->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en=$request->image_alt_en;
            $image->alt_ar=$request->image_alt_ar;
            $image->imageable_type = News::class;
            $image->imageable_id = $news->id;
            $image->project_position='image';
            $image->update();
            $news->update(['image' => $image->url,]);
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.pages.news.form',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.pages.news.form',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title_en'=> 'required',
            'content_en'=> 'required',
            ]);

            $news->title_en = $request->title_en;
            $news->title_ar = $request->title_ar;
            $news->pref_en = $request->pref_en;
            $news->pref_ar = $request->pref_ar;
            $news->content_en = $request->content_en;
            $news->content_ar = $request->content_ar;

            $news->save();
        if ($request->image) {
            $image = Image::find($request->image);
            $image->type = 'image';
            $image->alt_en=$request->image_alt_en;
            $image->alt_ar=$request->image_alt_ar;
            $image->imageable_type = News::class;
            $image->imageable_id = $news->id;
            $image->project_position='image';
            $image->update();
            $news->update(['image' => $image->url,]);
        // $this->saveImageModel($imageFile,$request->alt,$request->alt,$project,'image','logo');
        }
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message'=>'Success']);
    }
}
