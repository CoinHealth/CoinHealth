<table class="table table-condensed table-hover">
	<tr>
		<td>Temparature</td>
		<td>{{ $data->temperature }}</td>
	</tr>
	<tr>
		<td>Pulse</td>
		<td>{{ $data->pulse }}</td>
	</tr>
	<tr>
		<td>Blood Pressure</td>
		<td>{{ $data->blood_pressure_formatted }} BPM</td>
	</tr>
	<tr>
		<td>Respiratory Rate</td>
		<td>{{ $data->respiratory_rate }}</td>
	</tr>
	<tr>
		<td>Oxygen Saturation</td>
		<td>{{ $data->oxygen_saturation }} %</td>
	</tr>
	<tr>
		<td>Height</td>
		<td>{{ $data->height_formatted }}</td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>{{ $data->pounds }} lbs</td>
	</tr>
	<tr>
		<td>BMI</td>
		<td>{{ $data->bmi }}</td>
	</tr>
	<tr>
		<td>Pain</td>
		<td>{{ $data->pain }}</td>
	</tr>
	<tr>
		<td>Smoking</td>
		<td>{{ $data->smoking }}</td>
	</tr>
	<tr>
		<td>Head Circumference</td>
		<td>{{ $data->head_circumference }}</td>
	</tr>
</table>