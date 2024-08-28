<?php

// use App\Http\Controllers\Dashboard\CountryController;
// use App\Http\Controllers\Dashboard\CompoundController;
// use App\Http\Controllers\Dashboard\DistrictController;
// use App\Http\Controllers\Dashboard\PropertyController;
// use App\Http\Controllers\Dashboard\GovernmentController;
// use App\Http\Controllers\Dashboard\PropertyTypeController;
Route::get('/download/{id}', 'NewCareerController@getDownload');
Auth::routes(['register' => false]);
Route::group(['middleware'=>'auth'],function (){

    Route::resource('service','ServiceController');
    Route::resource('material','MaterialController');
    Route::resource('banner','BannerController');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('label','LabelController');
    Route::resource('album','AlbumController');
    Route::resource('/news', 'NewsController');
    Route::resource('/testimonial', 'TestimonialController');
    Route::resource('/location', 'LocationController');
    Route::get('home','HomeController@static')->name('home.static');
    Route::get('about-us','PagesController@aboutUs')->name('aboutUs.static');
    Route::get('service-page','PagesController@servicePage')->name('servicePage.static');




    Route::post('image/storeimage','ImageController@store')->middleware('optimizeImages')->name('Image.store');
    Route::post('video/storevideo','ImageController@storeVideos')->middleware('optimizeImages')->name('video.store');

    Route::resource('contact_us','ContactUsController');

    // Route::resource('article','ArticleController');
    // Route::resource('event','EventController');
    Route::resource('message','MessageController');
    // Route::resource('requests','RequestInfoController');
     Route::resource('subscriber','SubscriberController');
    Route::get('user/profile','UserController@profile')->name('user.profile');
    Route::resource('user','UserController');
    Route::put('/note/done/{id}', 'ToDoListController@done');
    Route::resource('note','ToDoListController');
    Route::resource('slider','SliderController');
        // home_sliders
    Route::resource('home_sliders','HomeSliderController');
    Route::get('/','HomeController@dashboard')->name('dashboard.view');
    Route::post('logout','UserController@logout')->name('logout');
    Route::resource('statics','StaticsController');
    Route::get('contact-us','StaticsController@contactUs');

    Route::post('home/partners','HomeController@storePartners')->name('home.partners.store');
    Route::post('home/aboutus','HomeController@storeAboutUs')->name('home.aboutus.store');
    // Route::get('career/statice','HomeController@career')->name('career.static');

    Route::post('project/inhome/{id}','ProjectController@inhome');
    // changeIndex
    Route::post('project/changeIndex/{id}','ProjectController@changeIndex');

    Route::resource('project','ProjectController');
    Route::resource('office','OfficeController');
    Route::resource('setting','GlobalSettingController');
    Route::post('setting/status/{id}','GlobalSettingController@status');
    Route::resource('sales_center','SalesCenterController');
    Route::post('office/status/{id}','OfficeController@status');
    Route::resource('channel','ChannelController');
    Route::post('channel/status/{id}','ChannelController@status');
    Route::resource('chat','ChatController');
    // Construction Updates
    Route::resource('construction_updates','ConstructionUpdateController');
    Route::resource('department','DepartmentController');
    Route::post('department/status/{id}','DepartmentController@status');
    // career
    Route::resource('career','NewCareerController');


    Route::resource('roles','RoleController');
    Route::resource('teamMembers','TeamController');
    Route::post('image/delete/{id}','ImageController@destroy')->name('image.destroy');
    Route::post('project/delete/','ProjectController@destroy')->name('remove.image');
    Route::get('seo','StaticsController@seo')->name('seo.index');
    // Route::post('/career/isactive/{id}', 'CareerController@isactive');
    Route::resource('about-us-sections','PolicyController')->parameters(['about_us_section'=>'policy']);
    Route::resource('/policy', 'PolicyController');
    Route::resource('/media_center', 'MediaCenterController');
    Route::resource('/life_style', 'LifeStyleController');
    // Route::resource('/faq', 'FAQController');
    // Route::get('leads/seo', 'LeadsController@seo');
    // Route::resource('leads', 'LeadsController');
    // Route::resource('unitType', 'UnitTypeController');

    //##################################
    // gemyi start from here 17-5-2022
    // #################################


    /*
    * governments
    */
    Route::Resource('governments',GovernmentController::class);
    // import & export routes
    Route::get('governments_file-import',[GovernmentController::class,'importView']);
    Route::post('import_governments',[GovernmentController::class,'import']);
    Route::get('export_governments',[GovernmentController::class,'exportgovernments']);

    Route::get('get_governments_by_country_id/{country}',[GovernmentController::class,'getGovernmentsByCountryId']);

    /*
    * countries
    */
    Route::Resource('countries',CountryController::class);
    // import & export routes
    Route::get('countries_file-import',[CountryController::class,'importView']);
    Route::post('import_countries',[CountryController::class,'import']);
    Route::get('export_countries',[CountryController::class,'exportCountries']);


    /*
    * companies
    */
    Route::Resource('companies',CompanyController::class);
    // import & export routes
    Route::get('companies_file-import',[CompanyController::class,'importView']);
    Route::post('import_companies',[CompanyController::class,'import']);
    Route::get('export_companies',[CompanyController::class,'exportCompanies']);

    /*
    * districts
    */
    Route::Resource('districts',DistrictController::class);
    // import & export routes
    Route::get('districts_file-import',[DistrictController::class,'importView']);
    Route::post('import_districts',[DistrictController::class,'import']);
    Route::get('export_districts',[DistrictController::class,'exportdistricts']);
    Route::get('get_districts_by_government_id/{government}',[DistrictController::class,'getDistrictsByGovernmentId']);

    /*
    * compounds
    */
    Route::Resource('compounds',CompoundController::class);
    // import & export routes
    Route::get('compounds_file-import',[CompoundController::class,'importView']);
    Route::post('import_compounds',[CompoundController::class,'import']);
    Route::get('export_compounds',[CompoundController::class,'exportcompounds']);
    Route::get('get_compounds_by_district_id/{district}',[CompoundController::class,'getDistrictasByDistrictId']);

    /*
    * property_types
    */
    Route::Resource('property_types',PropertyTypeController::class);
    // import & export routes
    Route::get('property_types_file-import',[PropertyTypeController::class,'importView']);
    Route::post('import_property_types',[PropertyTypeController::class,'import']);
    Route::get('export_property_types',[PropertyTypeController::class,'exportProperty_types']);

    /*
    * properties
    */
    Route::Resource('properties',PropertyController::class);
    // import & export routes
    Route::get('property_file-import',[PropertyController::class,'importView']);
    Route::post('import_property',[PropertyController::class,'import']);
    Route::get('export_property',[PropertyController::class,'exportProperty']);
    // delete cetain image
    Route::delete('property_image/{property_image_id}',[PropertyController::class,'destroyCertainImage']);
    Route::get('property_images/{property_id}',[PropertyController::class,'getPropertyImages']);

    Route::post('upload_property_images/{property}',[PropertyController::class,'storeImages'])->middleware('optimizeImages');


    Route::post('upload_property_videos/{property}',[PropertyController::class,'storeVedios']);
});
