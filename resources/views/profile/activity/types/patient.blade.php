<div class="panel {{ ($activity->status == 1) ? 'panel-primary' : ($activity->status == 2 ? 'panel-danger' : 'panel-warning') }}">
	<div class="panel-heading">
		<div class="pull-right buttons">
			@if( $activity->status == 0)
			<!-- <a href="#" title="Edit" class="btn btn-xs"><i class="fa fa-pencil"></i></a>  -->
			@endif
			<!-- <a href="#" title="Delete" class="btn btn-xs"><i class="fa fa-times"></i></a> -->
		</div> 
		<h3 class="panel-title">Appointment Request</h3>
	</div> 
	<div class="panel-body"><!---->
		<ul class="list-unstyled">
			<li><span>Doctor's Name: {{ $activity->provider->full_title }}</span><span></span> </li> 
			<li><span>Date: </span><span>{{ $activity->date }}</span> </li> 
			<li><span>Reason for Visit: </span><span>{{ $activity->reason }}</span> </li> 
			<li><span>Contact: </span><span>{{ $activity->provider->phone }}</span> </li> 
			<li><span>Location: </span><span>{{ $activity->provider->full_address }}</span> </li> 
			<li><span>Status: </span><span>{{ ($activity->status == 0) ? 'Needs Confirmation' : (isset($activity->appointment->appointment_status) ? $activity->appointment->appointment_status : '') }}</span> </li> 
		</ul>
	</div>
</div>