<table class="table table-condensed table-hover">
	<tr>
		<td>Operation</td>
		<td>{{ $data->operation }}</td>
	</tr>
	<tr>
		<td>Hospitalizations</td>
		<td>{{ $data->hospitalizations }}</td>
	</tr>
	<tr>
		<td>Psychological Therapy</td>
		<td>{{ $data->psychological_therapy }}</td>
	</tr>
	<tr>
		<td>Major Injuries</td>
		<td>{{ $data->major_injuries }}</td>
	</tr>
	<tr>
		<td>Illnesses</td>
		<td>{{ $data->illnesses }}</td>
	</tr>
	<tr>
		<td>Date</td>
		<td>{{ $data->date->format('F j, Y') }}</td>
	</tr>
</table>