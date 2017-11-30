	<div class="panel {{ ($activity->status == 0) ? 'panel-warning' : 'panel-primary' }}" data-id="{{ $activity->id }}">
		<div class="panel-heading">
			<div class="pull-right buttons">
				<a href="#" title="Edit" class="btn btn-xs btnEditActivity" data-activity-id="{{ $activity->id }}" data-toggle="modal" data-target="#modal-appointment"><i class="fa fa-pencil"></i></a> 
			</div> 
			<h3 class="panel-title">Appointment Request</h3>
		</div> 
		<div class="panel-body">
			<ul class="list-unstyled">
				<li><span>Patient's Name: </span><span>{{ $activity->user->full_name }}</span> </li> 
				<li><span>Date: </span><span class="scheduled_on">{{ ($activity->appointment != null) ? $activity->appointment->scheduled_on : $activity->date }}</span> </li> 
				<li><span>Reason for Visit: </span><span>{{ ($activity->appointment != null) ? $activity->appointment->reason : $activity->reason }}</span> </li> 
				<!-- <li><span>Facility Phone: </span><span>{{ $activity->phone }}</span> </li>  -->
				<!-- <li><span>Location: </span><span></span> </li>  -->
				<li><span>Status: </span><span class="status">{{ ($activity->appointment != null) ? $activity->appointment->appointment_status : $activity->lead_status }}</span> </li> 
			</ul>
		</div>
	</div>
