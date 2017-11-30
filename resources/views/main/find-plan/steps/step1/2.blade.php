<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-6 text-center col-md-push-3">
			<h1>{!! trans('quote.step1.2.conditions') !!}</h1>
			<div class="form-group">
				<div class="btn-conditions btn-main" data-toggle="buttons">
					<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step1.2.diabetes') !!}
					</label>
					<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step1.2.asthma') !!}
					</label>
					<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step1.2.heart') !!}
					</label>
					<label class="btn btn-default cp-btn-checkbox" style="width:130px;">
						<input type="checkbox" name="conditions" id="" autocomplete="off"> {!! trans('quote.step1.2.others') !!}
					</label>
				</div>
			</div>
			<h2>{!! trans('quote.step1.2.doctor_visit') !!}</h2>
			<p class="small">{!! trans('quote.step1.2.other_check') !!}</p>
			<div class="form-group">
				<div class="btn-visits btn-solo btn-main" data-toggle="buttons">
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step1.2.visit1') !!}
					</label>
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step1.2.visit2') !!}
					</label>
					<label for="" class="btn btn-default cp-btn-checkbox" style="width:150px;">
						<input type="radio" name="visits" autocomplete="off"> {!! trans('quote.step1.2.visit3') !!}
					</label>
				</div>
			</div>
			<div class="form-group" data-trigger="hover focus" title="this is a required field">
				<input type="text" placeholder="Full Name" name="applicant_name" class="form-control repetetive">
				<label>{!! trans('quote.step1.2.full_name') !!}</label>
			</div>
			<div class="form-group" data-trigger="hover focus" title="this is a required field">
				<input type="text" placeholder="Email" name="applicant_email" class="form-control repetetive form-applicant-fullname">
				<label>{!! trans('quote.step1.2.email') !!}</label>
			</div>
			{{-- <h5 class="text-orange">Awesome!</h5>
			<p class="text-orange">We will email you your options</p> --}}
		</div>
		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" onclick="plan.gotoStep('4_1',false,false); plan.scrollTop();" class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
			</div>
		</div>
	</div>
</div>
