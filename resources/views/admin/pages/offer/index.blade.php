@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>offers</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
                <li class="breadcrumb-item">offer</li>
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
                    <h3 class="card-title">Offers Table</h3>
                    <a class="btn btn-primary" style="float: right" href="{{route('offer.create')}}">Add offer</a>
                </div>
                <div class="card-body">
                    <table id="tableContainer"  class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>i</th>
                            <th> start date </th>
                            {{--              <th>offer AR </th>--}}
                            <th>end date </th>
                            <th> type </th>
                            <th> value </th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($offers as $offer)
                            <tr class="odd gradeX"  id="{{$offer->id}}" >
                                <td>{{$loop->iteration}} </td>
                                <td>{{$offer->from}} </td>
                                {{--                <td>{{$offer->name_ar}} </td>--}}
                                <td>{{$offer->to}}</td>
                                <td>{{$offer->type}}</td>
                                <td>{{$offer->value}}</td>
                                <td>{{$offer->created_at}}</td>
                                <td>
                                    {{-- <form action="{{route('offer.destroy',$offer->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE') --}}
                                    <a class="btn btn-info" href="{{route('offer.edit',$offer->id)}}">Edit</a>
                                    <button type="submit" class="btn btn-danger remove"> delete</button>

                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {{ $offers->links() }}--}}
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
                        url: '{{url("/dashboard/offer")}}'+'/'+id,
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
