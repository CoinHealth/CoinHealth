<template>
	<div class="col-md-12">
		<p class="category">Activities</p>
		
		<permissions 
			:data="permissions">		
		</permissions>

		<appointments 
			:data="appointments">		
		</appointments>
		
		<directories 
			:data="directories">
		</directories>
		<medications v-if="isPatient" 
			:data="medications">
		</medications>
	</div>
</template>
<script>

import Directories from './Directories.vue'
import Medications from './Medications.vue'
import Appointments from './Appointments.vue'
import Permissions from './Permissions.vue'
import Bus from '../../Bus.js';
import axios from 'axios';
export default {
	components: {
        'directories': Directories,
        'medications': Medications,
        'appointments': Appointments,
        'permissions': Permissions,
	},

	data () {
		return {
			directories: [],
			medications: [],
			appointments: [],
			permissions: [],

			activities: [],
		}
	},

	mounted () {
		this.fetch();
		this.prepareBroadcasting();
	},

	methods: {
		prepareBroadcasting () {
			Echo.private(`Activity.${this.Laravel.userId}`)
			.notification((activity) => {
				console.log(activity);
				this.assign(activity,true);
				this.activities.unshift(activity);
				Bus.$emit('notification-recieved');
			});
		},

		fetch () {
			let self = this;
            axios.get('/profile/activities')
                .then(res => {
                    self.activities = res.data.activities;
                    self.separate();
                });
		},

		separate () {
			let self = this;
			this.activities.forEach((activity) => {
				self.assign(activity);
			});
		},

		assign (activity, isNew = false) {
			if (activity.type.match(/Permissions/) || activity.type.match(/TeamBuilder/)) {
				if (!isNew)
					this.permissions.push(activity);
				else	
					this.permissions.unshift(activity)
			}
			else if (activity.type.match(/Appointments/)) {
				if (!isNew)
					this.appointments.push(activity);
				else	
					this.appointments.unshift(activity)
			}
			else if (activity.type.match(/Directories/)) {
				if (!isNew)
					this.directories.push(activity);
				else	
					this.directories.unshift(activity)
			}
		},
	},
}
</script>