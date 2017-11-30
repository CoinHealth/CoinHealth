<div class="col-md-10 col-md-offset-1 step-parent">
	<h3>Who needs coverage?</h3>
	<div class="row">
	<div class='form-group'>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<select name="coverage_selection" id='coverage_selection'>
				<option></option>
				<option data-src='/assets/icons/quote_male.png' value="1">Just for me (Male)</option>
				<option data-src='/assets/icons/quote_female.png' value="2">Just for me (Female)</option>
				<option data-src='/assets/icons/quote_partners.png' value="3">For me and my partner</option>
				<option data-src='/assets/icons/quote_family.png' value="4">For my whole family</option>
				<option data-src='/assets/icons/quote_single.png' value="5">For my family (Single Parent)</option>
			</select>
		</div>
	</div>
	</div>
	<div class='coverage-table-container' style='display: none;'>
		<table class="table table-condensed table-responsive coverage-table">
			<thead>
			<tr>
				<td></td>
				<td>Age</td>
				<td>Gender</td>
				<td>Pregnant</td>
				<td>Tobacco</td>
				<td></td>
			</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<button data-title="" class="btn btn-primary btn-sm pull-left" style='display:none;' id="quote-add-child" type="button"><i class="fa fa-plus"></i> Add Dependent</button>
		
	<div class="form-group">
		<input id="annual_income" autocomplete="off" class="text-center unstyled-input" type="text" placeholder="Annual Income *" />
		<label for="annual_income" class="text-muted cp-label">Annual Income *</label>
	</div>
	<button type="button" data-checkpoint="true" data-checkpoint-step="#step1_elligible" data-checkpoint-type='checkpointsType.eligible' data-step="#step1_3" class="cp-step-eligible btn btn-success next nextBtn">Next</button>
</div>

<table class="table-data-template hidden">
	<tr data-title="">
		<td align="left">
			<img src="/assets/icons/emoji-icon.png" class="smiley"/>
		</td>
		<td style="width:60px;">
			<input type="text" maxlength="3" minlength="1" class="age unstyled-input text-center" placeholder="Age" /> 
		</td>			
		<td>
			<div class="btn-group gender" data-toggle="buttons">
				<label class="cp-btn-checkbox btn btn-default btn-sm" for='M'>
					<input type="radio" name="gender" id="M" autocomplete="off"> M
				</label>
				<label class="cp-btn-checkbox btn btn-default btn-sm" for='F'>
					<input type="radio" name="gender" id="F" autocomplete="off"> F
				</label>
			</div>
		</td>
		<td>
			<div class="btn-group pregnant" data-toggle="buttons">
				<label class="cp-btn-checkbox btn btn-default btn-sm">
					<input type="radio" name="pregnant" id="Y" autocomplete="off"> Y
				</label>
				<label class="cp-btn-checkbox btn btn-default btn-sm active">
					<input type="radio" name="pregnant" id="N" checked autocomplete="off"> N
				</label>
			</div>
		</td>
		<td>
			<div class="btn-group tobacco" data-toggle="buttons">
				<label class="cp-btn-checkbox btn btn-default btn-sm">
					<input type="radio" name="tobacco" id="Y" autocomplete="off"> Y
				</label>
				<label class="cp-btn-checkbox btn btn-default btn-sm active">
					<input type="radio" name="tobacco" id="N" checked autocomplete="off"> N
				</label>
			</div>
		</td>
		<td><a href='#' class="rmv" style="display: none;">&times;</a></td>
	</tr>
</table>