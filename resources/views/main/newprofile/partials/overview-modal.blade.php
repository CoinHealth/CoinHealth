<div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 thankyou-wrapper">
              <h3>{!! trans('profile.overview.appreciation') !!}</h3>
              <h1>{{ $user->fullname }}</h1>
            </div>
          </div>
        </div>
         <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </form>
  </div>
</div>
