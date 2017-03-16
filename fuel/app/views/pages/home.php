<style type="text/css">img {
  max-width: 100%; /* This rule is very important, please do not ignore this! */
}</style>
<label class="btn btn-primary"> Upload
	<input type="file" name="image" class="hidden fileupload">
</label>

<div class="modal fade" id="crop_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Crop Banner</h4>
			</div>
			<div class="modal-body">
				<div class="imageWrap">
					<img src="" id="imagecrop" class="img-responsive imageload" style="width: 100%" >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="btn_crop" type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on('change', 'input.fileupload', function (e) {
		$('#crop_modal').modal('show');
		var reader = new FileReader();
	    reader.onload = function(event) {
	        $('.imageload').attr("src", event.target.result);
	    };
	    reader.onerror = function(event) {
	        alert("ERROR: " + event.target.error.code);
	    };
	    reader.readAsDataURL(this.files[0]);

	});
</script>

<script>
    window.addEventListener('DOMContentLoaded', function () {
    	var url = "<?php echo Uri::create('public/upload');?>";
      var image = document.getElementById('imagecrop');
      var cropBoxData;
      var canvasData;
      var crop_data;
      var cropper;      

      $('#crop_modal').on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        	autoCropArea: 1,
         	aspectRatio: 1200 / 400,
          ready: function () {
            // Strict mode: set crop box data first
            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
          }
        });
      })
      $(document).on('click', '#btn_crop', function () {
			$('#crop_modal').modal('hide');
			cropedimage = cropper.getCroppedCanvas().toDataURL('image/jpeg');
			$.ajax(url,{
				data:{cropedimage:cropedimage},
				type:'post',				
			})
		});
    });
</script>