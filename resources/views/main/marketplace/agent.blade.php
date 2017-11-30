@extends('main.marketplace.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/agent.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="gameon-container">
		<div class="container">
			<div class="row">
				<div class="col-md-1">
					<img src="/assets/icons/whiteparrot.png" class="logo"alt="">
				</div>
			</div>
			<div class="row">
				<p class="agents-p">
					<span>Agents</span>,<br>
					this ONE's<br>
					for you.
				</p>
			</div>
			<div class="clear"></div>
			<div class="row">
				<div class="box-link">
					<div>
						<a href="http://agents.careparrot.com" class="btn-white">Enter</a>
					</div>
					<div class="clear"></div>
					<div class="link-not">
						<a href="/" class="not-now">Not now</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="desc">finally, a system that adapts to  your needs</p>
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
@endsection

