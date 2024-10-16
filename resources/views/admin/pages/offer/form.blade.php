@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $offer->id ? 'Edit' : ' Create' }} offer</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('offer.index') }}">offer</a></li>
                <li class="breadcrumb-item active">offer Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $offer->id ? 'Edit' : ' Add' }} offer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $offer->id ? route('offer.update', $offer->id) : route('offer.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($offer->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>Start From </album>
                                    <input type="date" name="from" value="{{ $offer->from }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>End At </album>
                                    <input type="date" name="to" value="{{ $offer->to }}"
                                           class="form-control" placeholder="Enter ...">
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <offer>Discount Type </offer>
                                    <select name="type"  id="parent_id" class="form-control">
                                        <option disabled selected hidden >Choose A Type</option>


                                            <option @selected($offer->type === 'amount')  value="amount">amount</option>
                                            <option @selected($offer->type === 'percentage')  value="percentage">percentage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <album>Value </album>
                                    <input type="number" name="value" value="{{ $offer->value }}"
                                           class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <offer>Products </offer>
                                    <select name="products_ids[]" multiple id="parent_id" class="form-control">
{{--                                        <option disabled selected hidden >Choose Products</option>--}}

                                        @foreach ($products as $product)
                                            <option  {{ in_array($product->id, old('product_ids', $offer->products->pluck('id')->toArray())) ? 'selected' : '' }}
                                                value="{{ $product->id }}">{{ $product->name }}</option>
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
               @if (count($offer->images))
               <div id="{{$offer->images->first()->id}}">
               <img class="m-2 rounded" src="{{$offer->images->first()->full_url}}" width="100" , height="100">
                 <button type="button" class="btn remove">Remove</button>
                </div>

               @endif
             </div>
            </div>
        </div> --}}





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
