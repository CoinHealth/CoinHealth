<!DOCTYPE html>
<html>
	<head>
		<title>Prescription of {{ $patient_name }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" 
			type="text/css" 
			href="assets/css/vendor/bootstrap/bootstrap.min.css">
		
		<style type="text/css">
			@font-face {
				font-family: 'Kristi';
				font-style: normal;
				font-weight: 400;
				src: local('Kristi Regular'), 
						local('Kristi-Regular'), 
						url(fonts/Kristi.ttf) 
						format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
			}
			body, html {
				font-size: 12px;
				color: #444;
				font-weight: 400;
				font-family: arial, sans-serif;
			}
			[class*=col-xs-], [class*=col-xs-] {
				padding-left: 5px;
				padding-right: 5px;
			}
			h4 {
				color: #444;
			}
			p {
				margin-bottom: 5px;
			}
			hr {
				margin-top: 5px;
				margin-bottom: 5px;
				border-top: 2px solid rgba(100,100,100,0.5);
			}
			.heading-table {
				border: 0;
			}
			.heading-table .underlined{
				border-bottom: 1px solid #444;
			}
			.heading-table tr td,
			.border-last tr td{
				border-top: none !important;
			}
			.heading-table tr td:first-child{
				width: 100px;
			}

			.information-container .info-heading {
				text-transform: capitalize;
				font-weight: bold;
				font-family: arial, sans-serif;

			}
			.information-container hr {
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.information-container .border-last tr td:first-child {
				width: 150px;
				background: #f5f5f5;
				border-top: 1px solid white !important;
			}
			.footer {
				position: absolute;
				bottom: 0;
			}

			.footer p.bottom-text {
				margin-top: 5px;
				border-top: 1px solid #444;
			}
			.footer .col-xs-6 {
				padding-left: 20px;
				padding-right: 20px;
			}
			.footer .signature-wrapper img {
				position: relative;
				height: 120px;
				width: auto;
				margin-bottom: -30px;	
			}

			.footer .signature-wrapper p {
				font-weight: bold;
				font-family: arial, sans-serif;
				font-size: 16px;
			}

			.prescriptions {
				font-size: 22px;
				padding-top: 20px;
				font-family: 'Kristi', cursive;
			}

			.prescriptions img {
				width: 50px;
				height: 50px;
			}



		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="header text-center">
						<img class="icon-logo cp-logo" src="images/careparrot-text.png">
						<p class="small cp-address">
							157 E Main St #501, Rock Hill, SC 29730
						</p>
						<a href="https://www.careparrot.com" 
							class="btn-link" 
							target="_blank">
							careparrot.com
						</a>
					</div>
				</div>
				<hr>
				<div class="col-md-12">
					<h5 class="text-center">
						<strong>Prescription</strong>
					</h5>
					<table class="heading-table table table-condensed">
						<tr>
							<td>Patient Name: </td>
							<td class="underlined">{{ $patient_name }}</td>
						</tr>
						<tr>
							<td>Prescribed By:</td>
							<td class="underlined">{{ $provider_name }}</td>
						</tr>
						<tr>
							<td>Date:</td>
							<td class="underlined">{{ $date }}</td>
						</tr>
					</table>
				</div>
				<hr>
				<div class="col-md-12 prescriptions">
					<img src="images/rx-logo.png">
					<p class="medication_name">{{ $medication }}</p>
					<p class="sig">{{ $sig }}</p>
				</div>

				<div class="col-md-12 footer">
					<hr>
					<div class="row text-center">
						<div class="col-xs-6 patient">
							
						</div>
						<div class="col-xs-6 provider">
							<div class="signature-wrapper">
								<img src="{{ $signature_provider }}">
								<p>{{ $provider_name }}</p>
							</div>
							<p class="bottom-text">Prescribed By</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		
		
	</body>
</html>