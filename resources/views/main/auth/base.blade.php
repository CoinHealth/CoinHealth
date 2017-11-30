@extends('main.partials.base')

@section('content')
<div class='row'>
	<div class='col-md-12 auth-container'>
		<div class='col-sm-4 col-sm-offset-4 auth-inner' >
			<div class='wrapper'>
				<div class='auth-cp-logo'>
					<a href="/">
						<img class='img-responsive' src='/assets/icons/careparrot-icon-trans.png' />
					</a>
				</div>
				@yield('content.inner')
			</div>
		</div>
	</div>
</div>
{{-- @include('main.partials.page-footer') --}}
@endsection
