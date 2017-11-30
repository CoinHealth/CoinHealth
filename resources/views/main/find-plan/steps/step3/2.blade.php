<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-6 text-center col-md-push-3">
			<h2>{!! trans('quote.step3.2.conditions') !!}</h2>
			<div class="pre-existing-container">
				<div class="form-group">
					<div class="btn-conditions btn-main" data-toggle="buttons">
						<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
							<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step3.2.diabetes') !!}
						</label>
						<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
							<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step3.2.asthma') !!}
						</label>
						<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
							<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step3.2.heart') !!}
						</label>
						<label class="btn btn-default cp-btn-checkbox" style="width:130px;">
							<input type="checkbox" name="conditions" id="others" autocomplete="off"> {!! trans('quote.step3.2.others') !!}
						</label>
					</div>
				</div>
				<div class="form-group specify-container" style="display:none;">
					<label for="">{!! trans('quote.step3.2.specify') !!}</label>
					<input type="text" class="form-control pre-existing-other" placeholder="{!! trans('quote.step3.2.specify_input') !!}">
				</div>
			</div>
			<h2>{!! trans('quote.step3.2.doctor_visit') !!}</h2>
			<p class="small">{!! trans('quote.step3.2.other_check') !!}</p>
			<div class="form-group">
				<div class="btn-visits btn-group-justified btn-solo btn-main" data-toggle="buttons">
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step3.2.visit1') !!}
					</label>
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step3.2.visit2') !!}
					</label>
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step3.2.visit3') !!}
					</label>
				</div>
			</div>
			<div class="form-group" data-trigger="hover focus" title="{!! trans('quote.step3.2.required') !!}">
				<input type="text" placeholder="{!! trans('quote.step3.2.p_full_name') !!}" name="applicant_name" class="form-control repetetive">
				<label>{!! trans('quote.step3.2.full_name') !!}</label>
			</div>
			<div class="form-group" data-trigger="hover focus" title="{!! trans('quote.step3.2.required') !!}">
				<input type="text" placeholder="{!! trans('quote.step3.2.email') !!}" name="applicant_email" class="form-control repetetive form-applicant-fullname">
				<label>{!! trans('quote.step3.2.email') !!}</label>
			</div>
			{{-- <h5 class="text-orange">Awesome!</h5>
			<p class="text-orange">We will email you your options</p> --}}
		</div>
		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" onclick="plan.gotoStep('4_1',false,false); plan.scrollTop();" class="nextBtn btn btn-success">Continue</button>
			</div>
		</div>
	</div>
</div>
