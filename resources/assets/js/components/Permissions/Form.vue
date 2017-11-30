<template>
	<div class="modal fade" 
		tabindex="-1" 
		role="dialog" 
		id="permission"
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
												class="cb"
												v-model="form.permissions"
												value="information"
												type="checkbox"> 
											Patient Information
										</label>
									</div>
									<div class="col-md-6 hidden">
										<select class="input-sm form-control">
											<option disabled>
												Select Expiration
											</option>
											<option>30 days</option>
											<option>60 days</option>
											<option>90 days</option>
											<option>
												Until I revoke permission
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label for="inputProblems">
											<input id="inputProblems" 
												class="cb"
												v-model="form.permissions"
												value="problems"
												type="checkbox"> 
											Problems
										</label>
									</div>
									<div class="col-md-6 hidden">
										<select class="input-sm form-control">
											<option disabled>
												Select Expiration
											</option>
											<option>30 days</option>
											<option>60 days</option>
											<option>90 days</option>
											<option>
												Until I revoke permission
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-6">
										<label for="inputMedications">
											<input id="inputMedications" 
												class="cb"
												v-model="form.permissions"
												value="medications"
												type="checkbox"> 
											Medications
										</label>
									</div>
									<div class="col-md-6 hidden">
										<select class="input-sm form-control">
											<option disabled>
												Select Expiration
											</option>
											<option>30 days</option>
											<option>60 days</option>
											<option>90 days</option>
											<option>
												Until I revoke permission
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label for="inputAllergies">
											<input id="inputAllergies" 
												class="cb"
												v-model="form.permissions"
												value="allergies"
												type="checkbox"> 
											Allergies
										</label>
									</div>
									<div class="col-md-6 hidden">
										<select class="input-sm form-control">
											<option disabled>
												Select Expiration
											</option>
											<option>30 days</option>
											<option>60 days</option>
											<option>90 days</option>
											<option>
												Until I revoke permission
											</option>
										</select>
									</div>
								</div>

							</div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-6">
										<label for="inputLaboratory">
											<input id="inputLaboratory" 
												class="cb"
												v-model="form.permissions"
												value="laboratory"
												type="checkbox"> 
											Laboratories
										</label>
									</div>
									<div class="col-md-6 hidden">
										<select class="input-sm form-control">
											<option disabled>
												Select Expiration
											</option>
											<option>30 days</option>
											<option>60 days</option>
											<option>90 days</option>
											<option>
												Until I revoke permission
											</option>
										</select>
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
				</div>
				<div class="modal-footer">
					<button type="button" 
						class="btn btn-default" 
						data-dismiss="modal">
						Cancel
					</button>
					<button type="button" 
						:disabled="isSignatureAttached"
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

			patient: {

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
						self.permission = res.data.permission;
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
						
						Bus.$emit('notification-recieved', {
							message: "Permissions Request sent!",
							title: "CareParrot"
						});
						$(self.$refs.modal).modal('hide');
					})
			},

			separte () {

			},
		},

		computed: {
			signaturePath () {
				if (this.isRequesting) {
					let signature = this.provider.signature;
					return signature ? signature.path : '';
				}
				return '';
			},

			enableConfirm () {
				return this.isSignatureAttached && this.form.permissions.length
						&& this.signaturePath;
			}
		}

	}
</script>

<style scoped>
	label {
		font-size: 14px;
		font-weight: 100;
	}
</style>