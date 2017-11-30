<div class="panel panel-primary">
	<div class="panel-body">
		<form class="form-horizontal ">
			<div class="row">
				<div class="form-group pull-right">
					<div class="col-md-12">
						<button type="button" id= "close" class= "btn btn-danger btn-xs">X</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label>{!! trans('income-calculator.based-on') !!}</label>
					<select aria-label="Term" id= "term" class= "form-control">
						<option value="0">{!! trans('income-calculator.hour') !!}</option>
						<option value="1">{!! trans('income-calculator.day') !!}</option>
						<option value="2">{!! trans('income-calculator.week') !!}</option>
						<option value="3">{!! trans('income-calculator.bi-weekly') !!}</option>
						<option value="4">{!! trans('income-calculator.month') !!}</option>
						<option value="5">{!! trans('income-calculator.year') !!}</option>
					</select>
				</div>
				<div class="form-group">
					<label for="" dir="{{ session('locale') === 'ar' ? 'rtl' : 'ltr' }}">{!! trans('income-calculator.base-salary') !!} <label id= "lbl_base_salary">{!! trans('income-calculator.hour') !!}</label> </label>:
					<input type="text" class="form-control numberOnly" id= "base_salary">
				</div>
				<div class="form-group">
					<label for="">{!! trans('income-calculator.hrs-worked') !!}</label>
					<input type="text" class="form-control numberOnly" id= "num_hrs_day" maxlength= "2">
				</div>
				<div class="form-group">
					<label for="">{!! trans('income-calculator.days-worked') !!} </label>
					<input type="text" class="form-control numberOnly" id= "num_days_week"  maxlength= "1">
				</div>
				<div class="form-group pull-right">
					<button type="button" id= "result" class= "btn btn-success">{!! trans('income-calculator.calculate') !!}</button>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="" id= "a_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.annual-income') !!}</label>
					<label id= "a_income" class= "income_class control-label col-md-6"></label>
				</div>
				<div class="form-group">
					<label for="" id= "b_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.monthly-income') !!}</label>
					<label id= "b_income" class= "income_class control-label col-md-6"></label>
				</div>
				<div class="form-group">
					<label for="" id= "c_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.bi-weekly-income') !!}</label>
					<label id= "c_income" class= "income_class control-label col-md-6"></label>
				</div>
				<div class="form-group">
					<label for="" id= "d_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.weekly-income') !!}</label>
					<label id= "d_income" class= "income_class control-label col-md-6"></label>
				</div>
				<div class="form-group">
					<label for="" id= "e_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.daily-income') !!}</label>
					<label id= "e_income" class= "income_class control-label col-md-6"></label>
				</div>
				<div class="form-group">
					<label for="" id= "f_i" class= "income_class control-label col-md-6">{!! trans('income-calculator.hourly-income') !!}</label>
					<label id= "f_income" class= "income_class control-label col-md-6"></label>
				</div>
			</div>
		</form>








	</div>
</div>
