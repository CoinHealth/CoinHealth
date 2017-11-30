<div id="step1_1" class="col-md-12 form-steps" style="display:none;">
	@include('main.find-plan.steps.step1.1')
</div>

<div class="dependent-template" style="display: none;">
	<div class="form-inline dependent-wrapper">
		<div class="row">
		<div class="col-md-12">
			<div class="form-group pull-left form-1">
				<h3 class="dependent-title text-left">{!! trans('quote.step1.template.dependent') !!}</h3>
				<div class="btn-group pull-left btn-group-sm btn-gender" data-toggle="buttons">
					<label class="btn active">
						<input type="radio" value="M" checked="checked" name="dependent_sex" autocomplete="off"> M
					</label>
					<label class="btn">
						<input type="radio" value="F" name="dependent_sex" autocomplete="off"> F
					</label>
				</div>
			</div>
			<div class="form-group pull-right form-2" data-trigger="hover focus" title="this is a required field">
				<label for="dependent-age">{!! trans('quote.step1.template.age') !!}</label>
				<input type="text" maxlength="2" max="99" min="1" class="form-control" name="dependent_age">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group form-select" style="display: block">
				<p class="text-left">{!! trans('quote.step1.template.select') !!}</p>
				<div class="btn-group btn-block cp-btn-group-block" data-toggle="buttons">
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" data-applicant-name="tobacco" class="applicant-tobacco" autocomplete="off" data-toggle="tooltip" title="Enrollee used tobacco for four or more times within a period of six months or less. This does not include the use of tobacco for religious ceremonies."> {!! trans('quote.step1.template.tobacco') !!} <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block pre-line">
						<input type="checkbox" data-applicant-name="parent" class="applicant-parent" autocomplete="off" data-toggle="tooltip" title="Select this if the enrollee lives together with his/her child/children even if it's not his/her tax dependent(s)."> {!! trans('quote.step1.template.parent') !!} <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block pre-line-2">
						<input type="checkbox" data-applicant-name="job" class="applicant-job" autocomplete="off" data-toggle="tooltip" title="Select this option if the enrollee has an affordable employer-based plan or if the cheapest monthly premium of the employee is less than 9.66% of his/her household income."> {!! trans('quote.step1.template.job') !!} <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" data-applicant-name="pregnant" class="applicant-pregnant" autocomplete="off" data-toggle="tooltip" title="Select if the enrollee is pregnant, but don't count the baby as a dependent yet until it's born."> {!! trans('quote.step1.template.pregnant') !!} <span class="pull-right icon-checked"></span>
					</label>
				</div>
			</div>
		</div>
		</div>
	</div>

</div>
