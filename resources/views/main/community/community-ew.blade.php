@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/community-ew.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 nopadding">
				<div class="east">
					<p class="title">
						I'm from the<br><span>WESTCOAST</span>
					</p>
					<div class="btn-enter">
						<a href="/community/west" class="btn btn-west">ENTER</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 nopadding">
				<div class="west">
					<p class="title">
						I'm from the<br><span>EASTCOAST</span>
					</p>
					<div class="btn-enter">
						<a href="/community/east" class="btn btn-east">ENTER</a>
					</div>
				</div>
			</div>
		</div>
		<div class="back-row">
			<a href="/" class="back-btn"><img src="/assets/icons/back.png" alt=""></a>
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