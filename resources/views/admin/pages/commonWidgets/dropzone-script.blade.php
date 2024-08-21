<script>
    Dropzone.autoDiscover = false;

    $('.my-dropzone').each(function(index,element){
      let elementDropzone = new Dropzone(element,{
      addRemoveLinks:true,
      acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4,.ogx,.oga,.ogv,.ogg,.webm",
      removedfile:function(response){
        document.getElementById(response.upload.uuid).remove();
        var _ref;
        return (_ref = response.previewElement) != null ? _ref.parentNode.removeChild(response.previewElement) : void 0;
      },
      url: "{{route('Image.store')}}",
      headers: {'X-CSRF-TOKEN':"{{ csrf_token() }}"},
      success:function(file, response) {

        var val = document.getElementById('dropzone_input').value;
        $("#dropzone_input").clone().val(response).attr('id', file.upload.uuid).attr('name',$(element).data('inputname')).appendTo(".images-inputs-container");
          }
        })
    });
  </script>
  <script>
    Dropzone.autoDiscover = false;
    $('.my-dropzone-for-one-Image').each(function(index,element){
      console.log('65846746');
        console.log(index,element);
      let elementDropzone = new Dropzone(element,{
      addRemoveLinks:true,
      maxFiles: 1,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      removedfile:function(response){
        document.getElementById(response.upload.uuid).remove();
        console.log('removed file',response);
        var _ref;
        return (_ref = response.previewElement) != null ? _ref.parentNode.removeChild(response.previewElement) : void 0;
      },
      url: "{{route('Image.store')}}",
      headers: {'X-CSRF-TOKEN':"{{ csrf_token() }}"},
      success:function(file, response) {
        console.log('adde file',file);
        var val = document.getElementById('dropzone_input').value;
        $("#dropzone_input").clone().val(response).attr('id', file.upload.uuid).attr('name',$(element).data('inputname')).appendTo(".images-inputs-container");
         },
        canceled: function (file) {
          // return this.emit("maxxxxxxxx", file, this.options.dictUploadCanceled);
          init=function(){
            var mockFile = { name: "Filename", size: 12345 };
            myDropzone.emit("maxxxxxxxx", mockFile);
          }      }
       });
       init=function(){
        var mockFile = { name: "Filename", size: 12345 };
         myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, "/image/url");
       }
    });
    </script>

  <script>
    Dropzone.autoDiscover = false;
    $('.my-dropzone-for-one-video').each(function(index,element){
      console.log('65846746');
        console.log(index,element);
      let elementDropzone = new Dropzone(element,{
      addRemoveLinks:true,
      maxFiles: 1,
      acceptedFiles: ".mp4,.ogx,.oga,.ogv,.ogg,.webm",
      removedfile:function(response){
        document.getElementById(response.upload.uuid).remove();
        console.log('removed file',response);
        var _ref;
        return (_ref = response.previewElement) != null ? _ref.parentNode.removeChild(response.previewElement) : void 0;
      },
      url: "{{route('video.store')}}",
      headers: {'X-CSRF-TOKEN':"{{ csrf_token() }}"},
      success:function(file, response) {
        console.log('adde file',file);
        var val = document.getElementById('dropzone_input').value;
        $("#dropzone_input").clone().val(response).attr('id', file.upload.uuid).attr('name',$(element).data('inputname')).appendTo(".images-inputs-container");
         }
       });
       init=function(){
        var mockFile = { name: "Filename", size: 12345 };
         myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, "/image/url");
       }
    });
    </script>

  <script>
    Dropzone.autoDiscover = false;
    $('.my-dropzone-for-one-file').each(function(index,element){
      console.log('65846746');
        console.log(index,element);
      let elementDropzone = new Dropzone(element,{
      addRemoveLinks:true,
      maxFiles: 1,
      acceptedFiles: ".pdf",
      removedfile:function(response){
        document.getElementById(response.upload.uuid).remove();
        console.log('removed file',response);
        var _ref;
        return (_ref = response.previewElement) != null ? _ref.parentNode.removeChild(response.previewElement) : void 0;
      },
      url: "{{route('video.store')}}",
      headers: {'X-CSRF-TOKEN':"{{ csrf_token() }}"},
      success:function(file, response) {
        console.log('adde file',file);
        var val = document.getElementById('dropzone_input').value;
        $("#dropzone_input").clone().val(response).attr('id', file.upload.uuid).attr('name',$(element).data('inputname')).appendTo(".images-inputs-container");
         }
       });
       init=function(){
        var mockFile = { name: "Filename", size: 12345 };
         myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, "/image/url");
       }
    });
    </script>

  <script>
    $(".remove-image").click(function() {
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
