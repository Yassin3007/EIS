@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{Request::is('*about-us-sections*') ? "About Us Sections" : 'settings'}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
              <li class="breadcrumb-item">{{Request::is('*about-us-sections*') ? "About Us Sections" : "settings"}}</li>
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
        {{-- <a class="btn btn-primary" style="float: right" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.create') : route('settings.create')}}">Add</a> --}}
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>name  </th>
              <th> active / deactive </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($global_settings as $life_style)
          {{-- @dd($life_style->career) --}}
          
              <tr class="odd gradeX"  id="{{$life_style->id}}" >
                <td>{{Str::substr($life_style->name, 0, 60)}} </td>
                <td><input  id='toggle{{$life_style->id}}' type="checkbox"  @if ($life_style->status) checked @endif data-toggle="toggle" class="switch"  value="{{$life_style->status}}" > </td>
                
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{-- {{ $global_settings->links() }} --}}
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
                      url: '{{url("/dashboard/settings")}}'+'/'+id,
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

<script type="text/javascript">
  $(".switch").change(function(){
     console.log('we are done');
      var value = $(this).val();
      console.log(value);
      var id = $(this).parents("tr").attr("id");
       swal.fire({
              title: value==0?"you just active this setting ":"you just deactive this setting",
              text: value==0?"this setting will display in Home Page  ":'this setting will not be display in Home Page  ',
              type: "success",
              showCancelButton: false,
              
              confirmButtonText: "Ok",
             
              closeOnConfirm: true,
              
         
        }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      url: '{{url("/dashboard/setting/status")}}'+'/'+id,
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
