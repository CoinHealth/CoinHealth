@extends('profile.base')

@section('content.inner')
<div id="patient_erx">

	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category pull-left">
				<span>{{ $patient->name }}</span>
			</p>
			<a href="/profile/patients" class="btn btn-default pull-right">
				<i class="fa fa-chevron-left"></i> 
				Back
			</a>
		</div>
	</div>
	<div class="top-content">
		<div class="row erx-container mt-30">
			<div class="col-md-12">

				<transition v-if="!pageStarted" name="popup">
					<div class="row">
						<div class="col-md-12 text-center">
							<img src="/assets/icons/loading.svg">
						</div>
					</div>
				</transition>
				
				<transition v-else name="popup">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="panel-title">
								Send eRx
							</span>
							<button type="button" 
								:class="['btn', 'btn-xs','pull-right','btn-primary', pickingCss]"
								@click="isPicking = !isPicking">
								<span>@{{ pickingText }}</span>
							</button>
						</div>
						<div class="panel-body">
							<transition name="popup" v-if="!isPicking">
								<div class="form-horizontal">
									<div class="form-group">
										<label class="form-label col-md-3">
											Medication Name
										</label>
										<div class="col-md-9">
											<multi-select
										        label="generic_name"
										        track-by="id"
										        placeholder="Type to search"
										        :options="medications"
										        :searchable="true"
										        :loading="loading"
										        :internal-search="false"
										        @input="setMedication"
										        @search-change="getMedicationsName">
										    </multi-select>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label col-md-3">
											SIG
										</label>
										<div class="col-md-9">
											<sig-builder v-model="form.sig">
											</sig-builder>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label col-md-3">
											Note to Pharmacy
										</label>
										<div class="col-md-9">
											<v-textarea
												v-model="form.pharmacy_note"
												rows="2"
												:limit="255"
												classes="no-resize form-control">
											</v-textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<label>Dispense</label>
											<input type="text" 
												v-model="form.dispense"
												placeholder="Dispense" 
												class="form-control">
										</div>
										<div class="col-md-3">
											<label>Refills</label>
											<input type="number" 
												v-model="form.refills" 
												placeholder="Refill" 
												class="form-control">
										</div>
										<div class="col-md-3 text-center">
											<label>DAW</label>
											<div>
												<toggle-button :width="100"
													@change="toggleDaw"
													:sync="true"
													:value="form.daw"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label col-md-3">
											Indication
										</label>
										<div class="col-md-9">
											<v-textarea
												v-model="form.indication"
												rows="2"
												:limit="255"
												classes="no-resize form-control">
											</v-textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<label>Start Date</label>
											<date-picker :bootstrap-styling="true" 
												input-class="form-control" 
												:calendar-button="true" 
												format="yyyy-MM-dd" 
												v-model="form.start_date">		
											</date-picker>
										</div>
										<div class="col-md-3">
											<label>End Date</label>
											<date-picker :bootstrap-styling="true" 
												input-class="form-control" 
												:calendar-button="true" 
												format="yyyy-MM-dd" 
												v-model="form.end_date">		
											</date-picker>
										</div>
										<div class="col-md-3 text-center">
											<label>PRN</label>
											<div>
												<toggle-button :width="100"
													@change="togglePrn"
													:sync="true"
													:value="form.prn"/>
											</div>
										</div>
									</div>


									<div class="form-group">
										<label class="form-label col-md-3">
											Internal Notes
										</label>
										<div class="col-md-9">
											<v-textarea
												v-model="form.internal_notes"
												rows="2"
												:limit="255"
												classes="no-resize form-control">
											</v-textarea>
										</div>
									</div>
								</div>
							</transition>
							<transition v-else name="popup">
								<multi-select v-model="form.medication"
							        label="medication_name"
							        track-by="id"
							        placeholder="Pick from existing Medication"
							        :options="patientMedication"
							        :searchable="true"
							        :loading="loading"
							        @input="picked"
							        :internal-search="false">
							    </multi-select>
							</transition>
						</div>
						<div class="panel-footer text-right">
							<button type="button" 
								:disabled="!canSend"
								@click="preview"
								class="btn btn-xs btn-primary">
								<i class="fa fa-eye-slash"></i> Preview
							</button>
							<button type="button" 
								:disabled="!canSend"
								@click="send"
								class="btn btn-xs btn-primary">
								<i class="fa fa-check"></i> Send
							</button>
						</div>
					</div>
				</transition>

			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-erx.js"></script>
@endpush
