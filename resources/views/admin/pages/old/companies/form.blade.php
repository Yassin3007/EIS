@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{$company->id?'Edit':' Create'}} company</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('companies.index')}}">company</a></li>
      <li class="breadcrumb-item active">company Form</li>
    </ol>
  </div>
</div>
@endsection
@section('content') 

{{-- error message --}}
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

 <div class="row">
<div class="col-md-12">
  <div class="card card-create">
    <div class="card-header">
      <h3 class="card-title">{{$company->id?'Edit':' Add'}} company</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{$company->id?route('companies.update',$company->id):route('companies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($company->id)
        @method('put')    
        @endif
         
                   
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>company english  </label>
              <input type="text"  name="name_en" value="{{$company->name_en}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>company arabic  </label>
              <input type="text"  name="name_ar" value="{{$company->name_ar}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>

          <div class="col-sm-12"> 
            <!-- text input -->
            <label for="icon" class=" col-form-label"> Image  <span class="required_class"></span></label>
            <div class="col-sm-10">
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             <div class="input-group">
               <div class="custom-file">
                 <input type="file" class="custom-file-input form-control" id="icon" name="image" accept="">
                 <label class="custom-file-label" for="icon">Choose file</label>
               </div>
               @if (count($company->images))
               <div id="{{$company->images->first()->id}}">
               <img class="m-2 rounded" src="{{$company->images->first()->full_url}}" width="100" , height="100">
                 <button type="button" class="btn remove">Remove</button>
                </div>

               @endif
             </div>
            </div>
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