<template>
<!-- controllers used profile/patientcontroller, profile/appointmentcontroller -->
	<div class="activity">
		<div class="row" 
			:activity="activity" 
			:is="templateType">	
		</div>
	</div>
</template>
<script>
import ProviderHasSetAppointment from './ProviderHasSetAppointment.vue';
import ProviderSuggestedAnAppointment from './ProviderSuggestedAnAppointment.vue';
import PatientHasSetAppointment from './PatientHasSetAppointment.vue';
import PatientDeclinedAppointment from './PatientDeclinedAppointment.vue';
import ProviderDeclinedAppointment from './ProviderDeclinedAppointment.vue';
import PatientApprovedAppointment from './PatientApprovedAppointment.vue';
import ProviderApprovedAppointment from './ProviderApprovedAppointment.vue';
import ProviderUpdatedAppointment from './ProviderUpdatedAppointment.vue';

import mixinActivity from '../../mixins/activity.js'
import mixinTemplate from '../../mixins/template.js';
export default {
	mixins: [mixinActivity, mixinTemplate],
	components: {
		'provider-has-set-appointment': ProviderHasSetAppointment,
		'provider-suggested-an-appointment': ProviderSuggestedAnAppointment,
		'patient-has-set-appointment': PatientHasSetAppointment,
		'patient-declined-appointment': PatientDeclinedAppointment,
		'provider-declined-appointment': ProviderDeclinedAppointment,
		'patient-approved-appointment' : PatientApprovedAppointment,
		'provider-approved-appointment' : ProviderApprovedAppointment,
		'provider-updated-appointment' : ProviderUpdatedAppointment
	},
}
</script>
