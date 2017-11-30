<!DOCTYPE html>
<html>
	<head>
		<title>Information of {{ $patient_name }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" 
			type="text/css" 
			href="assets/css/vendor/bootstrap/bootstrap.min.css">
		<style type="text/css">
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
						<strong>PATIENT INFORMATION</strong>
					</h5>
					<table class="heading-table table table-condensed">
						<tr>
							<td>Patient Name: </td>
							<td class="underlined">{{ $patient_name }}</td>
							<td class="text-right">SSN:</td>
							<td class="underlined">123123</td>
						</tr>
						<tr>
							<td>Requested By:</td>
							<td class="underlined">{{ $provider_name }}</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Requested On:</td>
							<td class="underlined">{{ $date }}</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="col-md-12">
					<div class="disclaimer">
						<p class="text-justify">
							This document is provided solely for reference purposes. Covered entities under <strong>HIPAA</strong> are advised to refer to their institution's Privacy Policy for specific requirements for the <strong>HIPAA</strong> authorization.
						</p>
						<p class="text-justify">
							I, {{ $patient_name }} , give permission to, 
							{{ $provider_name }} to use or disclose the protected health information below for my own medical advantage, benefit and care. I have affixed my signature at the end of this document that I fully authorize this request.
						</p>
					</div>
				</div>
				<hr>
				<div class="col-md-12">
					@foreach($permission->permissibles as $permissible)
						<div class="information-container">
							<h5 class="info-heading">
								{{ proper_case($permissible->permissible_type) }}
							</h5>
							<div class="permissible-container">
								@if (!$permissible->permissible()->count())
									<p class="no-data">No Data available.</p>
								@endif

								@foreach($permissible->permissible as $data)
									@include(
										'pdf.patient.partials.'. snake_case(class_basename($permissible->permissible_type)),
										$data
									)
								@endforeach
							</div>
							<hr>
						</div>
					@endforeach
				</div>
				<div class="col-md-12 footer">
					<div class="row text-center">
						<div class="col-xs-6 patient">
							<div class="signature-wrapper">
								<img src="{{ $signature_patient }}">
								<p>{{ $patient_name }}</p>
							</div>
							<p class="bottom-text">Patient / Authorized Person</p>
						</div>
						<div class="col-xs-6 provider">
							<div class="signature-wrapper">
								<img src="{{ $signature_provider }}">
								<p>{{ $provider_name }}</p>
							</div>
							<p class="bottom-text">Requested By</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		
		
	</body>
</html>