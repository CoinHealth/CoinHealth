<div class="modal fade" id="edit-post" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="col-md-12">
              <div class="form-group">
        				<textarea name="description" required id="" rows="4" class="noresize-v form-control" placeholder="Write a post.."></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
        <button type="button" class="btn btn-primary" data-timeline-post-save>Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
