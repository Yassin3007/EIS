@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Create About Us</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{route('About Us.index')}}">About Us</a></li> --}}
        <li class="breadcrumb-item active">About Us Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">Add About Us</h3>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data"  action="{{ route('statics.store') }}">
            @csrf
            <div class="row">



              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>title  <span class="required_class">*</span></label>
                  <input type="text" name="about_title" maxlength="50"
                         value="{{ Statics::get('about_title') ?? old('about_title') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>pref  <span class="required_class">*</span></label>
                  <input type="text" name="about_pref" maxlength="50"
                         value="{{ Statics::get('about_pref')?? old('about_pref') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div> --}}


              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Founders Big Description En</label>
                  <textarea id="about_small_section_en" rows="5" class="form-control"
                            name="about_small_section_en">{{ Statics::get('about_small_section') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Founders Big Description Ar</label>
                  <textarea id="about_small_section_ar" rows="5" class="form-control"
                            name="about_small_section_ar">{{ Statics::get('about_small_section','ar') }}</textarea>
                </div>
              </div>





              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Founders Title En<span class="required_class">*</span> </label>
                  <textarea id="about_big_section" rows="3" class="form-control" name="about_big_section_en"
                            required>{{ Statics::get('about_big_section') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Founders Title Ar<span class="required_class">*</span> </label>
                  <textarea id="about_big_section" rows="3" class="form-control" name="about_big_section_ar"
                            required>{{ Statics::get('about_big_section','ar') }}</textarea>
                </div>
              </div>



              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Vision En</label>
                  <textarea  rows="5" name="our_vision_en" id="our_vision"
                         class="form-control" placeholder="Enter ...">
                              {{Statics::get('our_vision')}}
                         </textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Vision Ar</label>
                  <textarea  rows="5" name="our_vision_ar" id="our_vision"
                             class="form-control" placeholder="Enter ...">
                              {{Statics::get('our_vision','ar')}}
                         </textarea>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Mission En </label>
                  <textarea rows="5" name="our_mission_en"  id="our_mission"
                         class="form-control" placeholder="Enter ...">
                              {{Statics::get('our_mission')}}
                         </textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Mission Ar </label>
                  <textarea rows="5" name="our_mission_ar"  id="our_mission"
                            class="form-control" placeholder="Enter ...">
                              {{Statics::get('our_mission','ar')}}
                         </textarea>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Value En </label>
                  <textarea rows="5" name="our_value_en" id="our_value"
                         class="form-control" placeholder="Enter ...">
                            {{Statics::get('our_value')}}
                         </textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label> Our Value Ar</label>
                  <textarea rows="5" name="our_value_ar" id="our_value"
                            class="form-control" placeholder="Enter ...">
                            {{Statics::get('our_value','ar')}}
                         </textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_1 En</label>
                  <input type="text" name="value_text_1_en" value="{{ Statics::get('value_text_1') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_1 ar</label>
                  <input type="text" name="value_text_1_ar" value="{{ Statics::get('value_text_1','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_2 en</label>
                  <input type="text" name="value_text_2_en" value="{{ Statics::get('value_text_2') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_2 ar</label>
                  <input type="text" name="value_text_2_ar" value="{{ Statics::get('value_text_2','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_3 en</label>
                  <input type="text" name="value_text_3_en" value="{{ Statics::get('value_text_3') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_3 ar</label>
                  <input type="text" name="value_text_3_ar" value="{{ Statics::get('value_text_3','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>



              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_4 en</label>
                  <input type="text" name="value_text_4_en" value="{{ Statics::get('value_text_4') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_4 ar</label>
                  <input type="text" name="value_text_4_ar" value="{{ Statics::get('value_text_4','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>



              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_5 en</label>
                  <input type="text" name="value_text_5_en" value="{{ Statics::get('value_text_5') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_5 ar</label>
                  <input type="text" name="value_text_5_ar" value="{{ Statics::get('value_text_5','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>



              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_6 en</label>
                  <input type="text" name="value_text_6_en" value="{{ Statics::get('value_text_6') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_6 ar</label>
                  <input type="text" name="value_text_6_ar" value="{{ Statics::get('value_text_6','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>



              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_7 en</label>
                  <input type="text" name="value_text_7_en" value="{{ Statics::get('value_text_7') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>value_text_7 ar</label>
                  <input type="text" name="value_text_7_ar" value="{{ Statics::get('value_text_7','ar') }}"
                        class="form-control" placeholder="Enter ...">
                </div>
              </div>


            </div>

              {{-- here --}}

              <br>
              <hr style="width: 50%;border: 1px solid black;" >

              <div class="row" >


                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Founders image</h2>

                  </div>
                </div>

                <div class="col-sm-12">
                  @error('about_cover')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> About us image <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'about_cover'])
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




                <div class="col-sm-12">
                  @error('our_vision_image')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> Our vision image <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'our_vision_image'])
                    <div class="input-group">
                      <div class="custom-file">

                      </div>
                    </div>

                    @if ($our_vision_image)
                      <div class="form-group">
                        <label class="my-3">Our vision  Image </label>
                        <div class="d-flex flex-wrap ">
                            <div id="{{$our_vision_image->id}}" class="image_container">
                              <img src="{{$our_vision_image->full_url}}">
                              <button type="button" class="btn remove-image">Remove</button>
                            </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>



                <div class="col-sm-12">
                  @error('our_mission_image')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> Our mission image <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'our_mission_image'])
                    <div class="input-group">
                      <div class="custom-file">

                      </div>
                    </div>

                    @if ($our_mission_image)
                      <div class="form-group">
                        <label class="my-3">Our mission Image </label>
                        <div class="d-flex flex-wrap ">
                            <div id="{{$our_mission_image->id}}" class="image_container">
                              <img src="{{$our_mission_image->full_url}}">
                              <button type="button" class="btn remove-image">Remove</button>
                            </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>



                <br>
                <hr style="width: 50%;border: 1px solid black;" >


                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Our people Section</h2>

                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Our people Section Title En</label>
                    <textarea id="our_people_title" rows="5" class="form-control"
                              name="our_people_title_en">{{ Statics::get('our_people_title') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Our people Section Title Ar</label>
                    <textarea id="our_people_title" rows="5" class="form-control"
                              name="our_people_title_ar">{{ Statics::get('our_people_title','ar') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Our people Section Description En</label>
                    <textarea id="our_people_description" rows="5" class="form-control"
                              name="our_people_description_en">{{ Statics::get('our_people_description') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Our people Section Description Ar</label>
                    <textarea id="our_people_description" rows="5" class="form-control"
                              name="our_people_description_ar">{{ Statics::get('our_people_description','ar') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-12">
                  @error('our_people_section_image')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> Our people Section image <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'our_people_section_image'])
                    <div class="input-group">
                      <div class="custom-file">

                      </div>
                    </div>

                    @if ($our_people_section_image)
                      <div class="form-group">
                        <label class="my-3">Our people Section  Image </label>
                        <div class="d-flex flex-wrap ">
                            <div id="{{$our_people_section_image->id}}" class="image_container">
                              <img src="{{$our_people_section_image->full_url}}">
                              <button type="button" class="btn remove-image">Remove</button>
                            </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>



{{--                <div class="col-sm-12">--}}
{{--                  @error('our_people_section_image_2')--}}
{{--                  <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                  @enderror--}}
{{--                  <div class="form-group">--}}
{{--                    <label for="exampleInputFile"> Our people Section image 2 <span class="required_class">*  Max Image size is 5M</span></label>--}}
{{--                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'our_people_section_image_2'])--}}
{{--                    <div class="input-group">--}}
{{--                      <div class="custom-file">--}}

{{--                      </div>--}}
{{--                    </div>--}}

{{--                    @if ($our_people_section_image_2)--}}
{{--                      <div class="form-group">--}}
{{--                        <label class="my-3">Our people Section  Image 2 </label>--}}
{{--                        <div class="d-flex flex-wrap ">--}}
{{--                            <div id="{{$our_people_section_image_2->id}}" class="image_container">--}}
{{--                              <img src="{{$our_people_section_image_2->full_url}}">--}}
{{--                              <button type="button" class="btn remove-image">Remove</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    @endif--}}
{{--                  </div>--}}
{{--                </div>--}}

                <div class="col-sm-12">
                  @error('careers_page_cover')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> Careers Cover <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'careers_page_cover'])
                    <div class="input-group">
                      <div class="custom-file">

                      </div>
                    </div>

                    @if ($careers_page_cover)
                      <div class="form-group">
                        <label class="my-3">Careers Cover </label>
                        <div class="d-flex flex-wrap ">
                          <div id="{{$careers_page_cover->id}}" class="image_container">
                            <img src="{{$careers_page_cover->full_url}}">
                            <button type="button" class="btn remove-image">Remove</button>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>

                <br>
                <hr style="width: 50%;border: 1px solid black;" >


                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">favicon</h2>

                  </div>
                </div>


                <div class="col-sm-12">
                  @error('favicon')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputFile"> favicon <span class="required_class">*  Max Image size is 5M</span></label>
                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'favicon'])
                    <div class="input-group">
                      <div class="custom-file">

                      </div>
                    </div>

                    @if ($favicon)
                      <div class="form-group">
                        <label class="my-3">favicon </label>
                        <div class="d-flex flex-wrap ">
                          <div id="{{$favicon->id}}" class="image_container">
                            <img src="{{$favicon->full_url}}">
                            <button type="button" class="btn remove-image">Remove</button>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>


                <br>
                <hr style="width: 50%;border: 1px solid black;" >

                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Services</h2>

                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <label>services title En</label>
                    <input type="text" name="services_title_en" value="{{ Statics::get('services_title') }}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>services title Ar</label>
                    <input type="text" name="services_title_ar" value="{{ Statics::get('services_title','ar') }}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label> services description En</label>
                    <textarea rows="5" name="services_description_en" id="our_value"
                              class="form-control" placeholder="Enter ...">
                            {{Statics::get('services_description')}}
                         </textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label> services description Ar</label>
                    <textarea rows="5" name="services_description_ar" id="our_value"
                              class="form-control" placeholder="Enter ...">
                            {{Statics::get('services_description','ar')}}
                         </textarea>
                  </div>
                </div>


                <br>
                <hr style="width: 50%;border: 1px solid black;" >

                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Privacy Policy</h2>

                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Privacy Policy En</label>
                    <textarea id="policy_en" rows="5" class="form-control"
                              name="policy_en">{{ Statics::get('policy') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Privacy Policy Ar</label>
                    <textarea id="policy_ar" rows="5" class="form-control"
                              name="policy_ar">{{ Statics::get('policy','ar') }}</textarea>
                  </div>
                </div>


                <div class="images-inputs-container">
                </div>

              </div>


{{--            </div>--}}
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="card card-create">
    <div class="card-header">
      <h3 class="card-title">About Us Images</h3>
    </div>
    <div class="card-body">
      <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('home.aboutus.store') }}">
        @csrf
        <div class="row">




          <div class="col-sm-12">
            @error('about_us_image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="exampleInputFile"> About us image or video <span class="required_class">*</span></label>
              @include('admin.pages.commonWidgets.dropzone',['inputName'=>'about_us_image'])
              <div class="input-group">
                <div class="custom-file">

                </div>
              </div>

              @if ($aboutImage)
                <div class="form-group">
                  <label class="my-3">about us Images </label>
                  <div class="d-flex flex-wrap ">
                    @foreach ($aboutImage as $image)
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
            @error('about_us_images')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="exampleInputFile"> About us images or videos <span class="required_class">*</span></label>
              @include('admin.pages.commonWidgets.dropzone',['inputName'=>'about_us_images[]'])
              <div class="input-group">
                <div class="custom-file">

                </div>
              </div>

              @if ($aboutImages)
                <div class="form-group">
                  <label class="my-3">about us Images </label>
                  <div class="d-flex flex-wrap ">
                    @foreach ($aboutImages as $image)
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

@section('page_level_js')
  @include('admin.pages.commonWidgets.dropzone-script')


  <script>
    $(function () {
      $('#about_big_section_en') .summernote({
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
      $('#about_big_section_en').summernote('formatPara');

      $('#about_small_section_en') .summernote({
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
      $('#about_small_section_en').summernote('formatPara');
      // head_office_1_location_text
      $('#head_office_1_location_text') .summernote({
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
      $('#head_office_1_location_text').summernote('formatPara');

      $('#sales_center_1_location_text') .summernote({
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
      $('#sales_center_1_location_text').summernote('formatPara');
      // sales_center_2_location_text
      $('#sales_center_2_location_text') .summernote({
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
      $('#sales_center_2_location_text').summernote('formatPara');

      // our_value
      $('#our_value_en') .summernote({
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
      $('#our_value_en').summernote('formatPara');

      // our_mission
      $('#our_mission_en') .summernote({
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
      $('#our_mission_en').summernote('formatPara');

      // our_vision
      $('#our_vision_en').summernote({
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
      $('#our_vision_en').summernote('formatPara');


      $('#about_big_section_ar') .summernote({
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
      $('#about_big_section_ar').summernote('formatPara');

      $('#about_small_section_ar') .summernote({
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
      $('#about_small_section_ar').summernote('formatPara');

      // our_value
      $('#our_value_ar') .summernote({
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
      $('#our_value_ar').summernote('formatPara');

      // our_mission
      $('#our_mission_ar') .summernote({
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
      $('#our_mission_ar').summernote('formatPara');

      // our_vision
      $('#our_vision_ar').summernote({
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
      $('#our_vision_ar').summernote('formatPara');

      $('#policy_en').summernote({
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

      $('#policy_ar').summernote({
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

    })



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
