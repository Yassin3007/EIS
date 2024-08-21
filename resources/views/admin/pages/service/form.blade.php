@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{$service->id?'Edit':' Create'}} service</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('service.index')}}">service</a></li>
      <li class="breadcrumb-item active">service Form</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
 <div class="row">
<div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <div class="card card-create">
    <div class="card-header">
      <h3 class="card-title">{{$service->id?'Edit':' Add'}} service</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{$service->id?route('service.update',$service->id):route('service.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($service->id)
        @method('put')
        @endif


        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>service en  </label>
              <input type="text"  name="name_en" value="{{$service->name_en}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>service ar  </label>
              <input type="text"  name="name_ar" value="{{$service->name_ar}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>

          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>description en  </label>
              <input type="text"  name="description_en" value="{{$service->description_en}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>description ar  </label>
              <input type="text"  name="description_ar" value="{{$service->description_ar}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>

            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Metal title en  </label>
                    <input type="text"  name="metal_title_en" value="{{$service->metal_title_en}}" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Metal title ar  </label>
                    <input type="text"  name="metal_title_ar" value="{{$service->metal_title_ar}}" class="form-control" placeholder="Enter ...">
                </div>
            </div>

            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Metal description en  </label>
                    <input type="text"  name="metal_description_en" value="{{$service->metal_description_en}}" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Metal description ar  </label>
                    <input type="text"  name="metal_description_ar" value="{{$service->metal_description_ar}}" class="form-control" placeholder="Enter ...">
                </div>
            </div>

          <div class="col-sm-7">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label>Add Image <span class="required_class">* Max Image size is 5M</span></label>
            @include('admin.pages.commonWidgets.dropzone_for_single_Image')
        </div>
        @if (count($service->projectImages('service_icon')))
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="my-3">Service Image</label>
                    <div class="d-flex flex-wrap ">
                        @if ($image = $service->projectImages('service_icon')->last())
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

            <br>

            <div class="col-sm-7 py-3">
                @error('cover')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Add Cover Image <span class="required_class">* Max Image size is 5M</span></label>
                @include('admin.pages.commonWidgets.dropzone_for_single_Image',['inputName'=>'cover'])
            </div>
            @if (count($service->projectImages('cover')))
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="my-3">news Image</label>
                        <div class="d-flex flex-wrap ">
                            @if ($image = $service->projectImages('cover')->last())
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


          {{-- <div class="col-sm-6">
            <!-- text input -->
            <label for="icon" class=" col-form-label">Icon Image  <span class="required_class">Must be transparent image (.png) with 1:1 accept ratio</span></label>
            <div class="col-sm-10">
              @error('icon')
              <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             <div class="input-group">
               <div class="custom-file">
                 <input type="file" class="custom-file-input form-control" id="icon" name="icon" accept=".png">
                 <label class="custom-file-label" for="icon">Choose file</label>
               </div>
               @if (count($service->images))
               <div id="{{$service->images->first()->id}}">
               <img class="m-2 rounded" src="{{$service->images->first()->full_url}}" width="100" , height="100">
                 <button type="button" class="btn remove">Remove</button>
                </div>

               @endif
             </div>
            </div>
        </div> --}}



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
