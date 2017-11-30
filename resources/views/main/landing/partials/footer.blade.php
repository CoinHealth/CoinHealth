<div class="main-footer-container row" style="display: none;">
	<div class="horizontal-menu-container row" style="display: none;">
		<div class="col-md-4 col-xs-6 col-xs-offset-3 text-center col-md-offset-4 menu-container">
			<ul class="list-inline menu-icons">
				<li>
					<a href="/">
						<img class="img-responsive" src='/assets/icons/icon-home.png'>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="/social" target="_blank">
						<img class="img-responsive" src='/assets/icons/icon-community.png'>
						<span>Community</span>
					</a>
				</li>
				<li>
					<a href="/blogs" target="_blank">
						<img class="img-responsive" src='/assets/icons/icon-blog.png'>
						<span>Blog</span>
					</a>
				</li>
				<li>
					<a href="/news" target="_blank">
						<img class="img-responsive" src='/assets/icons/icon-news.png'>
						<span>News</span>
					</a>
				</li>
				<li>
					<a href="/">
						<img class="img-responsive" src='/assets/icons/icon-contact.png'>
						<span>Contact</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="horizontal-zip-container row"  align="center">
		<!-- <div class="zip-code-container col-md-4 col-xs-6 col-xs-offset-3 col-md-offset-4"> -->
			<form method="get" action="/zip_code">
				{{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
				<div class="pill-zip with-bg text-center">
					<button type="submit">Compare!</button>
					<input maxlength="5" name="zip_code" autocomplete="off" value="{{ is_null($user) ? '' : $user->zip_code }}" type="text" placeholder="Enter Zip Code">
				</div>
			</form>
		<!-- </div> -->
	</div>
	<div class="main-footer row text-center">
		<a href='#' class="close-btn">&times;</a>
		<div class="col-xs-12">
			<div class="row-eq-height">
				<div class="col-xs-3">
					@if (!auth()->check())
					<a href="/auth/login" class="btn btn-info"><img class='img-responsive' src='/assets/icons/icon-door.png' /> Log In</a>
					@else
					<a href="/profile" target="_blank" class="btn btn-info">Profile</a>
					<br>
					<a href="/auth/logout" class="link">Logout</a>
					@endif
				</div>
				<div class="col-xs-6">
					<ul class='list-inline main-footer-icons'>
						<li>
							<a target="_blank" href='http://facebook.com/ilovecareparrot' class='f-icon'><img class='icon-fb ' src='/assets/icons/icon-fb.png' /></a>
						</li>
						<li>
							<a target="_blank" href='http://twitter.com/ilovecareparrot' class='f-icon'><img class='icon-twitter ' src='/assets/icons/icon-twitter.png' /></a>
						</li>
						{{-- <li>
							<a target="_blank" href='http://plus.google.com/careparrot' class='f-icon'><img class='icon-google ' src='/assets/icons/icon-google.png' /></a>
						</li> --}}
						{{-- <li class="horizontal-menu-btn">
							<a href='#' class='f-icon'><img class='icon-plus' src='/assets/icons/icon-plus.png' /></a>
						</li> --}}
						<li>
							<a target="_blank" href='http://instagram.com/ilovecareparrot' class='f-icon'><img class='icon-instagram ' src='/assets/icons/icon-instagram.png' /></a>
						</li>
						<!-- <li>
							<a target="_blank" href='http://pinterest.com/careparrot' class='f-icon'><img class='icon-pinterest ' src='/assets/icons/icon-pinterest.png' /></a>
						</li> -->
						{{-- <li>
							<a target="_blank" href='http://whatsapp.com/careparrot' class='f-icon'><img class='icon-pinterest ' src='/assets/icons/icon-whatsapp.png' /></a>
						</li> --}}
					</ul>
				</div>
				<div class="col-xs-3">
					<a href="/auth/login" target="_blank" class="btn btn-info btn-contact">Contact</a>
				</div>
			</div>
		</div>
	</div>
</div>
