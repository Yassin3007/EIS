@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Service Page</h1>
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
                    <h3 class="card-title"> Service Page</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('statics.store') }}">
                        @csrf
                        <div class="row">


                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Material Title En</label>
                                    <input type="text" min="0" name="material_en"
                                        value="{{ App\Models\Statics::get('material') }}" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Material Title Ar</label>
                                    <input type="text" min="0" name="material_ar"
                                        value="{{ App\Models\Statics::get('material', 'ar') }}" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Material Description En</label>
                                    <textarea id="aboutUs" rows="5" class="form-control" name="material_description_en">{{ App\Models\Statics::get('material_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Material Description Ar</label>
                                    <textarea id="home_about_section" rows="5" class="form-control" name="material_description_ar">{{ App\Models\Statics::get('material_description', 'ar') }}</textarea>
                                </div>
                            </div>





                            <br>
                            <hr style="width: 50%;border: 1px solid black;">








                            <br>
                            <hr class="col-sm-12" style="width: 50%;border: 1px solid black;">



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
        $(function() {
            $('#home_about_section_en').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#home_about_section_en').summernote('formatPara');

            $('#home_about_section_ar').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#home_about_section_ar').summernote('formatPara');

            $('#policy_en').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
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
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#policy_ar').summernote('formatPara');

            $('#home_achievements_section_en').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#home_achievements_section_en').summernote('formatPara');

            $('#home_achievements_section_ar').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#home_achievements_section_ar').summernote('formatPara');


            $('#address_en').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#address_en').summernote('formatPara');

            $('#address_ar').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#address_ar').summernote('formatPara');

            $('#intresting_facts_en').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#intresting_facts_en').summernote('formatPara');

            $('#intresting_facts_ar').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript']],
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
@endsection
@endsection
