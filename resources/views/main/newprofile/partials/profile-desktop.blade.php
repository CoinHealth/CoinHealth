
<div class="profile-container">
	<div class="container">
		<div class="row">
			<div class="out-2">
				<div class="pull-right">
					<div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
						<ul class="dl-menu">
							<li>
								<a href="/profile/settings">{!! trans('profile.menu.menu1') !!}</a>
							</li>
							<li>
								<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
							</li>
							<li>
								<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
							</li>
						</ul>
					</div><!-- /dl-menuwrapper -->
				</div>
				<div class="pull-right">
					<a href="/community/forums" class="btn btn-link btn-home">Forums</a>
					<a href="/" class="btn btn-link btn-home"><i class="fa fa-home"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				@include('main.newprofile.partials.sidebar')
			</div>
			<div class="col-md-9">
				<div class="out">
					<div class="pull-right">
						<div id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
							<ul class="dl-menu">
								<li>
									<a href="/profile/settings">{!! trans('profile.menu.menu1') !!}</a>
								</li>
								<li>
									<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
								</li>
								<li>
									<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
								</li>
							</ul>
						</div><!-- /dl-menuwrapper -->
					</div>
					<div class="pull-right">
						<a href="/community/forums" class="btn btn-link btn-home">Forums</a>
						<a href="/" class="btn btn-link btn-home"><i class="fa fa-home"></i></a>
					</div>
				</div>
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a data-target="#documents" data-toggle="tab">{!! trans('profile.index.documents') !!}</a></li>
					<li><a data-target="#points" data-toggle="tab">{!! trans('profile.index.points') !!}</a></li>
				</ul>

				<div class="col-md-6">
					<div class="tab-content">
						<div class="tab-pane active" id="documents">
							<div class="row row-documents">
								<div class="panel panel-default">
									<div class="panel-heading panel-yellow">
										{!! trans('profile.index.popular_docs') !!}
										<a href="#upload-attachments" data-toggle="modal" class="btn-xs pull-right btn btn-primary">
											{!! trans('profile.index.upload') !!} <i class="fa fa-upload" style="margin-left:5px;"></i>
										</a>
									</div>
									<div class="panel-body">
										<div class="row row-doc">
											@foreach(auth()->user()->attachments as $attachment)
												<div class="col-md-3 file-wrapper">
													<a href="/profile/attachments/{{ $attachment->hashed_id }}" target="_blank">
														<i class="download-icon fa fa-download"></i>
													</a>
													<div class="box downloadable-img">
														<img src="/assets/icons/doc.png" alt="">
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
						</div>
						<div class="tab-pane" id="points">
							<div class="row row-documents">
								<div class="panel panel-default">
									<div class="panel-heading panel-yellow">
										{!! trans('profile.index.cp_points') !!}
									</div>
									<div class="panel-body">
										<div class="row row-cp">
 										 @foreach( auth()->user()->badges as $badge)
											<div class="col-md-12 points-badges point">
												<div class="act-desc">
													<p><span>{{ auth()->user()->fname }}</span> was rewarded a {{ $badge->point_message }}.</p>
												</div>
											</div>
	                   @endforeach
                   </div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div> {{-- end of col --}}

				<div class="col-md-6 pd-top-20">
					<div class="panel panel-default">
						<div class="panel-heading panel-yellow">
							{!! trans('profile.index.recent') !!}
						</div>
						<div class="panel-body">
							<div class="row row-act">
								@foreach(auth()->user()->activities as $activity)
									@include('main.newprofile.partials.templates.activity')
								@endforeach
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
