<!--Modal for uploading photo-->
<div class="modal fade" id="upload-attachments" tabindex="-1" role="dialog" aria-labelledby="upload-avatar-title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="upload-avatar-title">Upload Attachments..</h4>
			</div>
			<div class="modal-body">
				<p>Please choose a file to upload. JPG, PNG, PDF, DOCX only.</p>
				<form role="form" enctype="multipart/form-data" method="post" action="">
					<div id="dz-attachments" class="dropzone dz-attachments">
						<div class="dz-message" data-dz-message><span>Drop files here or click here to upload.</span></div>
						<div class="dz-attachments-preview"></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary disabled btn-upload-attachments">Upload</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
