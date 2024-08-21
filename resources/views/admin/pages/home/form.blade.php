@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Create Home</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{route('Home.index')}}">Home</a></li> --}}
        <li class="breadcrumb-item active">Home Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">Add Home</h3>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('statics.store') }}">
            @csrf
            <div class="row">

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Slider Title En</label>
                      <input type="text" min="0" name="slider_title_en" value="{{App\Models\Statics::get('slider_title')}}"
                             class="form-control" placeholder="Enter ...">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Slider Title Ar</label>
                      <input type="text" min="0" name="slider_title_ar" value="{{App\Models\Statics::get('slider_title','ar')}}"
                             class="form-control" placeholder="Enter ...">
                    </div>
                  </div>


              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Slider Description En</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="slider_description_en">{{ App\Models\Statics::get('slider_description') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Slider Description Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="slider_description_ar">{{ App\Models\Statics::get('slider_description','ar') }}</textarea>
                </div>
              </div>



              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Deco Home Section En</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="home_about_section_en">{{ App\Models\Statics::get('home_about_section') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Deco Home Section Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="home_about_section_ar">{{ App\Models\Statics::get('home_about_section','ar') }}</textarea>
                </div>
              </div>




              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> Deco Intresting Facts Home Section En</label>
                  <textarea id="intresting_facts" rows="5" class="form-control"
                            name="intresting_facts_en">{{ App\Models\Statics::get('intresting_facts') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> Deco Intresting Facts Home Section Ar</label>
                  <textarea id="intresting_facts" rows="5" class="form-control"
                            name="intresting_facts_ar">{{ App\Models\Statics::get('intresting_facts','ar') }}</textarea>
                </div>
              </div>



              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> Deco Services Description En</label>
                  <textarea id="policy" rows="5" class="form-control"
                            name="service_description_en">{{ App\Models\Statics::get('service_description') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> Deco Services Description Ar</label>
                  <textarea id="policy" rows="5" class="form-control"
                            name="service_description_ar">{{ App\Models\Statics::get('service_description','ar') }}</textarea>
                </div>
              </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label> Deco Locations Description En</label>
                        <textarea id="policy" rows="5" class="form-control"
                                  name="location_description_en">{{ App\Models\Statics::get('location_description') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label> Deco Locations Description Ar</label>
                        <textarea id="policy" rows="5" class="form-control"
                                  name="location_description_ar">{{ App\Models\Statics::get('location_description','ar') }}</textarea>
                    </div>
                </div>

              <br>

{{--                <div class="col-sm-6">--}}
{{--                    <!-- text input -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Blogs Title En</label>--}}
{{--                        <input type="text" min="0" name="blog_title_en" value="{{App\Models\Statics::get('blog_title')}}"--}}
{{--                               class="form-control" placeholder="Enter ...">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-sm-6">--}}
{{--                    <!-- text input -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Blogs Title Ar</label>--}}
{{--                        <input type="text" min="0" name="blog_title_ar" value="{{App\Models\Statics::get('blog_title','ar')}}"--}}
{{--                               class="form-control" placeholder="Enter ...">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <br>--}}
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label> Deco Blogs Description En</label>
                        <textarea id="policy" rows="5" class="form-control"
                                  name="blog_description_en">{{ App\Models\Statics::get('blog_description') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label> Deco Blogs Description Ar</label>
                        <textarea id="policy" rows="5" class="form-control"
                                  name="blog_description_ar">{{ App\Models\Statics::get('blog_description','ar') }}</textarea>
                    </div>
                </div>

                <br>
              <hr style="width: 50%;border: 1px solid black;" >


              <div class="row">

                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Deco Numbers Info</h2>

                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count Number 1 </label>
                    <input type="number" min="0" name="location" value="{{App\Models\Statics::get('location')}}"
                          class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 1 En</label>
                    <input type="text" min="0" name="count_text_1_en" value="{{App\Models\Statics::get('count_text_1')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 1 Ar</label>
                    <input type="text" min="0" name="count_text_1_ar" value="{{App\Models\Statics::get('count_text_1','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <br>


                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count Number 2 </label>
                    <input type="number" min="0" name="employees" value="{{App\Models\Statics::get('employees')}}"
                          class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 2 En</label>
                    <input type="text" min="0" name="count_text_2_en" value="{{App\Models\Statics::get('count_text_2')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 2 Ar</label>
                    <input type="text" min="0" name="count_text_2_ar" value="{{App\Models\Statics::get('count_text_2','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <br>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count Number 3 </label>
                    <input type="number" min="0" name="clients" value="{{App\Models\Statics::get('clients')}}"
                          class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 3 En</label>
                    <input type="text" min="0" name="count_text_3_en" value="{{App\Models\Statics::get('count_text_3')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 3 Ar</label>
                    <input type="text" min="0" name="count_text_3_ar" value="{{App\Models\Statics::get('count_text_3','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>


                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count Number 4 </label>
                    <input type="number" min="0" name="awards" value="{{App\Models\Statics::get('awards')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 4 En</label>
                    <input type="text" min="0" name="count_text_4_en" value="{{App\Models\Statics::get('count_text_4')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>count text 4 Ar</label>
                    <input type="text" min="0" name="count_text_4_ar" value="{{App\Models\Statics::get('count_text_4','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>



              </div>


              <br>
              <hr style="width: 50%;border: 1px solid black;" >




              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Deco Contact Info</h2>

                  </div>
                </div>


                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco Address En</label>
                    <textarea id="address" rows="5" class="form-control"
                              name="address_en">{{ App\Models\Statics::get('address') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco Address Ar</label>
                    <textarea id="address" rows="5" class="form-control"
                              name="address_ar">{{ App\Models\Statics::get('address','ar') }}</textarea>
                  </div>
                </div>


                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco Google Map Link </label>
                    <textarea id="map_iframe" rows="5" class="form-control"
                              name="map_iframe">{{ App\Models\Statics::get('map_iframe') }}</textarea>
                  </div>
                </div>


                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="email" value="{{App\Models\Statics::get('email')}}" class="form-control"
                           placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Phone </label>
                    <input type="text" name="hotline" value="{{App\Models\Statics::get('hotline')}}" class="form-control"
                           placeholder="Enter ...">
                  </div>
                </div>


{{--                <div class="col-sm-6">--}}
{{--                  <!-- text input -->--}}
{{--                  <div class="form-group">--}}
{{--                    <label>Fax </label>--}}
{{--                    <input type="text" name="fax" value="{{App\Models\Statics::get('fax')}}" class="form-control"--}}
{{--                           placeholder="Enter ...">--}}
{{--                  </div>--}}
{{--                </div>--}}

                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>FaceBook link</label>
                      <input type="text" name="facebook_link" value="{{ App\Models\Statics::get('facebook_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Instagram link</label>
                      <input type="text" name="instagram_link" value="{{ App\Models\Statics::get('instagram_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Threads link</label>
                      <input type="text" name="threads_link" value="{{ App\Models\Statics::get('threads_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>

{{--                  <div class="col-sm-6">--}}
{{--                    <div class="form-group">--}}
{{--                      <label>Whatsapp Number</label>--}}
{{--                      <input type="text" name="whatsapp_number" value="{{ App\Models\Statics::get('whatsapp_number') }}"--}}
{{--                            class="form-control" placeholder="Enter ...">--}}
{{--                    </div>--}}
{{--                  </div>--}}
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Twitter link</label>
                      <input type="text" name="twitter_link" value="{{ App\Models\Statics::get('twitter_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>linkedin link</label>
                      <input type="text" name="linkedin_link" value="{{ App\Models\Statics::get('linkedin_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>youtube link</label>
                      <input type="text" name="youtube_link" value="{{ App\Models\Statics::get('youtube_link') }}"
                            class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Whatsapp Number</label>
                          <input type="text" name="whatsapp_number" value="{{ App\Models\Statics::get('whatsapp_number') }}"
                                 class="form-control" placeholder="Enter ...">
                      </div>
                  </div>

              </div>


              <br>
              <hr class="col-sm-12" style="width: 50%;border: 1px solid black;" >

              <div class="row" >

                <div class="col-sm-12">
                    <div class="form-group">
                      {{-- <hr size="30"> --}}
                      <h2 style="display: block">Deco Home page video</h2>

                    </div>
                  </div>



                  <div class="col-sm-12">
                    @error('slider_images')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="exampleInputFile"> Home Page Slider images <span class="required_class">*</span></label>
                      @include('admin.pages.commonWidgets.dropzone',['inputName'=>'slider_images[]'])
                      <div class="input-group">
                        <div class="custom-file">

                        </div>
                      </div>

                      @if (count($sliderImages))
                        <div class="form-group">
                          <label class="my-3">Slider Images </label>
                          <div class="d-flex flex-wrap ">
                            @foreach ($sliderImages as $image)
                              <div id="{{$image->id}}" class="image_container">
                                <img src="{{$image->full_url}}">
                                <button type="button" class="btn remove-image">Remove</button>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>





                  <div class="col-sm-12">
                    @error('home_video')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="exampleInputFile"> Deco Home page video <span class="required_class">*  Max Image size is 20M</span></label>
                      @include('admin.pages.commonWidgets.dropzone_for_single_video',['inputName'=>'home_video'])
                      <div class="input-group">
                        <div class="custom-file">

                        </div>
                      </div>

                      @if ($home_video)
                        <div class="form-group">
                          <label class="my-3">Deco Home page video </label>
                          <div class="d-flex flex-wrap ">
  {{--                          @foreach ($home_video as $image)--}}
                              <div id="{{$home_video->id}}" class="image_container">
                                {{-- <img src="{{$image->full_url}}"> --}}
                                <video width="320" height="240" controls>
                                  <source src="{{$home_video->full_url}}" type="video/mp4">
                                  <source src="{{$home_video->full_url}}" type="video/ogg">
                                  Your browser does not support the video tag.
                                </video>
                                <button type="button" class="btn remove-image">Remove</button>
                              </div>
  {{--                          @endforeach--}}
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-12">
                      @error('about_cover')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="exampleInputFile">  Video Thumbnail image <span class="required_class">*  Max Image size is 5M</span></label>
                          @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'video_thumbnail'])
                          <div class="input-group">
                              <div class="custom-file">

                              </div>
                          </div>

                          @if ($video_thumbnail)
                              <div class="form-group">
                                  <label class="my-3">Video Thumbnail image </label>
                                  <div class="d-flex flex-wrap ">
                                      <div id="{{$video_thumbnail->id}}" class="image_container">
                                          <img src="{{$video_thumbnail->full_url}}">
                                          <button type="button" class="btn remove-image">Remove</button>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      </div>
                  </div>

                  <div class="col-sm-12">
                    @error('about_cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="exampleInputFile"> About us image <span class="required_class">*  Max Image size is 5M</span></label>
                      @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'about_cover'])
                      <div class="input-group">
                        <div class="custom-file">

                        </div>
                      </div>

                      @if ($aboutImage)
                        <div class="form-group">
                          <label class="my-3">about us Image </label>
                          <div class="d-flex flex-wrap ">
                              <div id="{{$aboutImage->id}}" class="image_container">
                                <img src="{{$aboutImage->full_url}}">
                                <button type="button" class="btn remove-image">Remove</button>
                              </div>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>





                <div class="images-inputs-container">
                </div>

              </div>

            </div>
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div>

      {{-- <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">Partners</h3>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('home.partners.store') }}">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                @error('slider_images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputFile"> Slider images or videos <span class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone',['inputName'=>'slider_images[]'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($sliderImages))
                    <div class="form-group">
                      <label class="my-3">Partner Images </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($sliderImages as $image)
                          <div id="{{$image->id}}" class="image_container">
                            <img src="{{$image->full_url}}">
                            <button type="button" class="btn remove-image">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="images-inputs-container">
            </div>
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div> --}}
    </div>
  </div>
@section('page_level_js')
  @include('admin.pages.commonWidgets.dropzone-script')

  <script>
    $(function () {
      $('#home_about_section_en') .summernote({
     toolbar: [
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
});
      $('#home_about_section_en').summernote('formatPara');

      $('#home_about_section_ar') .summernote({
        toolbar: [
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ]
      });
      $('#home_about_section_ar').summernote('formatPara');

      $('#policy_en') .summernote({
     toolbar: [
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
});
      $('#policy_en').summernote('formatPara');

      $('#policy_ar') .summernote({
        toolbar: [
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ]
      });
      $('#policy_ar').summernote('formatPara');

      $('#home_achievements_section_en') .summernote({
     toolbar: [
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
});
      $('#home_achievements_section_en').summernote('formatPara');

      $('#home_achievements_section_ar') .summernote({
        toolbar: [
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ]
      });
      $('#home_achievements_section_ar').summernote('formatPara');


      $('#address_en') .summernote({
     toolbar: [
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
});
      $('#address_en').summernote('formatPara');

      $('#address_ar') .summernote({
        toolbar: [
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ]
      });
      $('#address_ar').summernote('formatPara');

      $('#intresting_facts_en') .summernote({
     toolbar: [
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
});
      $('#intresting_facts_en').summernote('formatPara');

      $('#intresting_facts_ar') .summernote({
        toolbar: [
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ]
      });
      $('#intresting_facts_ar').summernote('formatPara');



    });




    </script>

<script>
    $('.remove').click(function () {
      var id = $(this).parents('div').attr('id')
      swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url('/dashboard/image/delete/') }}' + '/' + id,
            type: 'Post',
            error: function () {
              swal.fire({
                title: 'Something is wrong',
                icon: 'error'
              })
            },
            success: function (data) {
              $('#' + id).remove()
              swal.fire({
                title: 'Deleted!',
                icon: 'success'
              })
            }
          })
        }
      })
    })
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
</script>

@endsection
@endsection
