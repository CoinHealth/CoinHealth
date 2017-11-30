@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/register.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="container">
	
		<div class="register-container">
			<div class="row">
				<div class="logo">
					<img src="/assets/icons/careparrot-small.png" alt="">
				</div>

				<p class="title">
					Register for an account to get free access to:
				</p>

				<ul class="checklist">
					<li>Check for symptoms and possible treatments</li>
					<li>Conditions and Procedures</li>
					<li>Doctors and health professionals near you</li>
					<li>Pill identifier and formulary info</li>
				</ul>
				
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
