<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Statics;
use Illuminate\Http\Request;

class AboutUsController extends ApiBaseController
{
    public function getContent()
    {
        try {
            $data = array(
                'about_us_slider_images' => Image::query()->where('type', Image::TYPE_ABOUT_SLIDER_IMAGES)->get(),
                'about_us_values_images' => Image::query()->where('type', Image::TYPE_ABOUT_VALUE_IMAGES)->get(),

                'aboutUs' => Statics::getWithCurrentLang('aboutUs'),

                'value_1' => array('value_title_1' => Statics::getWithCurrentLang('value_title_1'), 'value_description_1' => Statics::getWithCurrentLang('value_description_1')),
                'value_2' => array('value_title_2' => Statics::getWithCurrentLang('value_title_2'), 'value_description_2' => Statics::getWithCurrentLang('value_description_2')),
                'value_3' => array('value_title_3' => Statics::getWithCurrentLang('value_title_3'), 'value_description_3' => Statics::getWithCurrentLang('value_description_3')),
                'additional_section' => array('additional_title' => Statics::getWithCurrentLang('additional_title'), 'additional_description' => Statics::getWithCurrentLang('additional_description')),
                'history' => array('history_title' => Statics::getWithCurrentLang('history_title'), 'history' => Statics::getWithCurrentLang('history')),
                'vision' => array('vision_title' => Statics::getWithCurrentLang('vision_title'), 'vision' => Statics::getWithCurrentLang('vision')),



            );
            return apiResponse('api.success_operation', $data);
        } catch (\PDOException $ex) {
            return apiResponse('api.Wrong', [], 500, 500);
        }
    }
}
