@extends('main.forums.base')

@section('styles')
  <link rel="stylesheet" href="/assets/css/sidebar.css">
 <link rel="stylesheet" href="/assets/css/forums.css">
@endsection

@section('content.inner')
  @include('main.partials.sidebar')
	<div class="col-md-12 search-container text-center">
		<input type="text" placeholder="Search..." class="search-input text-italic">
		<a role="submit" class="search-submit" href="#"><i class="fa fa-search"></i></a>
	</div>
	<div class="col-md-12 topics-container text-center">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="row">
					<div class="col-md-6 topics topic-general">
						<a href="/community/forums/general">
							<img src="/assets/icons/forums/general.png" alt="General" class="img-responsive">
							<h2>General</h2>
						</a>
						<p class="topic-labels">
							<span>
								<span class="count-topic">{{ $general['topic'] }}</span> {{ str_plural('Topic', (int) $general['topic']) }}
							</span>
							<span>
                <span class="count-comment">{{ $general['comments'] }}</span> {{ str_plural('Comment', (int) $general['comments']) }}
							</span>
						</p>
					</div>
					<div class="col-md-6 topics topic-health-wellness">
						<a href="/community/forums/health-wellness">
							<img src="/assets/icons/forums/health-wellness.png" alt="Health and Wellness" class="img-responsive">
							<h2>Health and Wellness</h2>
						</a>
						<p class="topic-labels">
							<span>
								<span class="count-topic">{{ $health['topic'] }}</span> {{ str_plural('Topic', (int) $health['topic']) }}
							</span>
							<span>
								<span class="count-comment">{{ $health['comments'] }}</span> {{ str_plural('Comment', (int) $health['comments']) }}
							</span>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 topics topic-news">
						<a href="/community/forums/news">
							<img src="/assets/icons/forums/news.png" alt="News" class="img-responsive">
							<h2>News</h2>
						</a>
						<p class="topic-labels">
							<span>
								<span class="count-topic">{{ $news['topic'] }}</span> {{ str_plural('Topic', (int) $news['topic']) }}
							</span>
							<span>
								<span class="count-comment">{{ $news['comments'] }}</span> {{ str_plural('Comment', (int) $news['comments']) }}
							</span>
						</p>
					</div>
					<div class="col-md-6 topics topic-support">
						<a href="/community/forums/support">
							<img src="/assets/icons/forums/support.png" alt="Support" class="img-responsive">
							<h2>Support</h2>
						</a>
						<p class="topic-labels">
							<span>
								<span class="count-topic">{{ $support['topic'] }}</span> {{ str_plural('Topic', (int) $support['topic']) }}
							</span>
							<span>
								<span class="count-comment">{{ $support['comments'] }}</span>  {{ str_plural('Comment', (int) $support['comments']) }}
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-md-12 disclaimer-container text-center">
		<p class="disclaimer">By joining the CareCommunity, you fully agree to the <a href="/terms" target="_blank">terms and usage policies</a> of CareParrot</p>
	</div>
@endsection

@section('scripts')
@include('main.partials.scripts.sidebar')
@endsection
