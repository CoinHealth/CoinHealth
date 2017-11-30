<div class="modal fade" tabindex="-1" role="dialog" id="modal-save">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <form action="/directory/doctors" method="post">
      <div class="modal-body">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="provider_id">

        @if(auth()->user())
          @if(auth()->user()->purpose == 1)
            <h4>Are you sure you want to add this provider to your directory?</h4>
          @elseif(auth()->user()->purpose == 2)
            <h4>Are you sure you want to claim this data?</h4>
          @endif
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
