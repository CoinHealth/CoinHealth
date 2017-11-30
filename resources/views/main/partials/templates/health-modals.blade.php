 <input type="hidden" id="health-question" value= "{{ isset($healthUser) ? '1' : '0' }}">
  <input type="hidden" class="health" value="{{ session()->get('HealthID') }}" id="HealthID">
  <input type="hidden" class="health" value="{{ session()->get('QuestionType') }}" id="QuestionType">

  <input type="hidden" class="health" value="{{ session()->get('BenefitIDs') }}" id="benefit_ids" >
  
  <input type="hidden" value="{{ session()->get('session') }}" id="check-session">

<div class="health-modal modal fade" id="benefitsModal" tabindex="-1" role="dialog">
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



<div class="health-modal modal fade" id="healthModal" tabindex="-1" role="dialog">
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


<div class="health-modal modal fade" id="questionsModal" tabindex="-1" role="dialog">
  <div class="health-modal-dialog modal-dialog">
    <form action="/profile/healthquestions" method="post" id="healthForm">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-content">
        <div class="health-modal-header modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="health-modal-body modal-body">
          <div class="row">
            @if(isset($questions))
              @foreach($questions as $question)
              <div class="col-md-12 health-questions-wrapper">
                <div class="col-sm-5">
                  <div class="btn-group health-btn-question" name="answer" data-toggle="buttons">
                    <label class="btn">
                      <input type="radio" name="answer[{{ $question->id }}]" value="1" checked autocomplete="off"> Yes
                    </label>
                    <label class="btn">
                      <input type="radio" name="answer[{{ $question->id }}]" value="0" autocomplete="off"> No
                    </label>
                  </div>
                </div>
                <div class="col-sm-7">
                <label>{{ $question->activity_question }}</label>
                </div>
              </div>
              @endforeach
            @endif
          </div>
        </div>
        <div class="health-modal-footer modal-footer">
          <button type="submit" class="btn btn-primary btn-question" id="btnOk">Save</button>
          <button type="button" class="btn btn-default btn-question" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

