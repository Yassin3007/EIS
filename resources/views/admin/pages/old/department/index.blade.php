@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{Request::is('*about-us-sections*') ? "About Us Sections" : 'Jobs '}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
              <li class="breadcrumb-item">{{Request::is('*about-us-sections*') ? "About Us Sections" : "Jobs"}}</li>
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
        <a class="btn btn-primary" style="float: right" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.create') : route('department.create')}}">Add</a>
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>name  </th>
              <th> active / deactive </th>
              {{-- <th> pref </th>
              <th> content </th>
              <th>Image </th> --}}
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($department as $life_style)
          {{-- @dd($life_style->career) --}}

              <tr class="odd gradeX"  id="{{$life_style->id}}" >
                <td>{{Str::substr($life_style->name, 0, 60)}} </td>
                <td><input  id='toggle{{$life_style->id}}' type="checkbox"  @if ($life_style->status) checked @endif data-toggle="toggle" class="switch"  value="{{$life_style->status}}" > </td>
                {{-- <td>{{Str::substr($life_style->pref, 0, 60)}} </td>
                <td>{!! $life_style->content !!} </td>
                <td><img src="{{$life_style->image?url(Storage::url($life_style->image)):asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td> --}}
                <td>{{$life_style->created_at}}</td>
                <td>
                  <a class="btn btn-info" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.edit',$life_style->id) : route('department.edit',$life_style->id)}}">Edit</a>
                {{-- @if($life_style->career==null)   --}}
                  <button type="submit" class="btn btn-danger remove" > delete</button>
                {{-- @endif --}}

                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $department->links() }}
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
                      url: '{{url("/dashboard/department")}}'+'/'+id,
                      type: 'Delete',
                      error: function(data) {
                        swal.fire({
                          title: "This option used in some careers can not delete it,delete career rows first",
                          icon: "warning",
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

<script type="text/javascript">
  $(".switch").change(function(){
     console.log('we are done');
      var value = $(this).val();
      console.log(value);
      var id = $(this).parents("tr").attr("id");
       swal.fire({
              title: value==0?"you just active this department ":"you just deactive this department",
              text: value==0?"this department will display in forms  ":'this department will not be display in forms  ',
              type: "success",
              showCancelButton: false,

              confirmButtonText: "Ok",

              closeOnConfirm: true,


        }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      url: '{{url("/dashboard/department/status")}}'+'/'+id,
                      type: 'POST',
                      data: {
                          onscreen : value==1 ? 0 : 1
                      },
                      error: function() {
                          alert('Something is wrong');
                      },
                      success: function(data) {
                          document.getElementById("toggle"+id).value= value==1 ? 0: 1;
                           }
                  });
              } else {
                   swal.fire("Cancelled", " :)", "error");
              }
          });
  });
</script>
@endsection
