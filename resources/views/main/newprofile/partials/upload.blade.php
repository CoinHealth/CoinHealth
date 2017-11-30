
<div class="modal fade" id="select-attachment" tabindex="-1" role="dialog" aria-labelledby="upload-avatar-title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="upload-avatar-title">Upload Attachments..</h4>
			</div>
			<div class="modal-body">
        <div class="row">
          <div class="col-md-12">
						<div class="alert alert-warning">By sharing this file, you understand and accept the risks involved. Do you wish to continue?</div>
            <h4 class="raleway-m">Please choose a file</h4>
            <div class="col-sm-12 images-wrapper">
              @if (!auth()->user()->attachments->count())
                <p>Looks like you dont have any files uploaded on your Drive.</p>
              @endif
              @foreach(auth()->user()->attachments as $attachment)
              <div class="col-sm-4 used image-wrapper">
                <label for="image-{{ $attachment->id }}" class="image-src" style="background-image: url({{ $attachment->display_path }})" title="{{ $attachment->title }}"></label>
                <input id="image-{{ $attachment->id }}" type="checkbox" class="image-checkbox" value="{{ $attachment->id }}">
              </div>
              @endforeach
            </div>
            <hr />
            <h4>Or upload new attachment from your PC.</h4>
            <label for="attachment" class="btn btn-info">Attach</label>
          </div>
        </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Upload</button>
			</div>
		</div>
	</div>
</div>
