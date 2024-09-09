<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function allArticles()
    {
        $articles = News::orderBy('created_at', 'desc')->paginate(10);
        $specials = News::where('is_special',1)->orderBy('created_at', 'desc')->get();
        return view('site.articles',compact('articles','specials'));
    }
    public function article_details( $id){
        $article = News::findOrFail($id);
        $specials = News::where('is_special',1)->orderBy('created_at', 'desc')->get();
        return view('site.article',compact('article','specials'));
    }
}
