<div id="step1_1" class="col-md-12 form-steps" style="display:none;">
	@include('main.quote-engine.partials.step1.step1_1')
</div>
<div id="step1_2" class="col-md-12 form-steps" style="display: none;">
	@include('main.quote-engine.partials.step1.step1_2')
</div>
<div id="step1_3" class="col-md-12 form-steps" style="display: none;">
	@include('main.quote-engine.partials.step1.step1_lets_see')
</div>

<div class="dependent-template" style="display: none;">
	<div class="form-inline dependent-wrapper">
		<div class="row">
		<div class="col-md-12">
			<div class="form-group pull-left">
				<h3 class="dependent-title text-left">Dependent</h3>
				<div class="btn-group pull-left btn-group-sm btn-gender" role="group" aria-label="...">
				  <button type="button" class="btn">M</button>
				  <button type="button" class="btn">F</button>
				</div>
			</div>
			<div class="form-group pull-right">
				<label for="dependent-age">Age</label>
				<input type="text" maxlength="2" max="99" min="1" class="form-control" name="dependent_age">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group" style="display: block">
				<p class="text-left">Select all that apply</p>
				<div class="btn-group btn-block cp-btn-group-block" data-toggle="buttons">
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" autocomplete="off"> Tobacco User <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" autocomplete="off"> Parent / Caretaker of a Child Under 19 in Household <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" autocomplete="off"> Job currently offers insurance <span class="pull-right icon-checked"></span>
					</label>
					<label class="cp-btn-orange btn btn-block">
						<input type="checkbox" autocomplete="off"> Pregnant <span class="pull-right icon-checked"></span>
					</label>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>