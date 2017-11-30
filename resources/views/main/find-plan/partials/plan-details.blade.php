<div class="modal fade" id="plandetails" tabindex="-1" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content  plan-details-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title plan-details-title"></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="plan-details-header">
              <div class="col-md-4 text-left">
                <h5 class="text-uppercase">{!! trans('quote.plan-details.monthly_cost') !!}</h5>
                <h1>$<span class="plan-details-subsidy-applied"></span></h1>
                <h6><span class="small">{!! trans('quote.plan-details.before') !!} </span>$<span class="plan-details-premium"></span></h6>
              </div>
              <div class="col-md-4">
                <h5 class="text-uppercase">{!! trans('quote.plan-details.deductible') !!}</h5>
                <h1><span class="plan-details-deductible"></span></h1>
              </div>
              <div class="col-md-4">
                <h5 class="text-uppercase">{!! trans('quote.plan-details.out_max') !!}</h5>
                <h1><span class="plan-details-oop"></span></h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="plan-details-body">
              <div class="plan-details-summary-doctor">
                <div class="col-md-2 plan-details-img">
                  <img src="/assets/icons/plan-details-doctor-visit.png" alt="" class="img-responsive">
                </div>
                <div class="col-md-10 text-left">
                  <h4 class="text-uppercase">{!! trans('quote.plan-details.doctors_visit') !!}</h4>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.primary_care') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-primary-care"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.specialist') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-specialist"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="plan-details-summary-prescription">
                <div class="col-md-2 plan-details-img">
                  <img src="/assets/icons/plan-details-prescriptions.png" alt="" class="img-responsive">
                </div>
                <div class="col-md-10 text-left">
                  <h4 class="text-uppercase">{!! trans('quote.plan-details.prescriptions') !!}</h4>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.generic_drugs') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-generic"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.brand_drugs') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-brand"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.brand_drugs_non') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-non"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.specialty_drugs') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-specialty"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.drug_deductible') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-deductible"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.drug_max') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-drugs-moop"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="plan-details-summary-hospital">
                <div class="col-md-2 plan-details-img">
                  <img src="/assets/icons/plan-details-hospitals.png" alt="" class="img-responsive">
                </div>
                <div class="col-md-10 text-left">
                  <h4 class="text-uppercase">{!! trans('quote.plan-details.hospital') !!}</h4>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.emergency_room') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-rooms"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.hs_facility') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-stay-facility"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <p>{!! trans('quote.plan-details.hs_physician') !!}</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <p class="plan-details-stay-physician "></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="plan-details-summary-urls">
                <div class="col-md-2 plan-details-img">
                  {{-- <img src="/assets/icons/plan-details-hospitals.png" alt="" class="img-responsive"> --}}
                </div>
                <div class="col-md-10 text-left">
                  <h4 class="text-uppercase">{!! trans('quote.plan-details.urls') !!}</h4>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <p><a href="#" class="btn-link plan-details-url-network" target="_blank"><i class="fa fa-external-link"></i> {!! trans('quote.plan-details.network') !!}</a></p>
                      <p><a href="#" class="btn-link plan-details-url-formulary" target="_blank"><i class="fa fa-external-link"></i> {!! trans('quote.plan-details.drug_formularly') !!}</a></p>
                      <p><a href="#" class="btn-link plan-details-url-brochure" target="_blank"><i class="fa fa-external-link"></i> {!! trans('quote.plan-details.brochure') !!}</a></p>
                      <p><a href="#" class="btn-link plan-details-url-summary" target="_blank"><i class="fa fa-external-link"></i> {!! trans('quote.plan-details.summary') !!}</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="plan-disclaimer">
                <div class="col-md-12 text-justify">
                  <p>{!! trans('quote.plan-details.isnt_able') !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('quote.plan-details.close') !!}</button>
        <button type="button" class="btn btn-primary not btn-enroll">{!! trans('quote.plan-details.enroll') !!}</button>
      </div>
    </div>
  </div>
</div>
