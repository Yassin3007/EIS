{{-- <div class="images-inputs-container"> --}}
    <input type="text" id="dropzone_input" hidden>
{{-- </div> --}}

<div class="dropzone my-dropzone" data-inputname="{{$inputName ?? 'images[]'}}" >
<div class="fallback">
    <input name="file[]"  type="file" multiple />
</div>
</div>
