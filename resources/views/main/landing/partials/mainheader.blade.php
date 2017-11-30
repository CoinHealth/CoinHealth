<!doctype html>
<html>
<head>
	<!-- Begin DigiCert site seal JavaScript code -->
	<script type="text/javascript">
	var __dcid = __dcid || [];__dcid.push(["DigiCertClickID_6vw19vpF", "7", "s", "black", "6vw19vpF"]);(function(){var cid=document.createElement("script");cid.async=true;cid.src="//seal.digicert.com/seals/cascade/seal.min.js";var s = document.getElementsByTagName("script");var ls = s[(s.length - 1)];ls.parentNode.insertBefore(cid, ls.nextSibling);}());
	</script>
<!-- End DigiCert site seal JavaScript code -->
	<meta charset="utf-8">
    <title>Careparrot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/gamification.css">
		@yield('og')
    <link rel="shortcut icon" href="/assets/icons/logo.png">
    <link href="/assets/css/vendor/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/vendor/fontawesome/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/zoom.css">

    @yield('styles')

	{{-- Laravel configurations --}}
	@include('partials.includes.laravel')

</head>
<body>
    @include('gamification.partials.modal')
	<div>
		<div class="container-fluid">
			<div class="main-header row">
				<div class='main-cp-icon'>
					<a href="/">
						<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
					</a>
				</div>
			</div>
		</div>

