<table class="table border-last">
	<tr>
		<td>Medication Name</td>
		<td>{{ $data->medication_name }}</td>
	</tr>
	<tr>
		<td>Prescription</td>
		<td>{{ $data->sig }}</td>
	</tr>
	<tr>
		<td>Dispense</td>
		<td>{{ $data->dispense }}</td>
	</tr>
	<tr>
		<td>Refills</td>
		<td>{{ $data->refills }}</td>
	</tr>
	<tr>
		<td>DAW</td>
		<td>{{ $data->daw_status }}</td>
	</tr>
	<tr>
		<td>Pharmacy Note</td>
		<td>{{ $data->pharmacy_note }}</td>
	</tr>
	<tr>
		<td>Indication</td>
		<td>{{ $data->indication }}</td>
	</tr>
	<tr>
		<td>Date</td>
		<td>
			{{ $data->start_date->format('F j, Y') }} - 
			{{ $data->end_date->format('F j, Y') }}
		</td>
	</tr>
	<tr>
		<td>PRN</td>
		<td>{{ $data->prn_status }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{ $data->status }}</td>
	</tr>
	<tr>
		<td>Internal Notes</td>
		<td>{{ $data->internal_notes }}</td>
	</tr>
</table>