<div class="col-md-12 col-sm-12 col-xs-12 qualified status-wrapper">
  <div class="row upper-row">
    <div class="col-md-6 col-sm-6 col-xs-12 left text-right">
      <div class="wrapper">
        <p class="text-bolder estimated">{!! trans('quote.templates.qualified.estimated') !!} </p>
        <h1 class="qualified-price qualified-subsidy">$<span>236</span></h1>
        <p class="text-bolder">{!! trans('quote.templates.qualified.thanks_ptc') !!}</p>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 right text-left">
      <div class="wrapper">
        <h3>{!! trans('quote.templates.qualified.qualify') !!}</h3>
        <p>{!! trans('quote.templates.qualified.government_pay') !!}</p>
        <p>
          <span class="larger">{!! trans('quote.templates.qualified.uninsured1') !!}</span>
          <strong><span class="qualified-price qualified-tax-penalty">$1,738 {!! trans('quote.templates.qualified.uninsured2') !!}</span></strong>
        </p>
      </div>
    </div>
  </div>
  <div class="row-eq-height">
    <div class="col-md-12 bottom">
      <div class="col-md-8 text-container text-right">
        <h3>{!! trans('quote.templates.qualified.cost_sharing_head') !!}</h3>
        <p>{!! trans('quote.templates.qualified.cost_sharing1') !!} </p>
        <p>{!! trans('quote.templates.qualified.cost_sharing2') !!}</p>
      </div>
      <div class="col-md-4 logo-container text-left">
        <img src="/assets/icons/parrot-share-story.png" alt="" class="img-responsive">
      </div>
    </div>
  </div>
  <div class="col-md-12 mg-top-20">
    <div class="form-group">
      <button type="button" onclick="plan.lets_see_back(this)" class="nextBtn btn btn-default">{!! trans('quote.back') !!}</button>
      <button type="button" onclick="plan.gotoStep('3_1', true, true, '2_1', '3');" class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
    </div>
  </div>
</div>
