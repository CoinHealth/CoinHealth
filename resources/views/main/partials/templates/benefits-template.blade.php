<div class="modal fade" id="benefitsModal" tabindex="-1" role="dialog">
  <div class="health-modal-dialog modal-dialog">
    <form action="" method="post" id="healthForm">

      <div class="modal-content">
        <div class="health-modal-header modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="health-modal-body modal-body">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 health-body">
              <h1 class="health-day-counter">1</h1>
              <p class="day">{{ session()->get('Day') }}</p>
              <p>and counting</p>
              <p class="health-description">{{ session()->get('HealthDescription') }}</p>
            </div>
          </div>
        </div>
        <div class="health-modal-footer modal-footer">
          <div class="row">
            <div class="col-md-6 health-benefits">
              <p>Benefits:</p>

              <div class="row">
                <div class="col-md-2">
                  <img src="{{ session()->get('BenefitPath1') }}" alt="">
                </div>
                <label class="control-label col-md-10">{{ session()->get('BenefitName1') }}</label>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <img src="{{ session()->get('BenefitPath2') }}" alt="">
                </div>
                <label class="control-label col-md-10">{{ session()->get('BenefitName2') }}</label>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <img src="{{ session()->get('BenefitPath3') }}" alt="">
                </div>
                <label class="control-label col-md-10">{{ session()->get('BenefitName3') }}</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="health-point-earned">
                {{ session()->get('PointsEarned') }}
              </div>
              <p class="health-point-label">{{ session()->get('PointLabel') }}</p>
            </div>


          </div>
        </div>
      </div>
    </form>
  </div>
</div>
