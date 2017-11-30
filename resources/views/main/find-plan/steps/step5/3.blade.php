<div class="col-md-12 step-parent text-center">
	<div class="row">
		<ul id="checkout-tab" class="nav nav-tabs nav-justified" role="tablist">
			<li role="presentation" class="active fw-tab"><a href="#billing-address" aria-controls="billing-address" role="tab" data-toggle="tab">{!! trans('quote.step5.3.billing_address') !!}</a></li>
			<li role="presentation" class="fw-tab"><a class="disabled" href="#payment" aria-controls="payment" data-toggle="tab" role="tab">{!! trans('quote.step5.3.payment') !!}</a></li>
			<li role="presentation" class="fw-tab"><a class="disabled" href="#order-summary" aria-controls="order-summary" role="tab" data-toggle="tab">{!! trans('quote.step5.3.order_summary') !!}</a></li>
		</ul>
		<div class="tab-content" id="checkout-tabcontent">
			<div role="tabpanel" class="tab-pane fade in active" id="billing-address">
				<div class="row">
					<div class="col-md-12">
						<p class="fnt-raleway-m">{!! trans('quote.step5.3.send_to_address') !!}
							<span class="checkout-address checkout-billing-address"></span> ?
						</p>
						<div class="btn-billing-address" data-toggle="buttons">
							<label class="btn cp-btn-checkbox active">
								<input type="radio" value="yes" checked autocomplete="off"> {!! trans('quote.step5.3.yes') !!}
							</label>
							<label class="btn cp-btn-checkbox" style="width: 150px;">
								<input type="radio" value="no" autocomplete="off"> {!! trans('quote.step5.3.no') !!}
							</label>
						</div>
						<hr />
						<div id="checkout-preffered" style="display: none;">
							<p>{!! trans('quote.step5.3.preferred_address') !!}.</p>
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group" data-toggle="tooltip" data-trigger="hover focus" data-title="This is a required field">
									<input type="text" class="form-control" name="preffered_address" id="preffered_address" placeholder="Street Address and / or APT. No">
								</div>
								<div class="form-group" data-toggle="tooltip" data-trigger="hover focus" data-title="This is a required field">
									<input type="text" class="form-control" name="preffered_citystate" id="preffered_citystate" placeholder="City, State and Zip">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12  text-center">
						{{-- <button data-prev-tab="#" type="button" class="btn btn-default">Back</button> --}}
						<button data-next-tab="#payment" data-bypass="true" data-toggle="subtab" type="button" class="subtab btn btn-success">{!! trans('quote.continue') !!}</button>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="payment">
				<div class="row">
					<div class="col-md-12">
						<ul id="payment-type-tab" class="nav nav-tabs nav-justified" role="tablist">
							<!-- <li role="presentation" class="active fw-tab">
								<a href="#credit-debit" data-payment-method="1" aria-controls="✓-debit" role="tab" data-toggle="tab">
									<img class="img-responsive" src='/assets/icons/checkout-credit.png' style="margin:auto;height: 36px;" />
								</a>
							</li> -->
							<li role="presentation" class="active fw-tab">
								<a href="#credit-debit" data-payment-method="1" aria-controls="credit-debit" role="tab" data-toggle="tab">
									<!-- <img class="img-responsive" src='/assets/icons/paydirect.png' style="height: 36px;margin:auto;" /> -->
									<h4 class="paydirect">{!! trans('quote.step5.3.paydirect') !!}</h4>
								</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane  active" role="tabpanel" id="credit-debit">
								<div class="col-md-12">
									<h4 class="payment-disclaimer well">{!! trans('quote.step5.3.not_charged') !!}</h4>
									<div class="row">
										<div class="col-md-6 col-xs-12 text-left">
											<div class="form-group" >
												<label for="tab1-fullname">{!! trans('quote.step5.3.full_name') !!}</label>
												<input type="text" id="tab1-fullname" class="form-control">
											</div>
											<div class="form-group" >
												<label for="tab1-zip">{!! trans('quote.step5.3.zip_code') !!}</label>
												<input type="text" id="tab1-zip" class="form-control">
											</div>
											<div class="form-group" >
												<label for="tab1-cardno">{!! trans('quote.step5.3.credit_card_number') !!}</label>
												<input type="text" id="tab1-cardno" class="form-control">
											</div>
											<div class="form-group" >
												<label for="tab1-cardtype">{!! trans('quote.step5.3.credit_card_type') !!}</label>
												<input type="hidden" id="tab1-cardtype" name="credit_card_type" class="form-control">
												<select class="form-control" id="credit_card_type">
													<option value="visa">VISA</option>
													<option value="american_express">American Express card</option>
													<option value="mastercard">MasterCard</option>
													<option value="discover_network">Discover Network</option>
													<option value="other">Other</other>
												</select>
												<input type="text" style="display:none;" placeholder="please specify" class="form-control" id="credit_card_other">
											</div>
										</div>
										<div class="col-md-6 col-xs-12 text-left">
											<p><i class="fa fa-lock"></i> {!! trans('quote.step5.3.secure_transaction') !!}</p>
											<p>{!! trans('quote.step5.3.change_final_amount') !!}</p>
											<div class="">
												<div class="form-group expiry-date">
													<p>{!! trans('quote.step5.3.expiration_date') !!}</p>
													<select name="" id="expiry_month" style="width:49%;display:inline-block;" class="form-control">
														@for($_month = 1; $_month < 13; $_month++)
														<option value="{{ $_month }}" {{ $_month == date('n') ? 'selected' : '' }}>{{ date('M', strtotime('01.'.$_month.'.2001') ) }}</option>
														@endfor
													</select>
													<select name="" id="expiry_year" style="width:45%;display:inline-block;" class="form-control">
														@for($_year = $credit_card_expiration['start']; $_year < $credit_card_expiration['end']; $_year++)
														<option value="{{ $_year }}" {{ $_year == date('Y') ? 'selected' : '' }}>{{ $_year }}</option>
														@endfor
													</select>
												</div>
												<div class="form-group" >
													<label for="">{!! trans('quote.step5.3.cvv_cid') !!} <span class="text-success">{!! trans('quote.step5.3.sec_code') !!}</span></label>
													<input text="text" maxlength="3" id="cvv-cid" style="width: 50%;" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="tab-pane" role="tabpanel" id="paypal">
								<div class="col-md-8 col-md-offset-2 text-left">
									<h4>I will pay directly to the insurance carrier.</h4>
									<div class="checkout-insurance-container">

									</div>
								</div>
							</div> -->
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<button data-next-tab="#billing-address" data-bypass="true" data-toggle="subtab" type="button" class="subtab btn btn-default">{!! trans('quote.back') !!}</button>
							<button data-next-tab="#order-summary" data-bypass="false" data-toggle="subtab" type="button" class="subtab btn btn-success">{!! trans('quote.continue') !!}</button>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="order-summary">
				<div class="row">
					<div class="col-md-12 order-summary-container">
						<div class="col-md-8 text-left">
							<div class="well well-sm">
								<p>{!! trans('quote.step5.3.order') !!} <label class="label checkout-order-number label-success">1294035</label> {!! trans('quote.step5.3.placed') !!} {{ date('j F Y') }} {!! trans('quote.step5.3.at') !!} {{ date('H:i') }}</p>
								<p>{!! trans('quote.step5.3.status') !!} <i>{!! trans('quote.step5.3.pending') !!}</i></p>
								{{-- <p>ETA: {{ date('l, j F Y')}}</p> --}}
							</div>
						</div>
						<div class="col-md-4 text-right">
							<button type="button" class="btn btn-order print pull-right">
								<i class="fa fa-print"></i> {!! trans('quote.step5.3.print') !!}
							</button>
						</div>
					</div>
					<div class="col-md-12 text-left">
						<div class="col-md-4">
							<b>{!! trans('quote.step5.3.placed_by') !!}</b>
							<p class="text-underline text-success checkout-fullname"></p>
							<p class="checkout-email"></p>
						</div>
						<div class="col-md-4">
							<b>{!! trans('quote.step5.3.billing_to') !!}</b>
							<p class="checkout-fullname"></p>
							<p class="checkout-street-address"></p>
							<p class="checkout-citystatezip"></p>
						</div>
						<div class="col-md-4">
							<p>{!! trans('quote.step5.3.type') !!} <span class="checkout-metal text-capitalize"></span></p>
							<p>{!! trans('quote.step5.3.estimated_discount') !!} $<span class="checkout-discount"></span></p>
							<p>{!! trans('quote.step5.3.payments') !!} </p>
						</div>
					</div>
					<div class="col-md-12 text-center">
						<div class="col-md-12">
							<div class="well well-sm">
								<table class="table table-condensed">
									<thead>
										<tr>
											<td><b>{!! trans('quote.step5.3.items') !!}</b></td>
											<td><i>{!! trans('quote.step5.3.price') !!}</i></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{!! trans('quote.step5.3.item') !!} <span class="label label-success order-item-id"></span></td>
											<td>{!! trans('quote.step5.3.usd') !!} <span class="order-item-amount"></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<button onclick="plan.gotoStep('5_4', true, false); plan.scrollTop();" class="nextBtn btn btn-success" type="button">{!! trans('quote.step5.3.cp_work') !!}</button>
				</div>
			</div>
		</div>
	</div>
</div>
