<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-8 col-md-push-2 preferred-container">
			<h2>{!! trans('quote.step3.1.preferred_doctor') !!}</h2>
			<div class="mg-top-20 mg-bottom-20 btn-preferred" data-toggle="buttons">
			  <label class="btn btn-lg btn-default" style="width: 150px;">
			  	<input type="radio" value="yes" name="recieve" id="recieve_yes" autocomplete="off"> {!! trans('quote.step3.1.yes') !!}
			  </label>
			  <label class="btn btn-lg btn-default active" style="width: 150px;">
			  	<input type="radio" value="no" name="recieve" id="recieve_no" autocomplete="off" checked> {!! trans('quote.step3.1.no') !!}
			  </label>
			</div>
			<p>{!! trans('quote.step3.1.verify_doctor') !!}</p>
		</div>

		<div class="col-md-12 hospital-container" style="display: none;">
			<div class="col-md-8 col-md-push-2">
				<h4><b>{!! trans('quote.step3.1.enter_doctor_info') !!}</b></h4>
				<div class="form-group text-left mg-top-20">
					<label for="hospitaldoctorInput">{!! trans('quote.step3.1.doc_hosp_info') !!}</label>
					<div class="btn-group scrollable-dropdown-menu" id="hospital_typeahead">
					  <input id="hospitaldoctorInput" type="text" placeholder="Hospital / Doctor" class="typeahead input-lg form-control">
					  <span class="text-info clr">{!! trans('quote.step3.1.clear') !!}</span>
					</div>
					<p>{!! trans('quote.step3.1.cant_find') !!} <a href="#" class="add-preferred-doctor">{!! trans('quote.step3.1.here') !!}</a> {!! trans('quote.step3.1.to_add') !!}</p>
				</div>
				<div class="add-doctor-container text-left" style="display:none;">
					<div class="form-group">
						<label for="doctor_name">{!! trans('quote.step3.1.full_name') !!}</label>
						<input type="text" class="form-control" name="add_doctor_name" id="add_doctor_name" placeholder="Fullname">
					</div>
					<div class="form-group">
						<label for="">{!! trans('quote.step3.1.address') !!}</label>
						<div class="row">
							<div class="col-md-4">
								<input type="text" class="form-control" placeholder="Street" name="add_doctor_street">
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control" placeholder="City" name="add_doctor_city">
							</div>
							<div class="col-md-4">
								<select name="add_doctor_state" id="" class="form-control">
									<option value="Default">{!! trans('quote.step3.1.select_state') !!}</option>
									@foreach ($locations as $location)
										<option value="{{ $location->state_abbr }}">{{ $location->state_abbr }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="add_doctor_contact">{!! trans('quote.step3.1.contact') !!}</label>
						<input type="text" name="add_doctor_contact" id="add_doctor_contact" placeholder="Contact" class="form-control">
					</div>
					<div class="form-group text-right">
						<button class="btn btn-primary btn-add"><i class="fa fa-plus"></i> {!! trans('quote.step3.1.add') !!}</button>
						<button class="btn btn-danger btn-cancel"><i class="fa fa-times"></i> {!! trans('quote.step3.1.cancel') !!}</button>
					</div>
				</div>
				<div class="form-group text-left mg-top-20 doctors-selected" style="display: none;">
					<h5 class="text-success"><b>{!! trans('quote.step3.1.doc_hosp_added') !!}</b></h5>
				</div>
				<div id="added-doctor-template" style="display: none;">
					<div class="doctor-wrapper text-left">
						<div class="head">
							<h5 class="name"></h5>
							<h5 class="remove pull-right">
								<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</h5>
						</div>
						<p class="specialization"></p>
						<p class="street"></p>
						<p><strong class="contact_no"></strong></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" onclick="plan.gotoStep('3_2',true,false); plan.scrollTop();" class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
			</div>
		</div>
	</div>
</div>
