@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $material->id ? 'Edit' : ' Create' }} material</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('material.index') }}">material</a></li>
                <li class="breadcrumb-item active">material Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $material->id ? 'Edit' : ' Add' }} material</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $material->id ? route('material.update', $material->id) : route('material.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($material->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>material en </album>
                                    <input type="text" name="name_en" value="{{ $material->name_en }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>material ar </album>
                                    <input type="text" name="name_ar" value="{{ $material->name_ar }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <material>description en </material>
                                    <input type="text" name="description_en" value="{{ $material->description_en }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <material>description ar </material>
                                    <input type="text" name="description_ar" value="{{ $material->description_ar }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <material>Service </material>
                                    <select name="service_id" id="service_id" class="form-control">
                                        <option disabled>Choose a Service</option>

                                        @foreach ($services as $service)
                                            <option @if ($material->service && $material->service->id == $service->id) selected @endif
                                                value="{{ $service->id }}">{{ $service->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{-- <div class="col-sm-6">
            <!-- text input -->
            <label for="icon" class=" col-form-label"> Image  <span class="required_class">Must be transparent image with 1:1 accept ratio</span></label>
            <div class="col-sm-10">
              @error('icon')
              <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             <div class="input-group">
               <div class="custom-file">
                 <input type="file" class="custom-file-input form-control" id="icon" name="image" >
                 <label class="custom-file-label" for="icon">Choose file</label>
               </div>
               @if (count($material->images))
               <div id="{{$material->images->first()->id}}">
               <img class="m-2 rounded" src="{{$material->images->first()->full_url}}" width="100" , height="100">
                 <button type="button" class="btn remove">Remove</button>
                </div>

               @endif
             </div>
            </div>
        </div> --}}

                            <div class="col-sm-7">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Add Image <span class="required_class">* Max Image size is 5M</span></label>
                                @include('admin.pages.commonWidgets.dropzone_for_single_Image')
                            </div>
                            @if (count($material->images))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="my-3">news Image</label>
                                        <div class="d-flex flex-wrap ">
                                            @if ($image = $material->images->last())
                                                <div id="{{ $image->id }}" class="image_container">
                                                    <img src="{{ $image->full_url }}">
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
