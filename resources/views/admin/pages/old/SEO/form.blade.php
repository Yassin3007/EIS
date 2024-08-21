@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create SEO</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('seo.index') }}">SEO</a></li>
                <li class="breadcrumb-item active">SEO Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-create">
      <div class="card-header">
          <h3 class="card-title">Add SEO</h3>
      </div> 
          <div class="card-body">
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('statics.store') }}">
                @csrf
              <div class="row">
                          {{-- <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                  <label>SEO Title <span class="text-danger">60 Max characters (including spaces)</span> </label>
                                  <textarea rows="5"  class="form-control"
                                  name="seo_title" maxlength="60">{{ Statics::get('seo_title') }}</textarea>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>SEO description <span class="text-danger">160 Max characters (including spaces)</span> </label>
                                  <textarea rows="5"  class="form-control"
                                      name="seo_description" maxlength="160">{{ Statics::get('seo_description') }}</textarea>
                              </div>
                          </div>

                          <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                  <label>SEO website url </label>
                                  <input type="text" name="seo_website_url" value="{{ Statics::get('seo_website_url') }}"
                                      class="form-control" placeholder="www.website.com">
                              </div>
                          </div>

                          <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>SEO key words <span class="text-danger">Format restricted (word, word)</span> </label>
                                  <textarea rows="5"  class="form-control"
                                      name="seo_keywords" placeholder="Word, Word, Word, Word, Word, Word,">{{ Statics::get('seo_keywords') }}</textarea>
                              </div>
                          </div>
              </div>
              <div class="row">
                          <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>SEO site name </label>
                                  <input type="text" name="seo_site_name" value="{{ Statics::get('seo_site_name') }}"
                                      class="form-control" placeholder="Enter ...">
                                  {{-- <textarea rows="5"   id="summernote1" name="about_us_description">{{Statics::get('about_us_description')}}</textarea> --}}
                              {{-- </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>SEO website publisher </label>
                                  <input type="text" name="seo_website_publisher"
                                      value="{{ Statics::get('seo_website_publisher') }}" class="form-control"
                                      placeholder="Enter ...">
                              </div>
                          </div>
              </div>
              <div class="row">
                          <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>SEO Twitter creator</label>
                                  <input type="text" name="seo_twitter_creator"
                                      value="{{ Statics::get('seo_twitter_creator') }}" class="form-control"
                                      placeholder="Enter ...">
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>SEO author</label>
                                  <input type="text" name="seo_author" value="{{ Statics::get('seo_author') }}"
                                      class="form-control" placeholder="Enter ...">
                              </div>
                          </div>

                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>SEO copyRight</label>
                                  <input type="text" name="seo_copyright" value="{{ Statics::get('seo_copyright') }}"
                                      class="form-control" placeholder="Enter ...">
                              </div>
                          </div>  --}}


                     {{-- <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                  <label>Pixel Head</label>
                                  <input type="text" name="seo_website_url" value="{{Statics::get('pixel_body')}}"
                                      class="form-control" >
                              </div>
                          </div> --}}

                          <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>pixel head <span class="text-danger"></span> </label>
                                  <textarea rows="9"  class="form-control"
                                      name="pixel_head" >{{Statics::get('pixel_head')}}</textarea>
                              </div>
                          </div>

                         <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>pixel body <span class="text-danger"></span> </label>
                                  <textarea rows="9"  class="form-control"
                                      name="pixel_body" >{{Statics::get('pixel_body')}}</textarea>
                              </div>
                          </div>
              </div>
              <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
            </form>
          </div>
      </div>
  </div>
</div>
@endsection
