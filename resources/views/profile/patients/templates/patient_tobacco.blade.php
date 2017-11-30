<table class="table table-condensed table-hover">
	<tr>
		<td>Smoker</td>
		<td>{{ $data->smoker }}</td>
	</tr>
	<tr>
		<td>Currently Smoking</td>
		<td>{{ $data->currently_smoking }}</td>
	</tr>
	<tr>
		<td>Sticks per day</td>
		<td>{{ $data->sticks_per_day }}</td>
	</tr>
	<tr>
		<td>Smoking Age</td>
		<td>{{ $data->smoking_age }}</td>
	</tr>
	<tr>
		<td>Quit Smoking Age</td>
		<td>{{ $data->quit_smoking_age }}</td>
	</tr>
	<tr>
		<td>About Quitting</td>
		<td>{{ $data->about_quitting }}</td>
	</tr>
	<tr>
		<td>Other Tobacco</td>
		<td>{{ implode (", ", $data->other_tobacco) }}{{ $data->other_tobacco_type ? ', ' . $data->other_tobacco_type : '' }}</td>
	</tr>
</table>