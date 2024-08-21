<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutUs(){
        $aboutImages = Image::query()->where('type', Image::TYPE_ABOUT_SLIDER_IMAGES)->get();
        $valuesImages = Image::query()->where('type', Image::TYPE_ABOUT_VALUE_IMAGES)->get();

        return view('admin.pages.aboutUs.form',compact('aboutImages','valuesImages'));

    }
    public function servicePage(){
        return view('admin.pages.servicePage.form');
    }
}
