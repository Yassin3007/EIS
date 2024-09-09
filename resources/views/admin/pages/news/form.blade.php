@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{$news->id?'Edit':' Create'}} news</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('news.index')}}">news</a></li>
        <li class="breadcrumb-item active">news Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">{{$news->id?'Edit':' Add'}} news</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{$news->id?route('news.update',$news->id):route('news.store')}}" method="POST"
                enctype="multipart/form-data">
            @csrf
            @if ($news->id)
              @method('put')
            @endif


            <div class="row">



              <div class="col-sm-7">
                <!-- textarea -->
                <div class="form-group">
                  <label>title <span class="required_class">*</span> </label>
                  <input type="text" name="title" value="{{$news->title?? old('title') }}" class="form-control"
                         placeholder="Enter ..." required>
                </div>
              </div>

{{--              <div class="col-sm-6">--}}
{{--                <!-- textarea -->--}}
{{--                <div class="form-group">--}}
{{--                  <label>title Ar </label>--}}
{{--                  <input type="text" name="title_ar" value="{{$news->title_ar?? old('title_ar') }}" class="form-control"--}}
{{--                         placeholder="Enter ..." required>--}}
{{--                </div>--}}
{{--              </div>--}}


              {{-- <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>pref <span class="required_class">*</span> </label>
                  <input type="text" name="pref" value="{{$news->pref}}" class="form-control"
                         placeholder="Enter ...">
                </div>
              </div> --}}



                <div class="col-sm-7">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Pref  <span class="required_class">*</span> </label>
                        <textarea id="pref_en" rows="3" class="form-control" name="pref"
                                  required>{{ $news->pref ?? old('pref') }}</textarea>
                    </div>
                </div>


              <div class="col-sm-7">
                <!-- textarea -->
                <div class="form-group">
                  <label>content  <span class="required_class">*</span> </label>
                  <textarea id="content" rows="5" class="form-control" name="content"
                            required>{{ $news->content ?? old('content') }}</textarea>
                </div>
              </div>

                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="best_selling" id="is_best_selling"
                                {{ $news->is_special  ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_best_selling">
                                Is Best Selling
                            </label>
                        </div>
                    </div>
                </div>


              {{-- <div class="col-sm-6">
                <div class="form-group">
                  <label>Image Alt en <span class="required_class">*</span></label>
                  <input type="text" name="alt_en" maxlength="90"
                         value="{{$news->images->first()?$news->images->first()->alt_en:old('alt_en') }}"
                         class="form-control" placeholder="Enter ..." required>
                </div>
              </div> --}}
              {{-- <div class="col-sm-6">
                <div class="form-group">
                  <label>Image Alt ar <span class="required_class">*</span></label>
                  <input type="text" name="alt_ar" maxlength="90"
                         value="{{$news->images->first()?$news->images->first()->alt_ar:old('alt_ar') }}"
                         class="form-control" placeholder="Enter ..." required>
                </div>
              </div> --}}
              <div class="col-sm-7">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Add Image <span class="required_class">* Max Image size is 5M</span></label>
                @include('admin.pages.commonWidgets.dropzone_for_single_Image')
              </div>
              @if (count($news->images))
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="my-3">news Image</label>
                    <div class="d-flex flex-wrap ">
                      @if($image = $news->images->last())


                        <div id="{{$image->id}}" class="image_container">
                          <img src="{{$image->full_url}}">
                          <button type="button" class="btn remove">Remove</button>
                        </div>
                        @endif
                    </div>
                  </div>
                </div>
              @endif
              <div class="images-inputs-container">
              </div>


              <div class="col-12 text-right mt-3">
                <button class="form-control btn btn-success" style="width:5cm;" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->

      </div>
    </div>
  </div>
@endsection
@section('page_level_js')
  {{-- @include('admin') --}}
  @include('admin.pages.commonWidgets.dropzone-script')
  <script>
    $(".remove").click(function () {
      var id = $(this).parents("div").attr("id");
      swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url('/dashboard/image/delete/') }}' + '/' + id,
            type: 'Post',
            error: function () {
              swal.fire({
                title: "Something is wrong",
                icon: "error",
              })
            },
            success: function (data) {
              $("#" + id).remove();
              swal.fire({
                title: "Deleted!",
                icon: "success",
              })
            }
          });
        }
      })
    });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  {{-- <script>
    $(function () {
      $('#summernote_en') .summernote({
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
      $('#summernote_en').summernote('formatPara');

      $('#summernote_ar') .summernote({
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
      $('#summernote_ar').summernote('formatPara');
    })
  </script> --}}
@endsection
