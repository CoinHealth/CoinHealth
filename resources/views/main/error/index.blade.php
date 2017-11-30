@extends('main.error.base')

@section('styles')
<link rel="stylesheet" type="text/css" href="/assets/css/error.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	<div class="error-container">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="error-p">
						Oops, something went wrong, you will be redirected to your profile.
					</p>
				</div>
				<div class="col-md-6">
					<div class="div-wrapper">
						<img src="/assets/icons/errorparrot.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection