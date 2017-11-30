<div class="modal fade" id="modal-apply" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Premium Listing</h4>
      </div>
      <div class="modal-body">
        <p>Do you want to apply in our Premium Listing Account?</p>
      </div>
      <div class="modal-footer">
        <label for="prevent" class="pull-left">
          <input type="checkbox" {{ $user->prevent ? 'checked' :'' }} id="prevent"> Dont show this message again
        </label>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="/careconnect/create-doctor" id="yes" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
