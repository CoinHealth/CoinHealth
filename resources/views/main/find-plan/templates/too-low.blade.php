<div class="col-md-6 col-md-offset-3 too-low status-wrapper">
   <strong>
    <h2>{!! trans('quote.templates.too-low.found_out') !!}</h2>
   </strong>
   <p>{!! trans('quote.templates.too-low.too_low') !!} </p>
   <p>{!! trans('quote.templates.too-low.suits_budget') !!}</p>
   <p class="mg-top-20 bg-cp-orange">{!! trans('quote.templates.too-low.uninsured1') !!}
    <strong><span class="qualified-tax-penalty"></span> {!! trans('quote.templates.too-low.uninsured2') !!}</strong>
   </p>
   <div class="col-md-12 mg-top-20">
    <div class="form-group">
      <button type="button" onclick="plan.lets_see_back(this)" class="nextBtn btn btn-default">{!! trans('quote.back') !!}</button>
      <button type="button" onclick="plan.gotoStep('3_1', true, true, '2_1', '3');" class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
    </div>
  </div>
</div>
