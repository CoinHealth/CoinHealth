<div class="modal fade profile-modal" id="followersModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="/assets/icons/logo.png" alt="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="followers-wrapper">
            @foreach (auth()->user()->followers as $follower)
              <div class="row form-group">
                <div class="col-md-4">
                  <img src="{{ $follower->avatar }}" class="profile-img">
                </div>
                <div class="col-md-8">
                 <label class="profile-name">{{ $follower->fullname }}</label>
                </div>
              </div>
            @endforeach
          </div>
        </div>
         <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </form>
  </div>
</div>


<div class="modal fade profile-modal" id="followingModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="/assets/icons/logo.png" alt="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="following-wrapper">
            @foreach (auth()->user()->following as $following)
              <div class="row form-group">
                <div class="col-md-4">
                  <img src="{{ $following->avatar }}" class="profile-img">
                </div>
                <div class="col-md-8">
                 <label class="profile-name">{{ $following->fullname }}</label>
                </div>
              </div>
            @endforeach
          </div>
        </div>
         <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </form>
  </div>
</div>
