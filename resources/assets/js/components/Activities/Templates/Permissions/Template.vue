<template>
	<div class="activity">
		<div class="row" 
			:activity="activity" 
			:is="templateType">	
		</div>
	</div>
</template>
<script>
import ProviderSentRequest from './ProviderSentRequest.vue';
import ProviderRequestedToProvider  from './ProviderRequestedToProvider.vue';
import PatientApprovedRequest from './PatientApprovedRequest.vue';
import PatientDeniedRequest from './PatientDeniedRequest.vue';

import UserSentInvitation from './UserSentInvitation.vue';
import UserHasJoined from './UserHasJoined.vue';
import InvitationWasAccepted from './InvitationWasAccepted.vue';
import InvitationWasDeclined from './InvitationWasDeclined.vue';

import mixinActivity from '../../mixins/activity.js'
import mixinTemplate from '../../mixins/template.js';

export default {
	mixins: [mixinActivity, mixinTemplate],
	components: {
		'provider-sent-request':ProviderSentRequest,
		'provider-requested-to-provider':ProviderRequestedToProvider,
		'patient-approved-request':PatientApprovedRequest,
		'patient-denied-request':PatientDeniedRequest,
		'user-sent-invitation': UserSentInvitation,
		'user-has-joined': UserHasJoined,
		'invitation-was-accepted': InvitationWasAccepted,
		'invitation-was-declined': InvitationWasDeclined,
	},
}
</script>