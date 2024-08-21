@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $location->id ? 'Edit' : ' Create' }} location</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('location.index') }}">location</a></li>
                <li class="breadcrumb-item active">location Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-create">
                <div class="card-header">
                    <h3 class="card-title">{{ $location->id ? 'Edit' : ' Add' }} location</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ $location->id ? route('location.update', $location->id) : route('location.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($location->id)
                            @method('put')
                        @endif


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <location>Name en </location>
                                    <input type="text" name="name_en" value="{{ $location->name_en }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <location>Name ar </location>
                                    <input type="text" name="name_ar" value="{{ $location->name_ar }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <location>description en </location>
                                    <input type="text" name="description_en" value="{{ $location->description_en }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <location>description ar </location>
                                    <input type="text" name="description_ar" value="{{ $location->description_ar }}"
                                        class="form-control" placeholder="Enter ...">
                                </div>
                            </div>


                            <div class="col-sm-12" id="map" style="height: 400px;"></div>
                            <input type="text" name="long" hidden id="long">
                            <input type="text" name="lat" hidden id="lat">


                            <div class="col-12 text-right mt-3">
                                <button class="form-control btn btn-success" style="width:5cm;"
                                    type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>
    </div>
@endsection
@section('page_level_js')
    {{-- @include('admin') --}}
    @include('admin.pages.commonWidgets.dropzone-script')
    <script>
        $(".remove").click(function() {
            var id = $(this).parents("div").attr("id");
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
                        url: '{{ url('/dashboard/image/delete/') }}' + '/' + id,
                        type: 'Post',
                        error: function() {
                            swal.fire({
                                title: "Something is wrong",
                                icon: "error",
                            })
                        },
                        success: function(data) {
                            $("#" + id).remove();
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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        $(document).ready(function() {
            console.log(L);
            var map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker ;

            function onMapClick(e) {
                let lat = e.latlng.lat ;
                let lang = e.latlng.lng ;
                $('#long').val(lang);
                $('#lat').val(lat);
                if(marker){
                    map.removeLayer(marker)

                }
                 marker = L.marker([lat, lang]).addTo(map)
            }

            map.on('click', onMapClick);

        });
    </script>
@endsection
