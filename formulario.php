
<form id="uploadForm" enctype="multipart/form-data">
  <input type="file" name="file" id="file">
  <input type="button" value="Upload" onclick="uploadFile()">
</form>
<div id="progressBar"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script>

function uploadFile() {
  var file = $('#file')[0].files[0];
  var formData = new FormData();
  formData.append('file', file);

  $.ajax({
    url: 'upload.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    xhr: function() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener('progress', function(evt) {
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total;
          percentComplete = parseInt(percentComplete * 100);
          $('#progressBar').text(percentComplete + '%');
        }
      }, false);
      return xhr;
    },
    success: function(data) {
      $('#progressBar').text('Upload completo!');
    }
  });
}


</script>