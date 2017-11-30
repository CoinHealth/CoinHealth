<div class="modal fade" id="new-thread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Thread</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="/community/forums" method="post" id="create-topic">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="channel">Select Channel</label>
                <select name="channel" id="channel" class="form-control">
                  <option value="1">General</option>
                  <option value="2">Health and Wellness</option>
                  <option value="3">News</option>
                  <option value="4">Support</option>
                </select>
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <textarea name="title" id="title" rows="3" class="resize-v form-control" placeholder="Title"></textarea>
              </div>
              <div class="share-forms" style="display:none;">

                <div class="form-group">
                  <label for="">Body</label>
                  <textarea class="tinymce" name="body" placeholder="Body"></textarea>
                </div>

                <div class="form-group share-cb">
                  <label for="share">
                    <input type="checkbox" name="share" id="share"> Do you want to share this thread to <a href="/community/news" class="btn-link" target="_blank">CareParrot news</a>?
                  </label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-create btn-green">Create</button>
      </div>
    </div>
  </div>
</div>
