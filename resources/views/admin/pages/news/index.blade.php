@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{Request::is('*about-us-sections*') ? "About Us Sections" : 'news'}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
              <li class="breadcrumb-item">{{Request::is('*about-us-sections*') ? "About Us Sections" : "news"}}</li>
      {{-- <li class="breadcrumb-item active">Slider Form</li> --}}
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table</h3>
        <a class="btn btn-primary" style="float: right" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.create') : route('news.create')}}">Add</a>
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>title  </th>
              {{-- <th> pref </th> --}}
              <th> content </th>
              <th>Image </th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($news as $life_style)
              <tr class="odd gradeX"  id="{{$life_style->id}}" >
                <td>{{Str::substr($life_style->title, 0, 60)}} </td>
                {{-- <td>{{Str::substr($life_style->pref, 0, 60)}} </td> --}}
                <td class="col-2" >{!! $life_style->content !!} </td>
                <td><img src="{{$life_style->image?url(Storage::url($life_style->image)):asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                <td>{{$life_style->created_at}}</td>
                <td>
                  <a class="btn btn-info" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.edit',$life_style->id) : route('news.edit',$life_style->id)}}">Edit</a>
                  <button type="submit" class="btn btn-danger remove"> delete</button>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $news->links() }}
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
                      url: '{{url("/dashboard/news")}}'+'/'+id,
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
