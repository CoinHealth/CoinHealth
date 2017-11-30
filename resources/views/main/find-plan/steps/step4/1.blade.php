<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-12 filter-header"  data-spy="affix" data-offset-top="50">
			<div class="row">
				<div class="col-md-12 plan-filters">
					<div class="col-md-4">
						<div class="form-group">
							<p class="plan-sort-label">{!! trans('quote.step4.sort_by') !!} </p>
							<div class="input-group sorter-input-group">
								<span class="input-group-addon">
									<input type="checkbox" class="filterer sort-order" checked data-toggle="toggle" data-height="20" data-width="70" data-size="mini" data-on="ASC" data-off="DESC">
								</span>
								<select class="form-control sorter filterer">
									<option value="" data-filter="monthly" selected>{!! trans('quote.step4.lowest_payment') !!}</option>
									<option value="" data-filter="deductible">{!! trans('quote.step4.lowest_deductible') !!}</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<p class="plan-type-label">{!! trans('quote.step4.filter_plan_type') !!} </p>
							<div class="plan-type-filters btn-group " data-toggle="buttons">
								{{-- Plan Types Container --}}
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<p class="plan-type-label">{!! trans('quote.step4.search_issuer') !!}</p>
							<input type="text" class="form-control filterer" placeholder="{!! trans('quote.step4.search_plans') !!}">
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center plan-compare-wrapper">
					<a href="#modalcompare" class="btn btn-green" id="modalcompareBtn" role="button" style="display:none;" data-toggle="modal">{!! trans('quote.step4.compare') !!} <i class="fa fa-play"></i></a>
				</div>
			</div>
		</div>
		<div class="row insurer-row">
			<div class="col-md-12 insurer" id="insurer">
				<ul class="nav nav-tabs nav-justified" role="tablist">
			    <!-- <li role="presentation" id="nav-compare">
			    	<a href="#plancompare" id="initCompare" data-toggle="modal">Compare <i class="fa fa-play"></i></a>
			    </li> -->
			    <li role="presentation" id="nav-bronze" class="active">
			    	<a href="#bronze" aria-controls="bronze" role="tab" data-toggle="tab"><span class="desk-text">{!! trans('quote.step4.bronze') !!}</span><span class="mobile-text">B</span></a>
			    </li>
			    <li role="presentation" id="nav-silver">
			    	<a href="#silver" aria-controls="silver" role="tab" data-toggle="tab"><span class="desk-text">{!! trans('quote.step4.silver') !!}</span><span class="mobile-text">S</span></a>
			    </li>
			    <li role="presentation" id="nav-gold">
			    	<a href="#gold" aria-controls="gold" role="tab" data-toggle="tab"><span class="desk-text">{!! trans('quote.step4.gold') !!}</span><span class="mobile-text">G</span></a>
			    </li>
			    <li role="presentation" id="nav-platinum">
			    	<a href="#platinum" aria-controls="platinum" role="tab" data-toggle="tab"><span class="desk-text">{!! trans('quote.step4.platinum') !!}</span><span class="mobile-text">P</span></a>
			    </li>
			    <li role="presentation" id="nav-catasthropic">
			    	<a href="#catastrophic" aria-controls="catasthropic" role="tab" data-toggle="tab"><span class="desk-text">{!! trans('quote.step4.catastrophic') !!}</span><span class="mobile-text">C</span></a>
			    </li>
			  </ul>
			  <div class="tab-content plans-container">

			  	<div role="tabpanel" class="col-md-12 text-center plan-container tab-pane fade in active" id="bronze">
						<p class="no-plans">No plans for this Tier at this time.</p>
							{{--  bronze plans container --}}
			  	</div>

			  	<div role="tabpanel" class="col-md-12 text-center plan-container tab-pane fade" id="silver">
						<p class="no-plans">No plans for this Tier at this time.</p>
							{{-- silver plans container --}}
			  	</div>

			  	<div role="tabpanel" class="col-md-12 text-center plan-container tab-pane fade" id="gold">
						<p class="no-plans">No plans for this Tier at this time.</p>
							{{-- gold plans container --}}
			  	</div>

			  	<div role="tabpanel" class="col-md-12 text-center plan-container tab-pane fade" id="platinum">
						<p class="no-plans">No plans for this Tier at this time.</p>
							{{-- catasthropic plans container --}}
			  	</div>

			  	<div role="tabpanel" class="col-md-12 text-center plan-container tab-pane fade" id="catastrophic">
						<p class="no-plans">No plans for this Tier at this time.</p>
							{{-- catasthropic plans container --}}
			  	</div>
			  </div>
			</div>
		</div>
		{{--
		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" class="btn btn-primary">Save & Exit</button>
			</div>
		</div> --}}
	</div>
</div>

<div class="insurer-template" style="display:none;">
	<div class="col-md-12 insurer-container">
		<div class="row">
			<div class="col-md-7 insurer-name">
				<div class="title-issuer">
					{!! trans('quote.step4.issuer_name') !!}
				</div>
				<label for="">
					<input type="checkbox" class="insurer-checkbox hidden">
					<img src="/assets/issuer-logos/bcbs.png" alt="" class="img-responsive pull-left">
					<p class="pull-right insurer-plan-marketing-name"></p>
				</label>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-4 col-xs-4 insurer-text fnt-raleway-m insurer-portion">
						<div class="title-premium">
							{!! trans('quote.step4.monthly_premium') !!}
						</div>
						<h5>$<span>110</span></h5>
						<p class="small" style="display:none;">{!! trans('quote.step4.eligible') !!} <i class="fa fa-check-circle-o"></i></p>
					</div>
					<div class="col-md-4 col-xs-4 fnt-raleway-m insurer-deductible">
						<div class="title-deductibles">
							{!! trans('quote.step4.deductibles') !!}
						</div>
						<h5><span>11</span></h5>
					</div>
					<div class="col-md-4 col-xs-4 fnt-raleway-m insurer-rating">
						<div class="title-ratings">
							{!! trans('quote.step4.ratings') !!}
						</div>
						<button type="button" class="btn btn-xs btn-primary plan-manage-ratings">
							<i class="fa fa-heart"></i> view ratings
						</button>
						<div class="text-center plan-rating-container" style="display:none;">
							<span class="plan-total-wrapper">
								<span class="plan-total-rating"></span> total votes
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row button-row">
			<div class="col-md-12 text-left">
				<a href="#" class="btn btn-lg plan-details btn-details">{!! trans('quote.step4.details') !!} +</a>
				<a href="#" class="btn btn-lg btn-compare">{!! trans('quote.step4.select_compare') !!}</a>
				<a href="#" class="btn btn-lg btn-enroll pull-right">{!! trans('quote.step4.enroll') !!}</a>
			</div>
		</div>
	</div>
</div>


<div class="plan-type-filters-template" style="display:none;">
	<label class="btn btn-primary fnt-raleway-m" data-filter="">
		<input type="checkbox" name="networks">
		<span class="plan-type-name"></span>
	</label>
</div>
<div class="plan-rating-template" style="display:none;">
	@include('main.find-plan.templates.plan-rating');
</div>
