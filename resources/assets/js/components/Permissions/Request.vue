<template>
	<div class="modal fade" 
		tabindex="-1" 
		role="dialog" 
		id="permissionModal"
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
						Request Permissions
					</h4>
				</div>
				<div class="modal-body">
					<transition v-if="!loading" name="popup">
						<div class="row" v-if="!loading">
							<div class="col-md-12">
								<p>
									Please select information that you want to view.
								</p>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label for="inputInformation">
											<input id="inputInformation" 
												:disabled="hasAttribute('information')"
												v-model="form.permissions"
												value="information"
												type="checkbox"> 
											Patient Information
										</label>
									</div>
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label for="inputProblems">
											<input id="inputProblems"
												:disabled="hasAttribute('problems')"
												v-model="form.permissions"
												value="problems"
												type="checkbox"> 
											Problems
										</label>
									</div>
									
								</div>
							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-6">
										<label for="inputMedications">
											<input id="inputMedications"
												:disabled="hasAttribute('medications')"
												v-model="form.permissions"
												value="medications"
												type="checkbox"> 
											Medications
										</label>
									</div>
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label for="inputAllergies">
											<input id="inputAllergies" 
												
												:disabled="hasAttribute('allergies')"
												v-model="form.permissions"
												value="allergies"
												type="checkbox"> 
											Allergies
										</label>
									</div>
									
								</div>

							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-6">
										<label for="inputLaboratory">
											<input id="inputLaboratory"
												:disabled="hasAttribute('laboratory')"
												v-model="form.permissions"
												value="laboratory"
												type="checkbox"> 
											Laboratories
										</label>
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
										upload/sign
									</a>
									your signature first before making this request
								</p>
							</div>
						</div>
					</transition>
					<transition v-if="permissionHaveSet" name="popup">
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-info alert-dismissible" 
									role="alert">
									<button type="button" 
										class="close" 
										data-dismiss="alert" 
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Heads up!</strong> Looks like you have already sent a Permission request to this patient.
								</div>
							</div>
						</div>
					</transition>
				</div>
				<div class="modal-footer">
					<button type="button" 
						class="btn btn-default" 
						data-dismiss="modal">
						Cancel
					</button>
					<button type="button" 
						:disabled="isSignatureAttached || permissionHaveSet"
						@click="isSignatureAttached = true"
						class="btn btn-primary">
						Attach Signature
					</button>
					<button type="button" 
						:disabled="!enableConfirm"
						@click="confirm"
						class="btn btn-primary">
						Confirm
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
			provider: {
				type: Object, 
			},

			isRequesting: {
				type: Boolean,
				default: true,
			},
			patientId: String,
		},

		data () {
			return {
				loading: true,
				isSignatureAttached: false,
				form: {
					permissions: [],
				},
				permission: null,
				permissionHaveSet: false,
			};
		},

		mounted () {
			$(this.$refs.modal).on('hidden.bs.modal', this.hidden)
				.on('show.bs.modal', this.show);;
		},

		methods: {
			show () {
				let self = this;
				let requestUrl = `/profile/permission/patient/${self.patientId}`
				self.loading = true;
				axios.get(requestUrl)
					.then(res => {
						let permission = res.data.permission;
						self.permission = permission;
						self.separate();
						self.loading = false;
					});
			},

			hidden () {
				this.form.permissions = [];
				this.isSignatureAttached = false;
			},

			attach () {
				this.isSignatureAttached = true;
			},	

			confirm (e) {
				let self = this;
				let btn = e.target;
				let form = {
					is_requesting: self.isRequesting,
					permissions: self.form.permissions,
					patient_id: self.patientId
				};

				btn.disabled = true
				let requestUrl = `/profile/permission/patient/${self.patientId}`;
				axios.post(requestUrl, form)
					.then(res => {
						self.$emit('permission-requested', res.data.permission);
						Bus.$emit('notification-recieved', {
							message: "Permissions Request sent!",
							title: "CareParrot"
						});
						$(self.$refs.modal).modal('hide');
					})
			},

			separate () {
				let permissions = this.form.permissions;
				if (!this.permission) 
					return;
				
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
						if (!_.includes(permissions, "information"))
							permissions.push("information")
					}
				});

				if (permissions.length >= 5) {
					this.permissionHaveSet = true;
				}


			},

			hasAttribute (attr) {
				return _.includes(this.form.permissions, attr);
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