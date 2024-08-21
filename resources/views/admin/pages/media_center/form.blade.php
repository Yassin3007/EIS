@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{$media_center->id?'Edit':' Create'}} media_center</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('media_center.index')}}">media_center</a></li>
        <li class="breadcrumb-item active">media_center Form</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-create">
        <div class="card-header">
          <h3 class="card-title">{{$media_center->id?'Edit':' Add'}} media_center</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{$media_center->id?route('media_center.update',$media_center->id):route('media_center.store')}}" method="POST"
                enctype="multipart/form-data">
            @csrf
            @if ($media_center->id)
              @method('put')
            @endif


            <div class="row">


              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>media center type <span class="required_class">*</span></label>
                  <select class="ui fluid search dropdown" name="type_id" >



                        <option value="1" @if ($media_center->id && $media_center->type_id == 1) selected @endif > Events </option>
                        <option value="2" @if ($media_center->id && $media_center->type_id == 2) selected @endif > Press News </option>
                        <option value="3" @if ($media_center->id && $media_center->type_id == 3) selected @endif > Construction Updates </option>
                        <option value="4" @if ($media_center->id && $media_center->type_id == 4) selected @endif > Awards </option>

                  </select>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>title english <span class="required_class">*</span> </label>
                  <input type="text" name="title_en" value="{{$media_center->title_en}}" class="form-control"
                         placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>title arabic <span class="required_class">*</span> </label>
                  <input type="text" name="title_ar" value="{{$media_center->title_ar}}" class="form-control"
                         placeholder="Enter ...">
                </div>
              </div>

              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>pref English <span class="required_class">*</span> </label>
                  <textarea rows="2" id="pref_en" class="form-control" name="pref_en"
                            required>{{ $media_center->pref_en ?? old('pref_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>pref Arabic <span class="required_class">*</span> </label>
                  <textarea rows="2" id="pref_ar" class="form-control" name="pref_ar"
                            required>{{ $media_center->pref_ar ?? old('pref_ar') }}</textarea>
                </div>
              </div>


              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>content English <span class="required_class">*</span> </label>
                  <textarea id="summernote_en" rows="5" class="form-control" name="content_en"
                            required>{{ $media_center->content_en ?? old('content_en') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>content Arabic <span class="required_class">*</span> </label>
                  <textarea id="summernote_ar" rows="5" class="form-control" name="content_ar"
                            required>{{ $media_center->content_ar ?? old('content_ar') }}</textarea>
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>Image Alt en <span class="required_class">*</span></label>
                  <input type="text" name="alt_en" maxlength="90"
                         value="{{$media_center->images->first()?$media_center->images->first()->alt_en:old('alt_en') }}"
                         class="form-control" placeholder="Enter ..." required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Image Alt ar <span class="required_class">*</span></label>
                  <input type="text" name="alt_ar" maxlength="90"
                         value="{{$media_center->images->first()?$media_center->images->first()->alt_ar:old('alt_ar') }}"
                         class="form-control" placeholder="Enter ..." required>
                </div>
              </div>
              <div class="col-sm-6">
                @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Add Image <span class="required_class">* Max Image size is 5M</span></label>
                @include('admin.pages.commonWidgets.dropzone_for_single_Image')
              </div>
              @if (count($media_center->images))
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="my-3">media_center Image</label>
                    <div class="d-flex flex-wrap ">
                      @foreach ($media_center->images as $image)
                        <div id="{{$image->id}}" class="image_container">
                          <img src="{{$image->full_url}}">
                          <button type="button" class="btn remove">Remove</button>
                        </div>
                      @endforeach
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

  <script>
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
  </script>
@endsection
