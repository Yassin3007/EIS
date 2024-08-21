@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{$district->id?'Edit':' Create'}} district</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('districts.index')}}">district</a></li>
      <li class="breadcrumb-item active">district Form</li>
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
      <h3 class="card-title">{{$district->id?'Edit':' Add'}} district</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{$district->id?route('districts.update',$district->id):route('districts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($district->id)
        @method('put')    
        @endif
         
                   
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>district english  </label>
              <input type="text"  name="name_en" value="{{$district->name_en}}" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>district arabic  </label>
              <input type="text"  name="name_ar" value="{{$district->name_ar}}" class="form-control" placeholder="Enter ...">
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