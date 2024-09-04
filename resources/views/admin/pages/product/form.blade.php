@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $product->id ? 'Edit' : ' Create' }} product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">product</a></li>
                <li class="breadcrumb-item active">product Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->id ? 'Edit' : ' Add' }} product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $product->id ? route('product.update', $product->id) : route('product.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($product->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-7">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>Name </album>
                                    <input type="text" name="name" value="{{ $product->name }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Description<span class="required_class">*</span> </label>
                                    <textarea id="content" rows="5" class="form-control" name="description"
                                              required>{!!  $product->description ?? old('content_en') !!}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>Price </album>
                                    <input type="number" name="price" value="{{ $product->price }}"
                                           class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <!-- Checkbox for is_best_selling -->
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="best_selling" id="is_best_selling"
                                            {{ $product->best_selling  ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_best_selling">
                                            Is Best Selling
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <!-- textarea -->
                                <div class="form-group">
                                    <product>Parent Category </product>
                                    <select name="category_id" id="parent_id" class="form-control">
                                        <option disabled selected hidden >Choose a Category</option>

                                        @foreach ($categories as $cat)
                                            <option @selected($cat->id === $product->category_id)
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-7">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Add Image <span class="required_class">* Max Image size is 5M</span></label>
                                @include('admin.pages.commonWidgets.dropzone_for_single_Image')
                            </div>
                            @if (count($product->images))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="my-3">news Image</label>
                                        <div class="d-flex flex-wrap ">
                                            @if ($image = $product->projectImages('image')->first())
                                                <div id="{{ $image->id }}" class="image_container">
                                                    <img src="{{ $image->full_url }}">
                                                    <button type="button" class="btn remove">Remove</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="images-inputs-container">
                                    </div>
                                </div>
                            @endif




                            <div class="col-sm-7">
                                @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Product Images Or Videos <span class="required_class">* Max Image size is 5M</span>
                                    {{-- @include('admin.pages.commonWidgets.dropzone',['inputName'=>'file']) --}}
                                </label>
                                @include('admin.pages.commonWidgets.dropzone',['inputName'=>'images[]'])

                                @if (count($product->projectImages('product_images')))
                                    <div class="form-group">
                                        <label class="my-3">Project Images Or Videos</label>
                                        <div class="d-flex flex-wrap ">
                                            @foreach ($product->projectImages('product_images') as $image)
                                                <div id="{{ $image->id }}" class="image_container">
                                                    @if ($image->slider_type == 'image')
                                                        <img src="{{ $image->full_url }}">
                                                    @elseif ($image->slider_type == 'video')
                                                        <video width="320" height="240" controls>
                                                            <source src="{{$image->full_url}}" type="video/mp4">
                                                            <source src="{{$image->full_url}}" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @endif
                                                    <button type="button" class="btn remove">Remove</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="images-inputs-container">
                                </div>
                            </div>




                        </div>
                        <div class="col-12 text-right mt-3">
                            <button class="form-control btn btn-success" style="width:5cm;"
                                    type="submit">Submit</button>
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
