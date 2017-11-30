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
												class="cb"
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
												class="cb"
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
												class="cb"
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
												class="cb"
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
												class="cb"
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
export default {
	data () {
		return {
			
		}
	},
}
</script>