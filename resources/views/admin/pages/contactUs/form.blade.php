@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Contact Us Page</h1>
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
          <h3 class="card-title">Contact Us Page</h3>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('statics.store') }}">
            @csrf
            <div class="row">

              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label for="contact_image" class=" col-form-label">Contact Form Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="form-control custom-file-input" id="contact_image"
                             name="contact_image">
                      <label class="custom-file-label" for="contact_image">Choose file</label>
                    </div>
                    @if (App\Models\Statics::get('contact_image'))
                      <img class="m-2 rounded" src="{{ App\Models\Statics::getImageUrl('contact_image') }}" width="100"
                           height="100">
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Title en </label>
                  <input type="text" name="contact_tile_en" value="{{App\Models\Statics::get('contact_tile','en')}}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Title ar </label>
                  <input type="text" name="contact_tile_ar" value="{{App\Models\Statics::get('contact_tile','ar')}}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Second Large Title en </label>
                  <input type="text" name="contact_second_title_en"
                         value="{{App\Models\Statics::get('contact_second_title','en')}}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Second Large Title ar </label>
                  <input type="text" name="contact_second_title_ar"
                         value="{{App\Models\Statics::get('contact_second_title','ar')}}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Form Paragraph en </label>
                  <textarea class="form-control" name="contact_form_paragraph_en" id="" cols="30"
                            rows="10">{{App\Models\Statics::get('contact_form_paragraph','en')}}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Form Paragraph ar </label>
                  <textarea class="form-control" name="contact_form_paragraph_ar" id="" cols="30"
                            rows="10">{{App\Models\Statics::get('contact_form_paragraph','ar')}}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Email to receive the contact us messages</label>
                  <input type="text" name="the_recever_email" value="{{ App\Models\Statics::get('the_recever_email') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>second Email to receive the contact us messages</label>
                  <input type="text" name="the_recever_email2" value="{{ App\Models\Statics::get('the_recever_email2') }}"
                         class="form-control" placeholder="Enter ...">
                </div>
              </div>

            </div>
            <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@section('page_level_js')
  @include('admin.pages.commonWidgets.dropzone-script')
@endsection
@endsection
