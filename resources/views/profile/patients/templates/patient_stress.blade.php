<table class="table table-condensed table-hover">
	<tr>
		<td>Major Stressors</td>
		<td>{{ implode (", ", $data->major_stressors) }}</td>
	</tr>
	<tr>
		<td>Other Stressors</td>
		<td>{{ $data->other_stressors }}</td>
	</tr>
	<tr>
		<td>Changes in Family Health</td>
		<td>{{ $data->changes_in_family_health }}</td>
	</tr>
	<tr>
		<td>Handle Stress</td>
		<td>{{ $data->handle_stress }}</td>
	</tr>
	<tr>
		<td>Relaxing Activities</td>
		<td>{{ $data->relaxing_activities }}</td>
	</tr>
</table>