<div class="modal fade" id="modalcompare" tabindex="-1" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <img src="/assets/icons/CP.png" alt="" class="modal-logo">
    <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{!! trans('quote.plan-compare.compare') !!}</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-responsive table-condensed table-striped compare-table">
                <thead>
                  <tr class="text-center">
                    <td>
                      <div class="compare-logo">
                        <img src="/assets/icons/logo.png" alt="" class="img-responsive">
                      </div>
                    </td>
                    <td>{!! trans('quote.plan-compare.monthly_premium') !!}</td>
                    <td>{!! trans('quote.plan-compare.deductible') !!}</td>
                    <td>{!! trans('quote.plan-compare.max_oop') !!}</td>
                    <td>{!! trans('quote.plan-compare.network') !!}</td>
                    <td>{!! trans('quote.plan-compare.metal_level') !!}</td>
                    <td>{!! trans('quote.plan-compare.primary_care') !!}</td>
                    <td>{!! trans('quote.plan-compare.specialist') !!}</td>
                    <td>{!! trans('quote.plan-compare.generic_drugs') !!}</td>
                    <td>{!! trans('quote.plan-compare.emergency_room') !!}</td>
                    <td>{!! trans('quote.plan-compare.resources') !!}</td>
                  </tr>
                </thead>
                <tbody class="compared-plans-container">

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('quote.plan-compare.close') !!}</button>
      </div>
    </div>
  </div>
</div>

<table class="cmp-plan-template" style="display:none;">
  <tbody>
    <tr class="cmp-plan-wrapper text-center">
      <td class="bg-blue cmp-plan-insurer"></td>
      <td data-th="Monthly Premium" class="cmp-plan-premium"></td>
      <td data-th="Deductible" class="cmp-plan-deductible"></td>
      <td data-th="Max OOP" class="cmp-plan-oop"></td>
      <td data-th="Network" class="cmp-plan-network"></td>
      <td data-th="Metal Level" class="cmp-plan-metal-level"></td>
      <td data-th="Primary Care" class="cmp-plan-primary-care"></td>
      <td data-th="Specialist" class="cmp-plan-specialist"></td>
      <td data-th="Generic Drugs" class="cmp-plan-drugs"></td>
      <td data-th="Emergency Room" class="cmp-plan-rooms"></td>
      <td data-th="Resources" class="cmp-plan-urls text-left">
        <div class="cmp-plan-resources">
          <p><a href="#" target="_blank" class="summary-of-benefits btn-link">{!! trans('quote.plan-compare.summary') !!}</a></p>
          <p><a href="#" target="_blank" class="network-url btn-link">{!! trans('quote.plan-compare.network') !!}</a></p>
          <p><a href="#" target="_blank" class="plan-brochure btn-link">{!! trans('quote.plan-compare.brochure') !!}</a></p>
          <p><a href="#" target="_blank" class="plan-formulary btn-link">{!! trans('quote.plan-compare.drug_formularly') !!}</a></p>
          <button type="button" class="btn btn-xs btn-primary btn-enroll not btn-block"><p>{!! trans('quote.plan-compare.select_plan') !!}</p></button>
          <button type="button" class="btn btn-xs btn-info plan-details btn-block"><p>{!! trans('quote.plan-compare.plan_details') !!}</p></button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
