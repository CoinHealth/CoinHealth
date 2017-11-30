@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carecommunity.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="category-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="care-img">
						<img src="../assets/icons/carecat.png" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<ul class="carelist">
						<li>{!! trans('carecommunity.category-list1') !!}</li>
						<li>{!! trans('carecommunity.category-list2') !!}</li>
						<li>{!! trans('carecommunity.category-list3') !!}</li>
						<li>{!! trans('carecommunity.category-list4') !!}</li>
					</ul>
				</div>
			</div>
			<div class="carelist-container">
				<div class="row">
          <div class="col-md-12">
            @foreach($users->chunk(4) as $chunked)
              <div class="row users-row">
                @foreach($chunked as $user)
                  <div class="col-md-3 user-card">
                    <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <a href="/profile/overview/{{ $user->username }}"><img src="{{ $user->avatar_path }}" style="height: 150; width: 150px;" alt="" class="img-rounded img-responsive" /></a>
                      </div>
                      <div class="col-sm-6 col-md-8">
                        <h4>
                          <a href="/profile/overview/{{ $user->username }}">{{ $user->full_name }}</a>
                        </h4>
                        <small>
                          <cite title="San Francisco, USA">
                            San Francisco, USA <i class="glyphicon glyphicon-map-marker"></i>
                          </cite>
                        </small>
                        <p>
                          <i class="glyphicon glyphicon-envelope"></i> {{ $user->email }}
                        </p>
                        <!-- Split button -->
                        <a href="/profile/overview/{{ $user->username }}" role="button" class="btn btn-xs btn-follow">
                          View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script src="/assets/js/activity.js"></script>
<script type="text/javascript">
	activity.initCommunity();
</script>
@endsection
