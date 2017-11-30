<div class="panel panel-primary">
	<div class="panel-body">
		<div class="col-md-12 text-right">
			<div class="form-group">
				<button type="button" id= "close2" class= "btn btn-danger btn-xs">X</button>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-md-10 col-md-push-1 left">
				<h4 class= "text-center income-title">{!! trans('income-calculator.included') !!}</h4>
			</div>
			<div id="no-more-tables">
				<table class= "table table-responsive table-striped">
					<thead>
						<tr>
							<th>{!! trans('income-calculator.desc-title') !!}</th>
							<th>{!! trans('income-calculator.amount-title') !!}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc1') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_1"></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc2') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_2" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc3') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_3" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc4') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_4" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc5') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_5" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc6') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_6" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc7') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_7" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc8') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_8" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc9') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_9" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc10') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_10" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc11') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_11" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc12') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_12" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc13') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_13" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc14') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_14" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc15') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_15" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.inc-desc16') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeInc form-control input-sm col-xs-4" id= "inc_16" ></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-10 col-md-push-1 left">
				<h4 class= "text-center income-title">{!! trans('income-calculator.not-included') !!}</h4>
			</div>
			<div id="no-more-tables">
				<table class= "table table-striped">
					<thead>
						<tr>
							<th>{!! trans('income-calculator.desc-title') !!}</th>
							<th>{!! trans('income-calculator.amount-title') !!}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc1') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_1" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc2') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_2" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc3') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_3" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc4') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm ccol-xs-4" id= "notinc_4" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc5') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_5" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc6') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_6" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc7') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_7" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc8') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_8" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc9') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_9" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc10') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_10" ></td>
						</tr>
						<tr>
							<td class="col-xs-8" data-title="Description">{!! trans('income-calculator.not-inc-desc11') !!}</td>
							<td data-title="Amount($)"><input type="text" class="incomeNotInc form-control input-sm col-xs-4" id= "notinc_11" ></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-12 text-right">
				<button type="button" class="btn btn-success" id= "calculate">{!! trans('income-calculator.calculate') !!}</button>
			</div>
		</div>
		<div class="row estimate col-md-6" dir="{{ session('locale') === 'ar' ? 'rtl' : 'ltr' }}">
			<label>{!! trans('income-calculator.estimated_income') !!}: $</label>
			<label id= "lbl_estimatedIncome"></label>
		</div>
	</div>

</div>
