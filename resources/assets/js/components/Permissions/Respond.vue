<template>
	<div class="modal fade" 
		tabindex="-1" 
		role="dialog" 
		id="permissionRespond"
		ref="modal"
		aria-labelledby="permissionModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" 
						class="close" 
						data-dismiss="modal" 
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="permissionModal">
						Permissions
					</h4>
				</div>
				<div class="modal-body">
					<transition v-if="!loading" name="popup">
						<div class="row" v-if="!loading">
							<div class="col-md-12">
								<p v-if="isPatient">
									Please select informations that you want to 
									give permissions
								</p>
								<p v-else>
									{{ activity.data.patient.name }} Informations
								</p>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-6">
										<label for="inputInformation">
											<input id="inputInformation" 
												:disabled="isProvider || activity.read_at"
												class="cb"
												v-model="form.permissions"
												value="information"
												type="checkbox"> 
											Patient Information
										</label>
									</div>
									<div class="col-xs-6" v-if="isPatient">
										<transition name="popup">
											<select :disabled="!hasAttribute('information')"
												v-model="form.validity.information"
												class="input-sm form-control">
												<option value="" disabled>
													Select Expiration
												</option>
												<option value="30">30 days</option>
												<option value="60">60 days</option>
												<option value="90">90 days</option>
												<option value="0">
													Until I revoke permission
												</option>
											</select>
										</transition>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-6">
										<label for="inputProblems">
											<input id="inputProblems" 
												:disabled="isProvider || activity.read_at"
												class="cb"
												v-model="form.permissions"
												value="problems"
												type="checkbox"> 
											Problems
										</label>
									</div>
									<div class="col-xs-6" v-if="isPatient">
										<transition name="popup">
											<select :disabled="!hasAttribute('problems')"
												v-model="form.validity.problems"
												class="input-sm form-control">
												<option value="" disabled>
													Select Expiration
												</option>
												<option value="30">30 days</option>
												<option value="60">60 days</option>
												<option value="90">90 days</option>
												<option value="0">
													Until I revoke permission
												</option>
											</select>
										</transition>
									</div>
								</div>
							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-xs-6">
										<label for="inputMedications">
											<input id="inputMedications" 
												:disabled="isProvider || activity.read_at"
												class="cb"
												v-model="form.permissions"
												value="medications"
												type="checkbox"> 
											Medications
										</label>
									</div>
									<div class="col-xs-6" v-if="isPatient">
										<transition name="popup">
											<select :disabled="!hasAttribute('medications')"
												v-model="form.validity.medications"
												class="input-sm form-control">
												<option value="" disabled>
													Select Expiration
												</option>
												<option value="30">30 days</option>
												<option value="60">60 days</option>
												<option value="90">90 days</option>
												<option value="0">
													Until I revoke permission
												</option>
											</select>
										</transition>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-6">
										<label for="inputAllergies">
											<input id="inputAllergies" 
												:disabled="isProvider || activity.read_at"
												class="cb"
												v-model="form.permissions"
												value="allergies"
												type="checkbox"> 
											Allergies
										</label>
									</div>
									<div class="col-xs-6" v-if="isPatient">
										<transition name="popup">
											<select class="input-sm form-control"
												v-model="form.validity.allergies"
												:disabled="!hasAttribute('allergies')">
												<option value="" disabled>
													Select Expiration
												</option>
												<option value="30">30 days</option>
												<option value="60">60 days</option>
												<option value="90">90 days</option>
												<option value="0">
													Until I revoke permission
												</option>
											</select>
										</transition>
									</div>
								</div>

							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-xs-6">
										<label for="inputLaboratory">
											<input id="inputLaboratory" 
												:disabled="isProvider || activity.read_at"
												class="cb"
												v-model="form.permissions"
												value="laboratory"
												type="checkbox"> 
											Laboratories
										</label>
									</div>
									<div class="col-xs-6" v-if="isPatient">
										<transition name="popup">
											<select class="input-sm form-control"
												v-model="form.validity.laboratory"
												:disabled="!hasAttribute('laboratory')">
												<option value="" disabled>
													Select Expiration
												</option>
												<option value="30">30 days</option>
												<option value="60">60 days</option>
												<option value="90">90 days</option>
												<option value="0">
													Until I revoke permission
												</option>
											</select>
										</transition>
									</div>
								</div>
							</div>
						</div>
					</transition>
					<transition v-else name="popup">
						<div class="row">
							<div class="col-md-12 text-center">
								<img src="/assets/icons/loading.svg">
							</div>
						</div>
					</transition>
					<transition name="popup" >
						<div class="row signature-row" v-if="isSignatureAttached">
							<div class="col-md-12">
								<img :src="signaturePath" 
									v-if="signaturePath" 
									ref="signature">	
								<p v-else>
									Please 
									<a href="/profile#signature" class="btn-link">
										upload or sign
									</a>
									your signature first before making this request
								</p>
							</div>
						</div>
					</transition>
				</div>
				<div class="modal-footer">
					<button v-if="isProvider"
						type="button"
						class="btn btn-default"
						data-dismiss="modal">
						Close
					</button>
					<button v-if="isPatient && activity.read_at"
						type="button"
						class="btn btn-default"
						data-dismiss="modal">
						Close
					</button>
					<button v-if="isPatient && !activity.read_at" 
						type="button" 
						:disabled="isSignatureAttached"
						@click="isSignatureAttached = true"
						class="btn btn-primary">
						Attach Signature
					</button>
					<button v-if="isPatient && !activity.read_at" 
						:disabled="!enableConfirm"
						type="button" 
						ref="btnDecline"
						@click="decline"
						class="btn btn-danger">
						Deny
					</button>
					<button v-if="isPatient && !activity.read_at" 
						type="button" 
						ref="btnAccept"
						:disabled="!enableConfirm"
						@click="accept"
						class="btn btn-primary">
						Accept
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>	
	import axios from 'axios';
	import Bus from '../../Bus.js';
	export default {
		props: {
			show: {
				type: Boolean,
				default: false,
			},

			activity : {
				type: Object,
				required: true,
			},
		},

		data () {
			return {
				loading: true,
				isSignatureAttached: false,
				form: {
					permissions: [],
					validity: {
						information: '',
						problems: '',
						medications: '',
						allergies: '',
						laboratory: ''
					},
				},
				permission: this.activity.data.permission,
				isShown: this.show,
			};
		},

		mounted () {
			$(this.$refs.modal).on('hidden.bs.modal', this.hidden)
				.on('shown.bs.modal', () => this.loading = false)
				.on('show.bs.modal', this.showModal);
		},

		watch: {

			isShown (val) {
				let status = val ? 'show' : 'hide';
				$(this.$refs.modal).modal(status);
			},

			show (val) {
				this.isShown = val;
			}
		},

		methods: {
			showModal () {
				this.separate();
			},

			hidden () {
				this.form.permissions = [];
				this.isSignatureAttached = false;
				this.loading = true;
				this.$emit('close');
			},

			decline ($e) {
				let btn = $e.target;
				let self = this;

	            btn.disabled = true;
	            
	            let id = this.activity.data.permission.id;
	            let url = `/profile/permission/patient/${id}/deny`;
	            let form = {
	            	accepted: false, 
	            	activity_id: this.activity.id
	           	};
	            axios.post(url, form)
	                .then(res => {
	                    btn.disabled = false;
	                    self.$emit('completed');
	                    $(this.$refs.modal).modal('hide')
	                    Bus.$emit('notification-recieved', {
	                        message: "Permission denied",
	                        title: "Permissions"
	                    });
	                    self.isShown = false;
	                });
			},

			accept ($e) {
				let btn = $e.target;
				let self = this;
	            btn.disabled = true;

	            let id = this.activity.data.permission.id;
	            let url = `/profile/permission/patient/${id}/accept`;
	            let form = {
	            	accepted: true, 
	            	activity_id: this.activity.id,
	            	form: this.form,
	           	};
	            axios.post(url, form)
	                .then(res => {
	                    btn.disabled = false;
	                    self.$emit('completed');
	                    Bus.$emit('notification-recieved', {
	                        message: "Permission accepted",
	                        title: "Permissions"
	                    });
	                    self.isShown = false;
	                });
			},

			separate () {
				let permissions = this.form.permissions;
				this.permission.permissibles.forEach((permissible) => {
					let type = permissible.permissible_type;
					if (type.match(/PatientProblem/)) {
						permissions.push("problems")
					}
					else if (type.match(/Medication/)) {
						permissions.push("medications")
					}
					else if (type.match(/Allergy/)) {
						permissions.push("allergies")
					}
					else if (type.match(/Laboratory/)) {
						permissions.push("laboratory")
					}
					else {
						permissions.push("information")
					}
				});
			},

			hasAttribute (attr) {
				return this.form.permissions.filter((permission) => {
					return permission == attr;
				}).length;
			},
		},

		computed: {
			enableConfirm () {
				return this.isSignatureAttached && this.form.permissions.length
						&& this.signaturePath;
			},
		}

	}
</script>

<style scoped>
	label {
		font-size: 14px;
		font-weight: 100;
	}
</style>