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
		@yield('og')
    <link rel="shortcut icon" href="/assets/icons/logo.png">
    <link href="/assets/css/vendor/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/vendor/fontawesome/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/zoom.css">
	<link rel='stylesheet' href='/assets/css/modal.css' />
	<link rel="stylesheet" href="/css/gamification.css">

    @yield('styles')

</head>
<body>
	<script>
		var csrf_token = "{{ csrf_token() }}"
	</script>
	@if(auth()->check())
	<div id="y04nVjgOvE"></div>
	@endif
	<div class="container-fluid">
		@include('gamification.partials.modal')
