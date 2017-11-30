<div class="leaderboard" id="leaderboard">
  <div class="leaderboard-header">
    <button type="button" class="close" data-dismiss="leaderboard" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="text-center">LEADERBOARD</h4>
  </div>
  <div class="leaderboard-content">
    <div class="top">
      <div class="top-avatar text-center">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <img src="{{ $leaderboards->first()['user']->avatar_path }}" class="img-responsive" />
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <p class="top-name">
        <a href="/profile/overview/{{ $leaderboards->first()['user']->username }}">
          {{ $leaderboards->first()['user']->full_name }}
        </a>
      </p>
      <em class="top-count">{{ $leaderboards->first()['count'] }}</em>
    </div>
    <div class="list">
    @foreach($leaderboards->slice(1) as $leaderboard)
      <div class="row leaderboard-user-row">
        <div class="col-xs-4">
          <img src="{{ $leaderboard['user']->avatar_path }}" alt="" class="img-responsive" />
        </div>
        <div class="col-xs-8 list-user">
          <p>
            <a href="/profile/overview/{{ $leaderboard['user']->username }}">
              {{ $leaderboard['user']->full_name }}
            </a>
          </p>
          <em>{{ $leaderboard['count'] }}</em>
        </div>
      </div>
    @endforeach
    </div>
    <p class="reward text-center"><a href="#" data-toggle="tooltip" data-title="Coming Soon">Rewards</a></p>
  </div>
</div>
