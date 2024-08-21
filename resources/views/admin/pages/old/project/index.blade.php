@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Projects</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Project</li>
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
        <h3 class="card-title">Projects Table</h3>
        <a class="btn btn-primary" style="float: right" href="{{route('project.create')}}">Add project</a>
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
                  <th>Text</th>
                  <th> Appearing Sort </th>
                  <th>Image</th>
                  {{-- <th>in slider</th> --}}
                  <th>Created at</th>
                  <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = count($projects);
              ?>
          @foreach ($projects as $index=>$project)
              <tr class="odd gradeX"  id="{{$project->id}}" >
                <td>{{$project->name}} </td>
                <td>
                  <select class="ui fluid search dropdown changeIndex" name="type" style="width: fit-content !important;" >
                    <option value="0">select number</option>
                    @for ($i=1;$i<=$count;$i++)
                          @php
                            $value=$count-($i-1);
                          @endphp
                    <option   value="{{ $value }}" @if($value==$project->index) selected @endif>{{ $i }}</option>
                    @endfor

                </select>
                </td>
                <td><img src="{{$project->projectImages('main_image')->last()?$project->projectImages('main_image')->last()->full_url:asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                {{-- <td><input  id='toggle{{$project->id}}' type="checkbox"  @if ($project->inhome) checked @endif data-toggle="toggle" class="switch"  value="{{$project->inhome}}" > </td> --}}
                <td>{{$project->created_at}}</td>
                <td><a class="btn btn-info" href="{{route('project.edit',$project->id)}}">Edit</a>
                  <button type="submit" class="btn btn-danger remove"> Delete</button>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $projects->links() }}
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
                      url: '{{url("/dashboard/project")}}'+'/'+id,
                      type: 'Delete',
                      error: function() {
                        swal.fire({
                          title: "This project used in some chats can not delete it,delete chats rows first",
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

<script type="text/javascript">
  $(".changeIndex").change(function(){
     console.log('we are done');
      var value = $(this).val();
      console.log(value);
      var id = $(this).parents("tr").attr("id");

      $.ajax({
                url: '{{url("/dashboard/project/changeIndex")}}'+'/'+id,
                type: 'POST',
                data: {
                  index : value
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {


                  swal.fire({
                      title: 'success',
                      text: 'success',
                      type: "success",
                      showCancelButton: false,
                      confirmButtonText: "Ok",
                      closeOnConfirm: true,
                })

                  // console.log(data);
                  // alert(data);
                    // document.getElementById("toggle"+id).value= value;
                      }
            });


      //  swal.fire({
      //         title: value==0?"you just added this project to home":"you just removed this project from home",
      //         text: value==0?"this project will display in home screen ":'this project will not be display in home screen ',
      //         type: "success",
      //         showCancelButton: false,

      //         confirmButtonText: "Ok",

      //         closeOnConfirm: true,


      //   }).then((result) => {
      //         if (result.isConfirmed) {
      //             $.ajax({
      //                 url: '{{url("/dashboard/project/changeIndex")}}'+'/'+id,
      //                 type: 'POST',
      //                 data: {
      //                     onscreen : value==1 ? 0 : 1
      //                 },
      //                 error: function() {
      //                     alert('Something is wrong');
      //                 },
      //                 success: function(data) {
      //                     document.getElementById("toggle"+id).value= value==1 ? 0: 1;
      //                      }
      //             });
      //         } else {
      //              swal.fire("Cancelled", " :)", "error");
      //         }
      //     });
  });
</script>



<script>

  document.getElementById('uploadUserImage').onchange = function(e) {
      console.log('upload user image')
          var url = ("{{ url('/changeUserImage') }}");
          jQuery.noConflict();
          formData = new FormData();
          var file = this.files[0];
          if (formData) {
              formData.append("image", file);
              formData.append("_token", "{{ csrf_token() }}");

              jQuery.ajax({
                  url: url,
                  type: "POST",
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function(data) {
                      var userImageSrc = data.message;
                      document.getElementById('userImage').src= userImageSrc;
                      // Swal.fire({
                      //     icon: 'success',
                      //     title: 'Success.',
                      //     text: 'Successfully deactive Notification',
                      // })
                  }
              });

          }
              console.log(this.files)
  };

  </script>



@endsection



