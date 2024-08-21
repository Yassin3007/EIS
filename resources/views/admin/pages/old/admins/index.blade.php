@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Admins</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Users</li>
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
        <h3 class="card-title">Users Table</h3>
        @if (auth()->user()->roles->first()->name==='SuperAdmin')
        <a class="btn btn-primary" style="float: right" href="{{route('user.create')}}">Add User</a>
        @endif
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>Name</th>
              <th>position</th>
              <th>Created at</th>
              <th>image</th>
              @if (auth()->user()->roles->first()->name==='SuperAdmin')
              <th>Action</th>

              @endif
             </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)   
            <tr class="odd gradeX"  id="{{$user->id}}"  >
                   <td>{{$user->name}} </td>
                   <td>{{$user->roles->first()->name}}</td>
                   <td>{{$user->created_at}}</td>
                   <td><img src="{{$user->profileImage??asset("assets\admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                   @if (auth()->user()->roles->first()->name==='SuperAdmin')
                   <td>
                    <a class="btn btn-info" href="{{route('user.edit',$user->id)}}">Edit</a>
                    <button type="submit" class="btn btn-danger remove"> delete</button>
                  </td>
                  @endif
               </tr>
            @endforeach
          </tbody>
        </table>
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
                      url: '{{url("/dashboard/user")}}'+'/'+id,
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



