<!-- <div class="modal fade" id="healthModal" tabindex="-1" role="dialog">
  <div class="health-modal-dialog modal-dialog">
    <form action="" method="post" id="healthForm">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" class="health" value="{{ session()->get('HealthID') }}" name="health" id="HealthID">
      <div class="modal-content">
        <div class="health-modal-header modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="health-modal-body modal-body">
          <div class="row">
            <div class="col-md-12 health-question">
              <h4 class="q-header">{{ session()->get('HeaderQuestion') }}</h4>
              <h1 class="q-body">{{ session()->get('Description') }}</h1>
              <h4 class="q-footer">today?</h4>
            </div>
          </div>
        </div>
        <div class="health-modal-footer modal-footer">
          <!-- <button type="button" name="answer" value="yes" class="btn btn-danger health-btn-yes">YES</button>
          <button type="button" name="answer" value="no" class="btn btn-info health-btn-no">NO</button> -->
          <!--  <div class="btn-group" name="answer" data-toggle="buttons">
            <label class="btn btn-danger health-btn-yes">
              <input type="radio" name="answer" value="yes" autocomplete="off"> Yes
            </label>
            <label class="btn btn-info health-btn-no">
              <input type="radio" name="answer" value="no" autocomplete="off"> No
            </label>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>  -->




<div class="modal fade" id="healthModal" tabindex="-1" role="dialog">
  <div class="health-modal-dialog modal-dialog">
    <form action="/health" method="post" id="healthForm">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" class="health" value="{{ session()->get('HealthID') }}" name="health" id="HealthID">
      <div class="modal-content">
        <div class="health-modal-header modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="health-modal-body modal-body">
          <div class="row">
            <div class="col-md-12 health-question">
              <h4 class="q-header">{{ session()->get('HeaderQuestion') }}</h4>
              <h1 class="q-body">{{ session()->get('Description') }}</h1>
              <h4 class="q-footer">today?</h4>
            </div>
          </div>
        </div>
        <div class="health-modal-footer modal-footer">
          <button type="submit" name="answer" value="yes" class="btn btn-danger health-btn-yes">YES</button>
          <button type="submit" name="answer" value="no" class="btn btn-info health-btn-no">NO</button>
        </div>
      </div>
    </form>
  </div>
</div>

