@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $album->id ? 'Edit' : ' Create' }} album</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('album.index') }}">album</a></li>
                <li class="breadcrumb-item active">album Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $album->id ? 'Edit' : ' Add' }} album</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $album->id ? route('album.update', $album->id) : route('album.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($album->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>album en </album>
                                    <input type="text" name="name_en" value="{{ $album->name_en }}" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>album ar </album>
                                    <input type="text" name="name_ar" value="{{ $album->name_ar }}" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>






{{--                            <div class="col-sm-6">--}}
{{--                                <!-- text input -->--}}
{{--                                <label class="my-3">Album Images </label>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    @error('images')--}}
{{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input type="file" class="custom-file-input form-control" id="images"--}}
{{--                                                name="images[]" multiple>--}}
{{--                                            <label class="custom-file-label" for="icon">Choose file</label>--}}
{{--                                        </div>--}}
{{--                                        @foreach ($album->images as $image)--}}
{{--                                        <div id="{{ $image->id }}">--}}
{{--                                            <img class="m-2 rounded" src="{{ $image->full_url }}" width="100" ,--}}
{{--                                                height="100">--}}
{{--                                            --}}{{-- <button type="button" class="btn remove">Remove</button> --}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="col-sm-12">
                                @error('slider_images')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputFile"> Album images <span class="required_class">*</span></label>
                                    @include('admin.pages.commonWidgets.dropzone',['inputName'=>'images[]'])
                                    <div class="input-group">
                                        <div class="custom-file">

                                        </div>
                                    </div>

                                    @if (count($albumImages))
                                        <div class="form-group">
                                            <label class="my-3">Slider Images </label>
                                            <div class="d-flex flex-wrap ">
                                                @foreach ($albumImages as $image)
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




                            <div class="col-12 text-right mt-3">
                                <button class="form-control btn btn-success" style="width:5cm;"
                                    type="submit">Submit</button>
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
        $(".remove").click(function() {
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
                        error: function() {
                            swal.fire({
                                title: "Something is wrong",
                                icon: "error",
                            })
                        },
                        success: function(data) {
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
@endsection
