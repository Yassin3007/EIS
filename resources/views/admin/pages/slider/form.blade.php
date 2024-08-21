@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{$slider->id?'Edit':' Create'}} Page Cover</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Page Cover</a></li>
                <li class="breadcrumb-item active">Page Cover Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{$slider->id?'Edit':' Add'}}  Page Cover</h3>
                </div>
                <div class="card-body">
                    <form action="{{ $slider->id ? route('slider.update', $slider->id) : route('slider.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($slider->id)
                            @method('put')
                        @endif
                        <div class="row">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>English Text  <span class="required_class">*</span></label>
                                    <textarea rows="5"  class="form-control"
                                        name="text_en" required>{{ $slider->text ?? old('text') }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Arabic Text  <span class="required_class">*</span></label>
                                    <textarea rows="5"  class="form-control"
                                        name="text_ar" required>{{ $slider->text ?? old('text') }}</textarea>
                                </div>
                            </div> --}}


                            <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                    <label>type <span class="required_class">*</span></label>
                                    <select class="ui fluid search dropdown" name="type" >

                                        @foreach ($types as $type)
                                        @php
                                           $type=(object)$type;
                                        @endphp

                                            <option value="{{ $type->name }}" @if ($type->name && $slider->type == $type->name) selected @endif >{{ $type->name }}</option>

                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Image Alt  <span class="required_class">*</span></label>
                                  <input type="text"  name="alt_en" maxlength = "90"  value="{{$slider->images->first()?$slider->images->first()->alt_en:old('alt_en') }}" class="form-control" placeholder="Enter ..." >
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Image Alt ar <span class="required_class">*</span></label>
                                  <input type="text"  name="alt_ar" maxlength = "90"  value="{{$slider->images->first()?$slider->images->first()->alt_ar:old('alt_ar') }}" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div> --}}
                            {{-- <div class="col-sm-6">
                                @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Add Image <span class="required_class">*</span></label>
                                @include('admin.pages.commonWidgets.dropzone_for_single_Image')
                            </div> --}}
                            {{-- @if (count($slider->images))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="my-3">Slider Image</label>
                                        <div class="d-flex flex-wrap ">
                                            @foreach ($slider->images as $image)
                                            <div id="{{$image->id}}" class="image_container">
                                                <img  src="{{$image->full_url}}">
                                                <button type="button" class="btn remove" >Remove</button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif --}}




                            <div class="col-sm-12">
                              @error('image')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              <div class="form-group">
                                <label for="exampleInputFile"> Page Cover image  <span class="required_class">*</span></label>
                                @include('admin.pages.commonWidgets.dropzone',['inputName'=>'image'])
                                <div class="input-group">
                                  <div class="custom-file">

                                  </div>
                                </div>

                                @if (count($slider->images))
                                  <div class="form-group">
                                    <label class="my-3">Page Cover Images </label>
                                    <div class="d-flex flex-wrap ">
                                      @foreach ($slider->images as $image)
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
            </div>
        </div>
    </div>

    @section('page_level_js')
    @include('admin.pages.commonWidgets.dropzone-script')
    <script>
        $(".remove").click(function(){
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
                            url: '{{url("/dashboard/image/delete/")}}'+'/'+id,
                            type: 'Post',
                            error: function() {
                            swal.fire({
                                title: "Something is wrong",
                                icon: "error",
                            })
                            },
                            success: function(data) {
                                $("#"+id).remove();
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

    @endsection

@endsection
