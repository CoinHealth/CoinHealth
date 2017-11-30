<template>
	<div class="activity">
		<div class="row" 
			:activity="activity" 
			:is="templateType">	
		</div>
	</div>
</template>
<script>
import UserHasSavedProvider from './UserHasSavedProvider.vue';
import UserHasUnsavedProvider from './UserHasUnsavedProvider.vue';

import mixinActivity from '../../mixins/activity.js'
import mixinTemplate from '../../mixins/template.js';
export default {
	mixins: [mixinActivity, mixinTemplate],
	components: {
		'user-has-saved-provider': UserHasSavedProvider,
		'user-has-unsaved-provider': UserHasUnsavedProvider,
	},
}
</script>