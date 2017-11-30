<!DOCTYPE html>
<html>
	<head>
		<title>Official Receipt: {{ $payment->patient->name }} {{  date('F d, Y h:i a', strtotime($payment->created_at)) }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" 
			type="text/css" 
			href="assets/css/vendor/bootstrap/bootstrap.min.css">
		<style type="text/css">

				body {
					font-size: 12px;
					color: #444;
					font-weight: 400;
					font-family: arial, sans-serif !important;
				}

				h4 {
					margin-bottom: 5px;
					font-weight: 700;
				}

				table {
					width: 100%;
					border-collapse: collapse;
				}
				thead {
					background-color: #E0E0E0;
				}

				thead tr, th {
					padding: 15px 5px;
				}

				tbody tr, td {
					padding: 0px;
					text-transform: capitalize;
				}

				.icon-logo {
					height: 40px;
					width: auto;
				}

				.text-center {
					text-align: center;
				}

				.clear {
					clear: both;
				}

				.mt-20 {
					margin-top: 20px;
				}

				.div-treatment {
					margin-top: 50px;
					display: inline-block;
					/*background-image: 'assets/icons/cancelled.png';*/
				}

				.div-cancelled {
					text-align: center;
					/*display: inline-block;*/
					/*height: 200px;*/
				}

				.div-treatment h4 {
					margin-bottom: 5px;
				}

				.table-treatment {
					margin-top: 0px;
					margin-bottom: 30px;
				}

				.table-treatment tr, 
				.table-treatment th, 
				.table-treatment td {
					border: 1px solid black;
					padding: 10px;
				}


				.div-total {
					margin-top: 50px !important;
				}

				.div-total label {
				    width: 300px;
				    /*text-transform: uppercase;*/
				    display: inline-block
				}

				.div-auth {
					margin-top: 50px;
				}

				.ans {
					width: 250px;
					display: inline-block;
				}

				.note {
					margin-top: 100px;
					font-size: 10px;
					text-align: center;
				}

				a {
					color: #444;
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
			
		<div class="text-center">
			<h4>Official Receipt</h4>
		</div>


		<p><strong>Appointment Date: </strong> {{  date('F d, Y h:i a', strtotime($payment->created_at)) }}</p>
		<div class="clear"></div>
		<table>
			<thead>
				<tr>
					<th>Provider Information</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>{{ $payment->provider->full_name }}</strong></td>
					<td><strong>Place of service code: </strong></td>
					<td rowspan="2">	
						<strong>Office Phone: </strong>{{ $payment->provider->contact }}<br>
						<strong>Email: </strong>{{ $payment->provider->email }}
					</td>
				</tr>
			</tbody>
		</table>

		<table class="mt-20">
			<thead>
				<tr>
					<th>Patient Information</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td rowspan="2">
						<strong>Patient Name: </strong>{{ $payment->patient->name }}
						<br>
						<strong>Date of Birth: </strong>{{  date('F d, Y', strtotime($payment->patient->dob)) }}
					</td>
					<td>	
						<strong>Patient Address: </strong>{{ $payment->patient->address }}
					</td>
				</tr>
			</tbody>
		</table>

		
		
		<div class="div-treatment">
			<h4>Treatment</h4>
			<div class="clear"></div>
			<!-- <div class="div-cancelled">
				<img src="assets/icons/cancelled.png">
			</div> -->
			<table class="table-treatment">
				<thead>
					<tr>
						<th>Description</th>
						<th>Fee</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($payment->fees as $fee)
					<tr>
						<td>{{ $fee->description }}</td>
						<td>$ {{ ltrim($fee->fee, '0') }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="div-total">
				<p>
					<label><strong>Total Charges: </strong></label>
					<label>$ {{ $payment->total_charges }}</label>
				</p>
				<p>
					<label><strong>Total Discounts: </strong></label>
					<label>$ {{ $payment->total_discounts }}</label>
				</p>
				<p>
					<label><strong>Patient Paid: </strong></label>
					<label>$ {{ $payment->patient_paid }}</label>
				</p>
				<p>
					<label><strong>Insurance Paid: </strong></label>
					<label>$ {{ $payment->insurance_paid }}</label>
				</p>
				<p>
					<label><strong>Patient Balance Due: </strong></label>
					<label>$ {{ $payment->patient_balance_due }}</label>
				</p>
				<p>
					<label><strong>Billed To: </strong></label>
					<label>{{ $payment->billed_to }}</label>
				</p>
			</div>

			<div class="div-auth">
				<p>I authorize the release of any medical information necessary to process this claim.</p>
				<p>
					<label>Date: <span class="ans">_____________________________</span></label>
					<label>Patient Signature: <span class="ans">_____________________________</span></label>
				</p>
				<p>
					<label>Date: <span class="ans">_____________________________</span></label>
					<label>Provider Signature: <span class="ans">____________________________</span></label>
				</p>

			</div>


		</div>


		<div class="note">
			<p>
				*This serves as an electronic receipt generated by <a href="https://careparrot.com" target="_blank">Careparrot</a> and its affiliate Providers.
			</p>
		</div>




	</div>
</div>


	</body>
</html>