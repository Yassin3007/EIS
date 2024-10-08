@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $category->id ? 'Edit' : ' Create' }} category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">category</a></li>
                <li class="breadcrumb-item active">category Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $category->id ? 'Edit' : ' Add' }} category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $category->id ? route('category.update', $category->id) : route('category.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($category->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>Name </album>
                                    <input type="text" name="name" value="{{ $category->name }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>




                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <category>Parent Category </category>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option disabled selected hidden >Choose a Parent</option>
                                        <option value="" >Non</option>

                                        @foreach ($categories as $cat)
                                            <option @selected($cat->id === $category->parent_id)
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
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
               @if (count($category->images))
               <div id="{{$category->images->first()->id}}">
               <img class="m-2 rounded" src="{{$category->images->first()->full_url}}" width="100" , height="100">
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
                            @if (count($category->images))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="my-3">news Image</label>
                                        <div class="d-flex flex-wrap ">
                                            @if ($image = $category->images->last())
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
