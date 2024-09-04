@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.view')}}">Dashboard</a></li>
                <li class="breadcrumb-item">product</li>
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
                    <h3 class="card-title">products Table</h3>
                    <a class="btn btn-primary" style="float: right" href="{{route('product.create')}}">Add product</a>
                </div>
                <div class="card-body">
                    <table id="tableContainer"  class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>i</th>
                            <th> Name </th>
                            <th>Price</th>
                            <th>Image </th>
                            <th>Category </th>
                            <th>Best Selling </th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr class="odd gradeX"  id="{{$product->id}}" >
                                <td>{{$loop->iteration}} </td>
                                <td>{{$product->name}} </td>
                                <td>{{$product->price}} </td>
                                <td><img src="{{$product->projectImages('image')->first()?$product->projectImages('image')->first()->full_url:asset("assets/admin.png")}}" class="img elevation-2" height="50" alt="User Image"></td>
                                <td>{{$product->category->name ?? '--'}}</td>
                                <td>@if($product->best_selling)
                                        <i class="fa fa-check" style="font-size:40px;color:green"></i>

                                    @else
                                        <i class="fa fa-close" style="font-size:40px;color:red"></i>
                                    @endif
                                </td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    {{-- <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE') --}}
                                    <a class="btn btn-info" href="{{route('product.edit',$product)}}">Edit</a>
                                    <button type="submit" class="btn btn-danger remove"> delete</button>

                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
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
                        url: '{{url("/dashboard/product")}}'+'/'+id,
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
