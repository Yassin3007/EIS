@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Out Team</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Our Team</li>
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
          <h3 class="card-title">Team Members Table</h3>
          <a class="btn btn-primary" style="float: right" href="{{route('teamMembers.create')}}">Add Team Member</a>
        </div>
        <div class="card-body">
          <table id="tableContainer"  class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>Member Name En </th>
              <th>Member Name AR </th>
              <th>Icon </th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teamMembers as $teamMember)
              <tr class="odd gradeX"  id="{{$teamMember->id}}" >
                <td>{{$teamMember->name_en}} </td>
                <td>{{$teamMember->name_ar}} </td>
                <td><img src="{{$teamMember->images()->exists()?$teamMember->firstImage()->full_url:asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                <td>{{$teamMember->created_at}}</td>
                <td>
                  <a class="btn btn-info" href="{{route('teamMembers.edit',$teamMember->id)}}">Edit</a>
                  <button type="submit" class="btn btn-danger remove"> delete</button>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {{ $teamMembers->links() }}
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
            url: '{{url("/dashboard/teamMembers")}}'+'/'+id,
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