<!DOCTYPE html>
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@yield('content_header')
@stop
{{--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>--}}
<script src="https://cdn.tiny.cloud/1/9gmhr2o6ya53gt9qolug1gt8hqmzbrn6557pirrw6qujkch4/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>@section('content')
    @yield('content')
@stop

@section('footer')
    <div class="d-flex justify-content-between text-left">
    <span><span class="current_year"></span> © <a href="https://www.fabrica-dev.com/ ">Deco Art</a> Rights Reserved</span>
    <span>Version 1.0.0</span>
    </div>
@stop

@section('css')
  <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/bootstrap-toggle-master/css/bootstrap-toggle.css")}}" >
  {{-- semantic ui css --}}
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('semantic/dist/semantic.min.css')}}"> --}}
  <!-- semantic ui  -->
  <link href="{{asset('vendor/semantic/semantic.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>@stop

@section('js')
<script src="{{asset('js/admin_customjs.js')}}"></script>
<script src="{{asset("assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}"></script>
<script src="{{asset("assets/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js")}}"></script>
{{--<script>--}}
{{--    CKEDITOR.replace('content');--}}
{{--    CKEDITOR.replace('content2');--}}
{{--</script>--}}
{{-- semantic ui js --}}
{{-- <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="{{asset('semantic/dist/semantic.min.js')}}"></script> --}}

<!-- semantic -->
<script src="{{asset('vendor/semantic/semantic.min.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>
    tinymce.init({
        selector: '#content,#content2',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();  // Ensure content is saved in the underlying textarea
            });
        },
        plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@yield('page_level_js')

@stop
