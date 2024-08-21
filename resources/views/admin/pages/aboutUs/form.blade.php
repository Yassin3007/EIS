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
          <h3 class="card-title"> About Us</h3>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('statics.store') }}">
            @csrf
            <div class="row">




              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Us En</label>
                  <textarea id="aboutUs" rows="5" class="form-control"
                            name="aboutUs_en">{{ App\Models\Statics::get('aboutUs') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>About Us Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="aboutUs_ar">{{ App\Models\Statics::get('aboutUs','ar') }}</textarea>
                </div>
              </div>




              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> additional title En</label>
                  <textarea id="intresting_facts" rows="5" class="form-control"
                            name="additional_title_en">{{ App\Models\Statics::get('additional_title') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> additional title Ar</label>
                  <textarea id="intresting_facts" rows="5" class="form-control"
                            name="additional_title_ar">{{ App\Models\Statics::get('additional_title','ar') }}</textarea>
                </div>
              </div>



              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> additional description En</label>
                  <textarea id="policy" rows="5" class="form-control"
                            name="additional_description_en">{{ App\Models\Statics::get('additional_description') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label> additional description Ar</label>
                  <textarea id="policy" rows="5" class="form-control"
                            name="additional_description_ar">{{ App\Models\Statics::get('additional_description','ar') }}</textarea>
                </div>
              </div>

              <br>
              <hr style="width: 50%;border: 1px solid black;" >


              <div class="row">

                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Deco Values </h2>

                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 1 En</label>
                    <input type="text" min="0" name="value_title_1_en" value="{{App\Models\Statics::get('value_title_1')}}"
                          class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 2 En</label>
                    <input type="text" min="0" name="value_title_2_en" value="{{App\Models\Statics::get('value_title_2')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 3 En</label>
                    <input type="text" min="0" name="value_title_3_en" value="{{App\Models\Statics::get('value_title_3',)}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>

                <br>




                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 1  Ar</label>
                    <input type="text" min="0" name="value_title_1_ar" value="{{App\Models\Statics::get('value_title_1','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 2 Ar</label>
                    <input type="text" min="0" name="value_title_2_ar" value="{{App\Models\Statics::get('value_title_2','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Value Title 3 Ar</label>
                    <input type="text" min="0" name="value_title_3_ar" value="{{App\Models\Statics::get('value_title_3','ar')}}"
                           class="form-control" placeholder="Enter ...">
                  </div>
                </div>



              </div>


              <br>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 1 En</label>
                  <textarea id="aboutUs" rows="5" class="form-control"
                            name="value_description_1_en">{{ App\Models\Statics::get('value_description_1') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 1 Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="value_description_1_ar">{{ App\Models\Statics::get('value_description_1','ar') }}</textarea>
                </div>
              </div>



              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 2 En</label>
                  <textarea id="aboutUs" rows="5" class="form-control"
                            name="value_description_2_en">{{ App\Models\Statics::get('value_description_2') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 2 Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="value_description_2_ar">{{ App\Models\Statics::get('value_description_2','ar') }}</textarea>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 3 En</label>
                  <textarea id="aboutUs" rows="5" class="form-control"
                            name="value_description_3_en">{{ App\Models\Statics::get('value_description_3') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Value Description 3 Ar</label>
                  <textarea id="home_about_section" rows="5" class="form-control"
                            name="value_description_3_ar">{{ App\Models\Statics::get('value_description_3','ar') }}</textarea>
                </div>
              </div>


              <hr style="width: 50%;border: 1px solid black;" >




              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{-- <hr size="30"> --}}
                    <h2 style="display: block">Deco History and Vision</h2>

                  </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Deco History Title En </label>
                      <input type="text" name="history_title_en" value="{{App\Models\Statics::get('history_title')}}" class="form-control"
                             placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Deco History Title Ar </label>
                        <input type="text" name="history_title_ar" value="{{App\Models\Statics::get('history_title','ar')}}" class="form-control"
                               placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Deco Vision Title En </label>
                        <input type="text" name="vision_title_en" value="{{App\Models\Statics::get('vision_title')}}" class="form-control"
                               placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Deco Vision Title Ar </label>
                          <input type="text" name="vision_title_ar" value="{{App\Models\Statics::get('vision_title','ar')}}" class="form-control"
                                 placeholder="Enter ...">
                        </div>
                      </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco History En</label>
                    <textarea id="address" rows="5" class="form-control"
                              name="history_en">{{ App\Models\Statics::get('history') }}</textarea>
                  </div>
                </div>

                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco History Ar</label>
                    <textarea id="address" rows="5" class="form-control"
                              name="history_ar">{{ App\Models\Statics::get('history','ar') }}</textarea>
                  </div>
                </div>


                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Deco Vision En </label>
                    <textarea id="map_iframe" rows="5" class="form-control"
                              name="vision_en">{{ App\Models\Statics::get('vision') }}</textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label> Deco Vision Ar </label>
                      <textarea id="map_iframe" rows="5" class="form-control"
                                name="vision_ar">{{ App\Models\Statics::get('vision','ar') }}</textarea>
                    </div>
                  </div>







              </div>


              <br>
              <hr class="col-sm-12" style="width: 50%;border: 1px solid black;" >


              <div class="col-sm-12">
                @error('slider_images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputFile"> About Us Slider images <span class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone',['inputName'=>'about_us_slider_images[]'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($aboutImages))
                    <div class="form-group">
                      <label class="my-3">Slider Images </label>
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


              <div class="col-sm-12">
                @error('slider_images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputFile"> Values images <span class="required_class">*</span></label>
                  @include('admin.pages.commonWidgets.dropzone',['inputName'=>'about_us_values_images[]'])
                  <div class="input-group">
                    <div class="custom-file">

                    </div>
                  </div>

                  @if (count($valuesImages))
                    <div class="form-group">
                      <label class="my-3">Slider Images </label>
                      <div class="d-flex flex-wrap ">
                        @foreach ($valuesImages as $image)
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
              <div class="images-inputs-container">
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
