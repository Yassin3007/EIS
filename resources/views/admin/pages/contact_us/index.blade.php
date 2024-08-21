@extends('admin.layouts.main')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{Request::is('*about-us-sections*') ? "About Us Sections" : 'contact_us'}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
              <li class="breadcrumb-item">{{Request::is('*about-us-sections*') ? "About Us Sections" : "contact_us"}}</li>
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
        {{-- <a class="btn btn-primary" style="float: right" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.create') : route('contact_us.create')}}">Add</a> --}}
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>name  </th>
              <th> phone </th>
              <th> email </th>
{{--              <th>subject </th>--}}
              {{-- <th> hear about us </th> --}}
{{--              <th>project </th>--}}
              <th>subject </th>
              <th>message </th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($contact_us as $life_style)
              <tr class="odd gradeX"  id="{{$life_style->id}}" >
                <td>{{Str::substr($life_style->name, 0, 60)}} </td>
                <td>{{Str::substr($life_style->phone, 0, 60)}} </td>
                <td>{{Str::substr($life_style->email, 0, 60)}} </td>
{{--                <td>{{Str::substr($life_style->subject, 0, 60)}} </td>--}}
                {{-- <td>{{Str::substr($life_style->channel->name, 0, 60)}} </td> --}}
                {{-- <td>{{Str::substr($life_style->office->name, 0, 60)}} </td> --}}
{{--                <td>{{ $life_style->office?$life_style->office->name:'---' }} </td>--}}

                <td>{{  $life_style->subject  }} </td>
                <td>{{  $life_style->message  }} </td>

                <td>{{$life_style->created_at}}</td>
                <td>
                  {{-- <a class="btn btn-info" href="{{Request::is('*about-us-sections*') ? route('about-us-sections.edit',$life_style->id) : route('contact_us.edit',$life_style->id)}}">Edit</a> --}}
                  <button type="submit" class="btn btn-danger remove"> delete</button>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $contact_us->links() }}
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
                      url: '{{url("/dashboard/contact_us")}}'+'/'+id,
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
