@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ $project->id ? 'Edit' : 'Add' }} Project</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
        <li class="breadcrumb-item active">Project Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')

{{-- error message --}}
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif


  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">{{ $project->id ? 'Edit' : 'Add' }} Project</h3>
        </div>
        <div class="card-body">
          <form action="{{ $project->id ? route('project.update', $project->id) : route('project.store') }}"
                method="POST" enctype="multipart/form-data">
            @csrf
            @if ($project->id)
              @method('put')
            @endif
            <div class="row">


              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>location English <span class="required_class">*</span></label>
                  <input type="text" name="location_en" maxlength="90"
                         value="{{ $project->location_en ?? old('location_en') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>location Arabic <span class="required_class">*</span></label>
                  <input type="text" name="location_ar" maxlength="90"
                         value="{{ $project->location_ar ?? old('location_ar') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div> --}}


              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Name  <span class="required_class">*</span></label>
                  <input type="text" name="name_en" maxlength="50"
                         value="{{ $project->name_en ?? old('name_en') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>
               <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Name Arabic <span class="required_class">*</span></label>
                  <input type="text" name="name_ar" maxlength="50"
                         value="{{ $project->name_ar ?? old('name_ar') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>




              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>unit types <span class="required_class">*</span></label>
                  <select class="ui fluid search dropdown" name="property_types[]" multiple="">

                    @foreach ($property_types as $property_type)
                        <option value="{{ $property_type->id }}"
                          {{$project->unitTypes->contains($project->id)?"selected":""}}
                          >{{ $property_type->name_en }}</option>
                    @endforeach

                  </select>
                </div>
              </div> --}}


              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>district <span class="required_class">*</span></label>
                  <select class="ui fluid search dropdown" name="district_id" >

                    @foreach ($districts as $district)

                        <option value="{{ $district->id }}" @if ($project->id && $project->district_id == $district->id) selected @endif >{{ $district->name_en }}</option>

                    @endforeach
                  </select>
                </div>
              </div> --}}




              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Description  <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" id="description_en" name="description_en"
                            required>{{ $project->description_en ?? old('description_en') }}</textarea>
                </div>
              </div>
               <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" id="description_ar" name="description_ar"
                            required>{{ $project->description_ar ?? old('description_ar') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>View Form </label>
                  <input type="checkbox" value="1" {{$project->view_form?'checked':''}}
                  name="view_form" class="done">
                </div>
              </div>

              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Area Space <span class="required_class">*</span></label>
                  <input type="number" name="area_space" min="0"
                         value="{{ $project->area_space ?? old('area_space') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div> --}}



              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>details English <span class="required_class">Press enter after every line to work as a list*</span> </label>
                  <textarea rows="5" class="form-control" name="details_en"
                            required>{{ $project->details_en ?? old('details_en') }}</textarea>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>details Arabic <span class="required_class"> Press enter after every line to work as a list *</span> </label>
                  <textarea rows="5" class="form-control" name="details_ar"
                            required>{{ $project->details_ar ?? old('details_ar') }}</textarea>
                </div>
              </div> --}}

              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label class="my-3">left figur Images ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="left_figur_alt_en" maxlength="90"
                         value="{{ $project->projectImages('left_figur')->first()->alt_en ?? old('left_figur_alt_en') }}"
                         class="form-control" required>
                </div>
              </div> --}}


              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label class="my-3">left figur Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="left_figur_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('left_figur')->first()->alt_ar ?? old('left_figur_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div> --}}


              {{-- <div class="col-sm-12">
                @error('left_figur')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label class="my-3"> project left figur <span class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'left_figur'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('left_figur')))
                    <div class="form-group">
                      <label class="my-3">project left figur </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($project->projectImages('left_figur') as $image)
                          <div id="{{$image->id}}" class="image_container">
                            <img src="{{$image->full_url}}">
                            <button type="button" class="btn remove">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Left Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="left_figure_details_en"
                            required>{{ $project->left_figure_details_en ?? old('left_figure_details_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Left Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="left_figure_details_ar"
                            required>{{ $project->left_figure_details_ar ?? old('left_figure_details_ar') }}</textarea>
                </div>
              </div> --}}

              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Main Video ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="main_video_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('main_video')->first()->alt_ar ?? old('main_video_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div> --}}


              {{-- <hr style="width: 750px;background: darkblue;">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>google maps iframe  <span class="required_class">*</span></label>
                  <input type="text" name="iframe"
                         value="{{ $project->iframe ?? old('iframe') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div> --}}



              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Location Video ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="location_video_alt_en" maxlength="90"
                         value="{{ $project->projectImages('location_video')->first()->alt_en ?? old('location_video_alt_en') }}"
                         class="form-control" required>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Location Video ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="location_video_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('location_video')->first()->alt_ar ?? old('location_video_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div> --}}



              {{-- <hr style="width: 750px;background: darkblue;"> --}}

              <div class="col-sm-6">
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('file')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile">project brochure file  <span class="required_class">* Max Pdf size is 20M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_file',['inputName'=>'file'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('file')))
                    <div class="form-group">
                      <label class="my-3">project brochure file</label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('file') as $image)--}}
                          <div id="{{$project->projectImages('file')->last()->id}}" class="image_container">
                            <img src="{{asset("assets/img/file.png")}}" alt="{{ $project->projectImages('file')->first()->alt_en }}">
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" type="video/mp4">
                              <source src="{{$image->full_url}}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>project brochure file ALT en </label>
                  <input type="text" name="file_alt_en"  maxlength="90"
                         value="{{ $project->projectImages('file')->first()->alt_en ?? old('file') }}"
                         class="form-control" >
                </div>
              </div>
               <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>project brochure file ALT ar </label>
                  <input type="text" name="file_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('file')->first()->alt_ar ?? old('file') }}"
                         class="form-control">
                </div>
              </div>

              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Center Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="center_figure_details_en"
                            required>{{ $project->center_figure_details_en ?? old('center_figure_details_en') }}</textarea>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Center Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="center_figure_details_ar"
                            required>{{ $project->center_figure_details_ar ?? old('center_figure_details_ar') }}</textarea>
                </div>
              </div> --}}

              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>right figur Images ALT EN <span class="required_class">*</span></label>
                  <input type="text" name="right_figur_alt_en" maxlength="90"
                         value="{{ $project->projectImages('right_figur')->first()->alt_en ?? old('right_figur_alt_en') }}"
                         class="form-control" required>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>right figur Images ALT ar <span class="required_class">*</span></label>
                  <input type="text" name="right_figur_alt_ar" maxlength="90"
                         value="{{ $project->projectImages('right_figur')->first()->alt_ar ?? old('right_figur_alt_ar') }}"
                         class="form-control" required>
                </div>
              </div> --}}
              {{-- <div class="col-sm-12">
                @error('right_figur')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputFile"> project right figur <span
                      class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'right_figur'])
                  <div class="input-group">
                    <div class="custom-file">
                    </div>
                  </div>
                  @if (count($project->projectImages('right_figur')))
                    <div class="form-group">
                      <label class="my-3">project right_figur </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($project->projectImages('right_figur') as $image)
                          <div id="{{ $image->id }}" class="image_container">
                            <img src="{{ $image->full_url }}">
                            <button type="button" class="btn remove">Remove</button>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Right Figure Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="right_figure_details_en"
                            required>{{ $project->right_figure_details_en ?? old('right_figure_details_en') }}</textarea>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Right Figure Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="right_figure_details_ar"
                            required>{{ $project->right_figure_details_ar ?? old('right_figure_details_ar') }}</textarea>
                </div>
              </div> --}}



              {{-- <hr style="width: 750px;background: darkblue;"> --}}

              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Design Concept Description English <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="d_c_description_en"
                            required>{{ $project->d_c_description_en ?? old('d_c_description_en') }}</textarea>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Design Concept Description Arabic <span class="required_class">*</span> </label>
                  <textarea rows="5" class="form-control" name="d_c_description_ar"
                            required>{{ $project->d_c_description_ar ?? old('d_c_description_ar') }}</textarea>
                </div>

              </div> --}}


              <div class="col-sm-6">
                @error('slider_image')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project slider image or video <span class="required_class">* Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_image_or_video',['inputName'=>'slider_image'])
{{--                  @include('admin.pages.commonWidgets.dropzone',['inputName'=>'slider_image'])--}}

                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('slider_image')))
                    <div class="form-group">
                      <label class="my-3">project slider image or video </label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('slider_image') as $image)--}}
                          <div id="{{$project->projectImages('slider_image')->last()->id}}" class="image_container">

                            @if ($project->projectImages('slider_image')->last()->slider_type == 'image')
                            <img src="{{$project->projectImages('slider_image')->last()->full_url}}">
                            @elseif ($project->projectImages('slider_image')->last()->slider_type == 'video')
                            <video width="320" height="240" controls>
                              <source src="{{$project->projectImages('slider_image')->last()->full_url}}" type="video/mp4">
                              <source src="{{$project->projectImages('slider_image')->last()->full_url}}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>
                            @endif
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/mp4">
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>



              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>slider image ALT  </label>
                  <input type="text" name="slider_image_alt_en"  maxlength="90"
                         value="{{ $project->projectImages('slider_image')->first()->alt_en ?? old('slider_image_alt_en') }}"
                         class="form-control" >
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>slider image ALT Ar  </label>
                  <input type="text" name="slider_image_alt_ar"  maxlength="90"
                         value="{{ $project->projectImages('slider_image')->first()->alt_ar ?? old('slider_image_alt_ar') }}"
                         class="form-control" >
                </div>
              </div>









              <div class="col-sm-6">
                @error('main_image')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project main image <span class="required_class">* Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'main_image'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('main_image')))
                    <div class="form-group">
                      <label class="my-3">project main image </label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('main_image') as $image)--}}
                          <div id="{{$project->projectImages('main_image')->last()->id}}" class="image_container">
                            <img src="{{$project->projectImages('main_image')->last()->full_url}}">
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/mp4">
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>



              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>main_image ALT  </label>
                  <input type="text" name="main_image_alt_en"  maxlength="90"
                         value="{{ $project->projectImages('main_image')->first()->alt_en ?? old('main_image_alt_en') }}"
                         class="form-control" >
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>main_image ALT Ar</label>
                  <input type="text" name="main_image_alt_ar"  maxlength="90"
                         value="{{ $project->projectImages('main_image')->first()->alt_ar ?? old('main_image_alt_ar') }}"
                         class="form-control" >
                </div>
              </div>






              <div class="col-sm-6">
                @error('form_image')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project form image <span class="required_class">Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'form_image'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('form_image')))
                    <div class="form-group">
                      <label class="my-3">project form image</label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('form_image') as $image)--}}
                          <div id="{{$project->projectImages('form_image')->last()->id}}" class="image_container">
                            <img src="{{$project->projectImages('form_image')->last()->full_url}}">
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/mp4">
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>



              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>form image ALT  </label>
                  <input type="text" name="form_image_alt_en"  maxlength="90"
                         value="{{ $project->projectImages('form_image')->first()->alt_en ?? old('form_image_alt_en') }}"
                         class="form-control" >
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>form image ALT  Ar</label>
                  <input type="text" name="form_image_alt_ar"  maxlength="90"
                         value="{{ $project->projectImages('form_image')->first()->alt_ar ?? old('form_image_alt_ar') }}"
                         class="form-control" >
                </div>
              </div>


              <div class="col-sm-6">
                @error('icon')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project icon <span class="required_class">* Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'icon'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('icon')))
                    <div class="form-group">
                      <label class="my-3">project icon </label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('icon') as $image)--}}
                          <div id="{{$project->projectImages('icon')->last()->id}}" class="image_container">
                            <img src="{{$project->projectImages('icon')->last()->full_url}}">
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/mp4">
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>


              <div class="col-sm-6">
                @error('icon_ar')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <!-- <input type="file"  name="center_figur"  class="form-control" placeholder="Enter ..." {{$project->projectImages('center_figur')?'':'required'}}> -->
                <div class="form-group">
                  <label for="exampleInputFile"> project icon ar <span class="required_class">* Max Image size is 5M</span></label>
                  @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'icon_ar'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($project->projectImages('icon_ar')))
                    <div class="form-group">
                      <label class="my-3">project icon ar </label>
                      <div class="d-flex flex-wrap ">
{{--                        @foreach ($project->projectImages('icon_ar') as $image)--}}
                          <div id="{{$project->projectImages('icon_ar')->last()->id}}" class="image_container">
                            <img src="{{$project->projectImages('icon_ar')->last()->full_url}}">
                            {{-- <video width="320" height="240" controls>
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/mp4">
                              <source src="{{$image->full_url}}" alt="{{ $project->projectImages('desgin_concept_image')->first()->alt_en }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> --}}
                            <button type="button" class="btn remove">Remove</button>
                          </div>
{{--                        @endforeach--}}
                      </div>
                    </div>
                  @endif
                </div>
              </div>



              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>icon ALT  </label>
                  <input type="text" name="icon_alt_en"  maxlength="90"
                         value="{{ $project->projectImages('icon')->first()->alt_en ?? old('icon_alt_en') }}"
                         class="form-control" >
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>icon ALT  Ar</label>
                  <input type="text" name="icon_alt_ar"  maxlength="90"
                         value="{{ $project->projectImages('icon')->first()->alt_ar ?? old('icon_alt_ar') }}"
                         class="form-control" >
                </div>
              </div>


              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>Count 1 </label>
                  <input type="number" min="0" name="count_1" value="{{ $project->count_1 ?? old('count_1') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 1 En</label>
                  <input type="text" min="0" name="count_text_1_en" value="{{ $project->count_text_1_en ?? old('count_text_1_en') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 1 Ar</label>
                  <input type="text" min="0" name="count_text_1_ar" value="{{ $project->count_text_1_ar ?? old('count_text_1_ar') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>Count 2 </label>
                  <input type="number" min="0" name="count_2" value="{{ $project->count_2 ?? old('count_2') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 2 En</label>
                  <input type="text" min="0" name="count_text_2_en" value="{{ $project->count_text_2_en ?? old('count_text_2_en') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 2 Ar</label>
                  <input type="text" min="0" name="count_text_2_ar" value="{{ $project->count_text_2_ar ?? old('count_text_2_ar') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>Count 3 </label>
                  <input type="number" min="0" name="count_3" value="{{ $project->count_3 ?? old('count_3') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 3 En</label>
                  <input type="text" min="0" name="count_text_3_en" value="{{ $project->count_text_3_en ?? old('count_text_3_en') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                  <label>count text 3 Ar</label>
                  <input type="text" min="0" name="count_text_3_ar" value="{{ $project->count_text_3_ar ?? old('count_text_3_ar') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>


              <div class="col-sm-12">
                @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Project Images Or Videos <span class="required_class">* Max Image size is 5M</span>
                  {{-- @include('admin.pages.commonWidgets.dropzone',['inputName'=>'file']) --}}
                </label>
                @include('admin.pages.commonWidgets.dropzone',['inputName'=>'images[]'])

                @if (count($project->projectImages('project')))
                  <div class="form-group">
                    <label class="my-3">Project Images Or Videos</label>
                    <div class="d-flex flex-wrap ">
                      @foreach ($project->projectImages('project') as $image)
                        <div id="{{ $image->id }}" class="image_container">
                          @if ($image->slider_type == 'image')
                            <img src="{{ $image->full_url }}">
                          @elseif ($image->slider_type == 'video')
                            <video width="320" height="240" controls>
                            <source src="{{$image->full_url}}" type="video/mp4">
                            <source src="{{$image->full_url}}" type="video/ogg">
                            Your browser does not support the video tag.
                          </video>
                          @endif
                          <button type="button" class="btn remove">Remove</button>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>






              {{-- @seoForm($project) --}}
            </div>

            {{-- @seoForm($project) --}}


            <div class="images-inputs-container">
            </div>
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('page_level_js')
  {{-- @include('admin') --}}
  @include('admin.pages.commonWidgets.dropzone-script')
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

    $(function () {
    $('#description_ar') .summernote({
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
      $('#description_ar').summernote('formatPara');

      $('#description_en') .summernote({
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
      $('#description_en').summernote('formatPara');
    });

  </script>
@endsection
