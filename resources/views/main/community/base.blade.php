@extends('main.partials.base')

<div class="container-fluid">

	<div class="main-header row">
		<div class='main-cp-icon'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>
</div>

@section('content')
<div class='row'>
	@yield('content.inner')
</div>
@endsection
