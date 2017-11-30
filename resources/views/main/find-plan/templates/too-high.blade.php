<div class="col-md-6 col-md-offset-3 too-high status-wrapper">
   <strong>
    <h2>{!! trans('quote.templates.too-high.found_out') !!}</h2>
   </strong>
   <p>{!! trans('quote.templates.too-high.too_high') !!} </p>
   <p>{!! trans('quote.templates.too-high.suits_budget') !!}</p>
   <div class="mg-top-20 bg-cp-orange col-md-12 row">
     <img src="/assets/icons/government-icon.png" alt="" class="img-responsive col-md-3" style="height:100px;">
     <p class="col-md-9">
       {!! trans('quote.templates.too-high.uninsured1') !!}
      <strong><span class="qualified-tax-penalty"></span> {!! trans('quote.templates.too-high.uninsured2') !!}</strong>
    </p>
  </div>
   <div class="col-md-12 mg-top-20">
    <div class="form-group">
      <button type="button" onclick="plan.lets_see_back(this)" class="nextBtn btn btn-default">{!! trans('quote.back') !!}</button>
      <button type="button" onclick="plan.gotoStep('3_1', true, true, '2_1', '3');" class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
    </div>
  </div>
</div>
