@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Pages Covers</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Page Cover</li>
      {{-- <li class="breadcrumb-item active">Page Cover Form</li> --}}
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pages Covers Table</h3>
        <a class="btn btn-primary" style="float: right" href="{{route('slider.create')}}">Add Page Cover</a>
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
                  <th>Image alt</th>
                  <th>Image</th>
                  <th>Created at</th>
                  <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sliders as $slider)
              <tr class="odd gradeX"  id="{{$slider->id}}" >
                <td>{{$slider->images->first()?$slider->images->first()->alt:'--'}} </td>
                {{-- {{dd($slider->images->first()->full_url)}} --}}
                <td><img src="{{$slider->images->first()->full_url??asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                <td>{{$slider->created_at}}</td>
                <td>
                  <a class="btn btn-info" href="{{route('slider.edit',$slider->id)}}">Edit</a>
                  {{-- {{dd($slider->slug)}} --}}
                  {{-- <a class="btn btn-info" href="{{route('slider.show',$slider->slug->first()->slug_en)}}">show</a>  --}}
                  <button type="submit" class="btn btn-danger remove"> delete</button>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $sliders->links() }}
      </div>
    </div>
  </div>
</div>

@endsection


@section('page_level_js')
<script>
  $(".remove").click(function(){
      var id = $(this).parents("tr").attr("id");
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
                      url: '{{url("/dashboard/slider")}}'+'/'+id,
                      type: 'Delete',
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






