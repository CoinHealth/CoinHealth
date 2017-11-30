<div class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#">
          <div class="upload-photo"></div>
        </a>
        <div class="name">
          <p class="name">
            {{ auth()->user()->fullname }}
          </p>
          <p class="username">
            {{ auth()->user()->display_name }}
          </p>
        </div>
        <div class="status">
          @if( auth()->user()->full_address )
            <p class="address">
              <i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{ auth()->user()->full_address }}</span>
            </p>
          @endif
          <p class="email">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>{{ auth()->user()->email }}</span>
          </p>
          <p class="time">
            <i class="fa fa-clock-o" aria-hidden="true"></i> Joined on <span>{{ auth()->user()->created_at->format('F d, Y') }}</span>
          </p>
        </div>
        <div class="ffc">
          <div class="col-md-4">
            <p class="followers">
              <span class="number">{{ auth()->user()->followers()->count() }}</span><br><span>Followers</span>
            </p>
          </div>
          <div class="col-md-4">
            <p class="following">
              <span class="number">{{ auth()->user()->following()->count() }}</span><br><span>Following</span>
            </p>
          </div>
          <div class="col-md-4">
            <p class="cp-points">
              <span class="number">{{ auth()->user()->points()->count() }}</span><br><span>CP Points</span>
            </p>
          </div>
        </div>
        <div class="clear"></div>
        @if ( auth()->user()->badges()->count() )
          <div class="badge-container">
            <p class="p-badge">Badges</p>
            <div class="row">
              @foreach( auth()->user()->badges as $badge)
                <div class="col-md-3">
                  <div class="div-badge">
                    <img src="{{ $badge->icon_path }}" alt="">
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-9">
        <div class="pull-right">
          <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger"><i class="fa fa-lg fa-spin fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <ul class="dl-menu">
              <li>
                <a href="/profile/settings">Settings</a>
              </li>
            </ul>
          </div><!-- /dl-menuwrapper -->
        </div>

        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a data-target="#documents" data-toggle="tab">DOCUMENTS</a></li>
          <li><a data-target="#points" data-toggle="tab">POINTS</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="documents">
            <div class="row row-documents">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-yellow">
                    Popular Docs
                  </div>
                  <div class="panel-body">
                    <div class="row row-doc">
                      @foreach(auth()->user()->attachments as $attachment)
                        <div class="col-md-3">
                          <div class="box">
                            <img src="{{ $attachment->path }}" alt="">
                            <div class="box-cat">
                              {{ $attachment->title }}
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-yellow">
                    Recent Activities
                  </div>
                  <div class="panel-body">
                    @foreach(auth()->user()->activities as $activity)
                      <div class="row row-activities">
                        <div class="col-md-12">
                          <div class="act-title">
                            <p>{{ $activity->from_url }}</p>
                          </div>
                          <div class="act-desc">
                            <p>{{ $activity->message }}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="points">
            <div class="row row-documents">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-yellow">
                    CP Points
                  </div>
                  <div class="panel-body">
                    @foreach(auth()->user()->points as $point)
                      <div class="row row-cp">
                        <div class="col-md-12">
                          <div class="act-title">
                            <p>{{ $point->from_url }}</p>
                          </div>
                          <div class="act-desc">
                            <p>{{ $point->pivot->action }}</p><span class="points">{{ $point->point }}</span>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading panel-yellow">
                    Recent Activities
                  </div>
                  <div class="panel-body">
                    @foreach(auth()->user()->activities as $activity)
                      <div class="row row-activities">
                        <div class="col-md-12">
                          <div class="act-title">
                            <p>{{ $activity->from_url }}</p>
                          </div>
                          <div class="act-desc">
                            <p>{{ $activity->message }}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="chart-container">
          <div style="width:100%;">
            <canvas id="canvas"></canvas>
          </div>
        </div>

        <div class="sc-container">
          <div class="row">
            <div class="col-md-4">
              <div class="status-box">
                <p class="s-number">2,027 Total</p>
                <p class="s-month">January 06, 2016 - June 06, 2016</p>
                <p class="s-cat">Total Contributions</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="status-box">
                <p class="s-number">162 Days</p>
                <p class="s-month">January 06, 2016 - June 06, 2016</p>
                <p class="s-cat">Days Active</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="status-box">
                <p class="s-number">13 People</p>
                <p class="s-month">January 06, 2016 - June 06, 2016</p>
                <p class="s-cat">Referred Users</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
